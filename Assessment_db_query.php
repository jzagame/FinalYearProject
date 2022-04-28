<?php
error_reporting(0);
include "database/conn.php";
$action = $_POST['action'];
$formdata = $_POST['formdata'];

if ($action == "addcompetencies") {
    for ($i = 0; $i < count($formdata); $i += 7) {
        $sql = "insert into t_memc_kpcc_employee_item(Ei_Emp_ID,Ei_Im_ID,Ei_Date_Assign,Ei_Date_Participate,Ei_Date_End,Ei_Category,Ei_Target_Score,Ei_desp,Ei_Quarter_ID,Ei_Status) 
        values ('" . $_POST['EID'] . "','" . $formdata[$i+1]['value'] . "','" . $formdata[$i+5]['value'] . "','" . $formdata[$i+5]['value'] . "','" 
        . $formdata[$i+6]['value'] . "','" . $formdata[$i+2]['value'] . "','" . $formdata[$i+3]['value'] . "','" . $formdata[$i+4]['value'] . "','".$formdata[$i]['value']."','Active')";
        $conn->query($sql);
        echo $sql;
    }
}

if($action == "Edit_Emp_Item_Detail"){
    $sql = "update t_memc_kpcc_employee_item Set Ei_Im_ID = '".$formdata[1]['value']."',Ei_Date_Participate = '".$formdata[5]['value']."',Ei_Date_End = '".$formdata[6]['value']."'
    ,Ei_Category = '".$formdata[3]['value']."',Ei_Target_Score = '".$formdata[2]['value']."',Ei_desp = '".$formdata[4]['value']."',Ei_Status = '".$formdata[7]['value']."'
    where Ei_ID = ".(int)$formdata[0]['value']."";
    $conn -> query($sql);
}
?>
