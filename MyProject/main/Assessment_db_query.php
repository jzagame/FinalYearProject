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
        // if($data['EID'][$i] != "new"){
        //     $sql = "select * from t_memc_kpcc_employee_item where Ei_ID = ".$data['EID'][$i]."";
        //     $result = $conn -> query($sql);
        //     $row = $result -> fetch_assoc();
        //     if($row['Ei_Im_ID'] == $data['Itm'][$i] && $row['Ei_Quarter_ID'] == $data['quarter'][$i] && $row['Ei_Category'] != $data['Cat'][$i]){
        //         $x = $conn -> query("select * from t_memc_kpcc_quarter where Q_ID = ".$data['quarter'][$i].""); // find this quarter belong to which year
        //         $year = $x -> fetch_assoc();
        //         $conn -> query("update t_memc_kpcc_employee_item set Ei_Category = '".$data['Cat'][$i]."' where Ei_Im_ID = ".$data['Itm'][$i]." 
        //         and Ei_Quarter_ID in (select Q_ID from t_memc_kpcc_quarter where Q_Year = '".$year['Q_Year']."')");  
        //         //First query is update all same item in same year to same category 
        //         $conn -> query("update t_memc_kpcc_employee_item set Ei_ToDo_Desc = '" . $data['todo'][$i] . "', Ei_Score = '".$data['score'][$i]."', 
        //         Ei_Target_Score = " . $data['target'][$i] . ", Ei_Status = 'A' where Ei_ID = " . $data['EID'][$i] . "");
        //         // Second query is update based on ID if any changes make on todo_description, target score and score
        //     }else{
        //         $sql = "update t_memc_kpcc_employee_item set Ei_Im_ID = " . $data['Itm'][$i] . ", Ei_ToDo_Desc = '" . $data['todo'][$i] . "', Ei_Category = '" . $data['Cat'][$i] . "', 
        //         Ei_Quarter_ID = " . $data['quarter'][$i] . ",Ei_Score = '".$data['score'][$i]."', Ei_Target_Score = " . $data['target'][$i] . ", Ei_Status = 'A' where Ei_ID = " . $row['Ei_ID'] . "";
        //     }
        // }else{
        //     $sql = "insert into t_memc_kpcc_employee_item (Ei_EMP_ID,Ei_Im_ID,Ei_ToDo_Desc,Ei_Category,Ei_Quarter_ID,Ei_Score,Ei_Target_Score,Ei_Status) values 
        //     ('" . $_POST['EID'] . "'," . $data['Itm'][$i] . ",'" . $data['todo'][$i] . "','" . $data['Cat'][$i] . "'," . $data['quarter'][$i] . ",'".$data['score'][$i]."'," . $data['target'][$i] . ",'A')";
        // }

        $sql = "select * from t_memc_kpcc_employee_item where Ei_EMP_ID = '" . $_POST['EID'] . "' and Ei_Quarter_ID = " . $data['quarter'][$i] . " and Ei_Im_ID = " . $data['Itm'][$i] . "";
        $result = $conn->query($sql); // find database by using staff no, quater id and item id
        if (mysqli_num_rows($result) > 0) { // if got the same data
            $row = $result->fetch_assoc(); 
            if ($row['Ei_Category'] != $data['Cat'][$i]) { // if data found category is not same with input (EXAMPLE : input is core and database is sub ), perform action
                $x = $conn -> query("select * from t_memc_kpcc_quarter where Q_ID = ".$data['quarter'][$i].""); // find this quarter belong to which year
                $year = $x -> fetch_assoc();
                $conn -> query("update t_memc_kpcc_employee_item set Ei_Category = '".$data['Cat'][$i]."' where Ei_Im_ID = ".$data['Itm'][$i]." 
                and Ei_Quarter_ID in (select Q_ID from t_memc_kpcc_quarter where Q_Year = '".$year['Q_Year']."')");  // update all category same with input that belong to year
            } 
            $sql = "update t_memc_kpcc_employee_item set Ei_Im_ID = " . $data['Itm'][$i] . ", Ei_ToDo_Desc = '" . $data['todo'][$i] . "', Ei_Category = '" . $data['Cat'][$i] . "', 
                Ei_Quarter_ID = " . $data['quarter'][$i] . ",Ei_Score = '".$data['score'][$i]."', Ei_Target_Score = " . $data['target'][$i] . ", Ei_Status = '1' where Ei_ID = " . $row['Ei_ID'] . "";
                // if category is same with database use this query 
                
        } else {
            $sql = "insert into t_memc_kpcc_employee_item (Ei_EMP_ID,Ei_Im_ID,Ei_ToDo_Desc,Ei_Category,Ei_Quarter_ID,Ei_Score,Ei_Target_Score,Ei_Status) values 
            ('" . $_POST['EID'] . "'," . $data['Itm'][$i] . ",'" . $data['todo'][$i] . "','" . $data['Cat'][$i] . "'," . $data['quarter'][$i] . ",'".$data['score'][$i]."'," . $data['target'][$i] . ",'1')";
        }
        $conn->query($sql);
    }
}
