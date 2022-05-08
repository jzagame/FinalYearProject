<?php
error_reporting(0);
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
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            if ($row['Ei_Category'] != $data['Cat'][$i]) {
                $x = $conn -> query("select * from t_memc_kpcc_quarter where Q_ID = ".$data['quarter'][$i]."");
                $year = $x -> fetch_assoc();
                $conn -> query("update t_memc_kpcc_employee_item set Ei_Category = '".$data['Cat'][$i]."' where Ei_Im_ID = ".$data['Itm'][$i]." 
                and Ei_Quarter_ID in (select Q_ID from t_memc_kpcc_quarter where Q_Year = '".$year['Q_Year']."')");
            } 
            $sql = "update t_memc_kpcc_employee_item set Ei_Im_ID = " . $data['Itm'][$i] . ", Ei_ToDo_Desc = '" . $data['todo'][$i] . "', Ei_Category = '" . $data['Cat'][$i] . "', 
                Ei_Quarter_ID = " . $data['quarter'][$i] . ",Ei_Score = '".$data['score'][$i]."', Ei_Target_Score = " . $data['target'][$i] . ", Ei_Status = 'A' where Ei_ID = " . $row['Ei_ID'] . "";
        } else {
            $sql = "insert into t_memc_kpcc_employee_item (Ei_EMP_ID,Ei_Im_ID,Ei_ToDo_Desc,Ei_Category,Ei_Quarter_ID,Ei_Score,Ei_Target_Score,Ei_Status) values 
            ('" . $_POST['EID'] . "'," . $data['Itm'][$i] . ",'" . $data['todo'][$i] . "','" . $data['Cat'][$i] . "'," . $data['quarter'][$i] . ",'".$data['score'][$i]."'," . $data['target'][$i] . ",'A')";
        }
        $conn->query($sql);
    }
}

if ($action == "Edit_Emp_Item_Detail") {
    $sql = "update t_memc_kpcc_employee_item Set Ei_Im_ID = '" . $formdata[1]['value'] . "',Ei_Date_Participate = '" . $formdata[5]['value'] . "',Ei_Date_End = '" . $formdata[6]['value'] . "'
    ,Ei_Category = '" . $formdata[3]['value'] . "',Ei_Target_Score = '" . $formdata[2]['value'] . "',Ei_desp = '" . $formdata[4]['value'] . "',Ei_Status = '" . $formdata[7]['value'] . "'
    where Ei_ID = " . (int)$formdata[0]['value'] . "";
    $conn->query($sql);
}
