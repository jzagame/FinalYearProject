<?php
error_reporting(0);
include "database/conn.php";
$action = $_POST['action'];
$formdata = $_POST['formdata'];

if ($action == "addcompetencies") {
    $temp = array();
    parse_str($formdata,$temp);
    print_r($temp);
    
}

if($action == "Edit_Emp_Item_Detail"){
    $sql = "update t_memc_kpcc_employee_item Set Ei_Im_ID = '".$formdata[1]['value']."',Ei_Date_Participate = '".$formdata[5]['value']."',Ei_Date_End = '".$formdata[6]['value']."'
    ,Ei_Category = '".$formdata[3]['value']."',Ei_Target_Score = '".$formdata[2]['value']."',Ei_desp = '".$formdata[4]['value']."',Ei_Status = '".$formdata[7]['value']."'
    where Ei_ID = ".(int)$formdata[0]['value']."";
    $conn -> query($sql);
}
?>
