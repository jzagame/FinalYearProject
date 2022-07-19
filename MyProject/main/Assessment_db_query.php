<?php

session_start();
include "../../includes/conn.php";
$action = $_POST['action'];
$formdata = $_POST['formdata'];

if ($action == "addcompetencies") {
    $data = array();
    parse_str($formdata, $data);
    $time = count($data['Itm']);
    for ($i = 0; $i < $time; $i++) {
        $sql = "select * from t_memc_kpcc_employee_item where Ei_EMP_ID = '" . $_POST['EID'] . "' and Ei_Quarter_ID = " . $data['quarter'][$i] . " and Ei_Im_ID = " . $data['Itm'][$i] . "";
        $result = $conn->query($sql); // find database by using staff no, quater id and item id
        if (mysqli_num_rows($result) > 0) { // if got the same data
            $row = $result->fetch_assoc();
            if ($row['Ei_Category'] != $data['Cat'][$i]) { // if data found category is not same with input (EXAMPLE : input is core and database is sub ), perform action
                $x = $conn->query("select * from t_memc_kpcc_quarter where Q_ID = " . $data['quarter'][$i] . ""); // find this quarter belong to which year
                $year = $x->fetch_assoc();
                $conn->query("update t_memc_kpcc_employee_item set Ei_Category = '" . $data['Cat'][$i] . "' where Ei_Im_ID = " . $data['Itm'][$i] . " 
                and Ei_Quarter_ID in (select Q_ID from t_memc_kpcc_quarter where Q_Year = '" . $year['Q_Year'] . "')");  // update all category same with input that belong to year
            }
            $completeness = CheckScoreAndTargetScore($data['score'][$i], $data['target'][$i], $conn);
            $sql = "update t_memc_kpcc_employee_item set Ei_Im_ID = " . $data['Itm'][$i] . ", Ei_Category = '" . $data['Cat'][$i] . "', 
                Ei_Quarter_ID = " . $data['quarter'][$i] . ",Ei_Status = '".$completeness."',Ei_Score = '" . $data['score'][$i] . "', Ei_Target_Score = " . $data['target'][$i] . " where Ei_ID = " . $row['Ei_ID'] . "";
            // if category is same with database use this query 
            $conn->query($sql);
            $y = current($_SESSION['Action_Plan_ID']);
            UpdateActionPlan($conn, $row['Ei_ID'], $data['AP_Project' . $y], $data['AP_Desc' . $y], $data['AP_Date' . $y], $data['AP_Status' . $y], current($_SESSION['Action_Plan']));
        } else {
            $completeness = CheckScoreAndTargetScore($data['score'][$i], $data['target'][$i], $conn);
            $sql = "insert into t_memc_kpcc_employee_item (Ei_EMP_ID,Ei_Im_ID,Ei_Category,Ei_Quarter_ID,Ei_Score,Ei_Target_Score,Ei_Status) values 
            ('" . $_POST['EID'] . "'," . $data['Itm'][$i] . ",'" . $data['Cat'][$i] . "'," . $data['quarter'][$i] . ",'" . $data['score'][$i] . "'," . $data['target'][$i] . ",'".$completeness."')";
            $conn->query($sql);
            $temp = $conn->query("select * from t_memc_kpcc_employee_item where Ei_EMP_ID = '" . $_POST['EID'] . "' and Ei_Im_ID = " . $data['Itm'][$i] . " and Ei_Quarter_ID = " . $data['quarter'][$i] . "");
            $temp1 = $temp->fetch_assoc();
            $y = current($_SESSION['Action_Plan_ID']);
            InsertActionPlan($conn, $temp1['Ei_ID'], $data['AP_Project' . $y], $data['AP_Desc' . $y], $data['AP_Date' . $y], $data['AP_Status' . $y]);
        }
        next($_SESSION['Action_Plan_ID']);
        next($_SESSION['Action_Plan']);
    }
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";
    // echo "<pre>";
    // var_dump($_SESSION['Action_Plan']);
    // echo "</pre>";
    // echo "<pre>";
    // var_dump($_SESSION['Action_Plan_ID']);
    // echo "</pre>";
}

if ($action == "quarterreport") {
    $data = array();
    parse_str($formdata, $data);

    $sql = "select * from t_memc_kpcc_quarter_report where QR_Q_ID = " . $_POST['quarter'] . " and QR_E_ID = '" . $_POST['eid'] . "'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $conn->query("Update t_memc_kpcc_quarter_report set QR_Mentor_Evaluation = '" . $data['mentor_eas'] . "', QR_PD_Summary = '" . $data['pd_summary'] . "',
                        QR_Marks = " . $data['quarter_marks'] . " where QR_Q_ID = " . $_POST['quarter'] . " and QR_E_ID = '" . $_POST['eid'] . "'");
    } else {
        $conn->query("insert into t_memc_kpcc_quarter_report(QR_E_ID,QR_Q_ID,QR_Mentor_Evaluation,QR_PD_Summary,QR_Marks) values 
                    ('" . $_POST['eid'] . "'," . $_POST['quarter'] . ",'" . $data['mentor_eas'] . "','" . $data['pd_summary'] . "'," . $data['quarter_marks'] . ")");
    }
}

function CheckScoreAndTargetScore($score, $targetscore, $conn)
{
    $temp = 1;
    if ($score == "-") { // 0 = score >= target , 1 = score < target , 2 = hvnt give marks
        $temp = 2;
    } else {
        $result = $conn->query("select * from t_memc_kpcc_items_lvl_desc where Im_lvl_ID = " . $score . "");
        $data_score = $result->fetch_assoc();
        $score = $data_score['Im_lvl_Name'];
        $result = $conn->query("select * from t_memc_kpcc_items_lvl_desc where Im_lvl_ID = " . $targetscore . "");
        $data_targetscore = $result->fetch_assoc();
        $targetscore = $data_targetscore['Im_lvl_Name'];
        preg_replace('~\D~', '', $score);
        preg_replace('~\D~', '', $targetscore);
        if ($score >= $targetscore) {
            $temp = 0;
        }
    }
    return $temp;
}

function UpdateActionPlan($conn, $EIID, $project, $description, $date, $status, $type)
{
    for ($i = 0; $i < count($project); $i++) {
        if (current($type) == "insert") {

            $conn->query("insert into t_memc_kpcc_actionplan (AP_Ei_ID,AP_Pt_ID,AP_Description,AP_Date,AP_Status) values 
            (" . $EIID . "," . current($project) . ",'" . current($description) . "','" . current($date) . "','" . current($status) . "')");
        } else {
            $conn->query("update t_memc_kpcc_actionplan set AP_Description = '" . current($description) . "', AP_Date = '" . current($date) . "', AP_Status = '" . current($status) . "' 
            where AP_ID = " . current($type) . "");
        }
        next($type);
        next($project);
        next($description);
        next($date);
        next($status);
    }
}

function InsertActionPlan($conn, $EIID, $project, $description, $date, $status)
{
    for ($i = 0; $i < count($project); $i++) {
        $sql = "insert into t_memc_kpcc_actionplan (AP_Ei_ID,AP_Pt_ID,AP_Description,AP_Date,AP_Status) values 
        (" . $EIID . "," . current($project) . ",'" . current($description) . "','" . current($date) . "','" . current($status) . "')";
        $conn->query($sql);
        next($project);
        next($description);
        next($date);
        next($status);
    }
}
