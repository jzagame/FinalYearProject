<?php
error_reporting(0);
include "database/conn.php";
$action = $_POST['action'];
$formdata = $_POST['formdata'];

if ($action == "addcompetencies") {
    for ($i = 0; $i < count($formdata); $i += 6) {
        $sql = "insert into t_memc_kpcc_employee_item(Ei_Emp_ID,Ei_Im_ID,Ei_Date_Assign,Ei_Date_Participate,Ei_Date_End,Ei_Category,Ei_Target_Score,Ei_desp,Ei_Status) 
        values ('" . $_POST['EID'] . "','" . $formdata[$i]['value'] . "','" . $formdata[$i+4]['value'] . "','" . $formdata[$i+4]['value'] . "','" 
        . $formdata[$i+5]['value'] . "','" . $formdata[$i+1]['value'] . "','" . $formdata[$i+2]['value'] . "','" . $formdata[$i+3]['value'] . "','Active')";
        echo $sql;
        $conn->query($sql);
    }
}
