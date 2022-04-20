<?php 
    error_reporting(0);
    include "database/conn.php";
    $action = $_POST['action'];
    $formdata = $_POST['formdata'];

    if($action == "addcompetencies"){
        $sql = "insert into employee_item(Ei_Emp_ID,Ei_Im_ID,Ei_Date_Assign,Ei_Date_Participate,Ei_Time_Participate,Ei_Date_End,
        Ei_time_End,Ei_Category,Ei_Target_Score,Ei_desp,Ei_Status) values ('".$_POST['EID']."','".$formdata[3]['value']."','".$formdata[5]['value']."',
        '".$formdata[5]['value']."','".$formdata[7]['value']."','".$formdata[6]['value']."','".$formdata[8]['value']."','".$formdata[2]['value']."',
        '".$formdata[3]['value']."','".$formdata[4]['value']."','Active')";
        $conn -> query($sql);
    }
?>