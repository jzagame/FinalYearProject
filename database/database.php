<?php 
	$username="username";
	$password="password";
	$localhost="localhost";
	//$localhost="http://www.myapps.com:3306";
	$dbname="dbkpcc";
	$tables = array("CREATE TABLE MajorCompetencies(Mc_ID INT AUTO_INCREMENT PRIMARY KEY,
	                 Mc_name VARCHAR(30),
	                 Mc_status CHAR(1))",
                    "CREATE TABLE CoreCompetencies (Cc_ID INT AUTO_INCREMENT PRIMARY KEY,
				    Cc_Mc_ID INT,
				    Cc_Name VARCHAR(30),
				    Cc_Description VARCHAR(1000),
				    Cc_status CHAR(1))",
                    "CREATE TABLE Items (Im_ID INT AUTO_INCREMENT PRIMARY KEY,
                    Im_Cc_ID INT,
				    Im_Name VARCHAR(30),
				    Im_Description VARCHAR(1000),
				    Im_lv1_Desc VARCHAR(2000),
                    Im_lv2_Desc VARCHAR(2000),
				    Im_lv3_Desc VARCHAR(2000),
				    Im_Lv4_Desc VARCHAR(2000),
				    Im_Lv5_Desc VARCHAR(2000),
				    Im_Status CHAR(1))",
				    "CREATE TABLE Learning_Path(Lh_ID INT AUTO_INCREMENT PRIMARY KEY,
				    Lh_Emp_ID VARCHAR(30),
				    Lh_Total_Core INT,
				    Lh_Total_Sub  INT,
				    Lh_Status CHAR(1))",
                    "CREATE TABLE Employee_item(Ei_ID INT AUTO_INCREMENT PRIMARY KEY,
                    Ei_Lh_ID INT,
                    Ei_Im_ID INT,
                    Ei_Date_Assign VARCHAR(20),
                    Ei_Date_Participate VARCHAR(20),
                    Ei_Time_Participate VARCHAR(20),
                    Ei_Category VARCHAR(20),
                    Ei_Score VARCHAR(20),
                    Ei_Target_Score INT,
                    Ei_Status VARCHAR(10))",
                    "CREATE TABLE Employee_detail(EmpDetail_ID INT AUTO_INCREMENT PRIMARY KEY,
                    Emp_ID VARCHAR(30),
                    Emp_P_ID INT,
                    EmpDetail_Status VARCHAR(20))",
                    "CREATE TABLE Position (P_ID INT AUTO_INCREMENT PRIMARY KEY,
                    P_name VARCHAR(30),
                    P_level VARCHAR(10),
                    P_Status VARCHAR(10)))"
                    
                    
    );
	$link = mysqli_connect($localhost,$username,$password) or die(mysql_error()); 
	//$link = mysqli_connect($localhost,$username,$password);
	if($link)
	{
		if(!mysqli_select_db($link,$dbname))
		{
			$sql="CREATE DATABASE ".$dbname;
			//$result= mysql_query($sql,$link);
			$result= mysqli_query($link,$sql);
		}
		//mysql_select_db($dbname);
		mysqli_select_db($link,$dbname);
		for($i=0;$i<count($tables);++$i)
		{
			mysqli_query($link,$tables[$i]);	
		}
	}
	else
	{
		echo "Fail connecting to Database Server.";
	}

?>