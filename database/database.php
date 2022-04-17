<?php 
    include "conn.php";
    $sqlquery = array(
            "Create table if not exists MajorCompetencies(Mc_ID int auto_increment primary key, Mc_name varchar(30), Mc_status varchar(1))",
            "Create table if not exists CoreCompetencies (Cc_ID int auto_increment primary key,Cc_Mc_ID int,Cc_Name varchar(30),Cc_Description varchar(1000),Cc_status varchar(1))",
            "Create table if not exists Items (Im_ID int auto_increment primary key, Im_Cc_ID int, Im_Name varchar(30), Im_Description varchar(1000),Im_lv1_Desc varchar(2000),
            Im_lv2_Desc varchar(2000),Im_lv3_Desc varchar(2000),Im_Lv4_Desc varchar(2000),Im_Lv5_Desc varchar(2000),Im_Status varchar(1))",
            //first 3 belong to competencies
            "Create table if not exists Learning_Path(Lh_ID int auto_increment primary key, Lh_Emp_ID varchar(30), Lh_Total_Core int, Lh_Total_Sub int, Lh_Status varchar(1))",
            "Create table if not exists Employee_item(Ei_ID int auto_increment primary key,Ei_Lh_ID int, Ei_Im_ID int, Ei_Date_Assign varchar(20),  Ei_Date_Participate varchar(20),
            Ei_Time_Participate varchar(20), Ei_Category varchar(20), Ei_Score varchar(20),Ei_Target_Score varchar(20), Ei_Status varchar(10))",
            // 4 - 5 belong to employee training
            "Create table if not exists Employee_detail(EmpDetail_ID int auto_increment primary key,Emp_ID varchar(30) ,Emp_P_ID int, EmpDetail_Status varchar(20))",
            "Create table if not exists Position (P_ID int auto_increment primary key, P_name varchar(30), P_level varchar(10), P_Status varchar(10))" 
            //6-7 belong to employee      
        );

    foreach($sqlquery as $sqlq){
        if($conn -> query($sqlq) == false){
            echo "Failed create table : " . $sqlq . "<br>" . $conn->error; // if table creation fail will print error
            break;
        }
    }

    $conn->close();

    //only conn.php need include, database.php not necessary because it only use for create table 
?>