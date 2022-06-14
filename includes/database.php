<?php 
	$username="username";
	$password="password";
	$localhost="localhost";
	//$localhost="http://www.myapps.com:3306";
	$dbname="dbkpcc";
	$tables = array("CREATE TABLE  t_memc_kpcc_CoreCompetencies(Cc_ID INT AUTO_INCREMENT PRIMARY KEY,
	                 Cc_name VARCHAR(255),
	                 Cc_status CHAR(1)) character set = utf8mb4",
                    "CREATE TABLE t_memc_kpcc_CompetenciesDimension (Cd_ID INT AUTO_INCREMENT PRIMARY KEY,
				    Cd_Cc_ID INT,
				    Cd_Name VARCHAR(255),
				    Cd_Definition VARCHAR(10000),
				    Cd_status CHAR(1)) character set = utf8mb4",
                    "CREATE TABLE t_memc_kpcc_Items (Im_ID INT AUTO_INCREMENT PRIMARY KEY,
                    Im_Cd_ID INT,
					Im_UID VARCHAR(30),
				    Im_Name VARCHAR(1000),
				    Im_Definition LONGTEXT,
				    Im_Status CHAR(1)) character set = utf8mb4",
					"CREATE TABLE t_memc_kpcc_Items_lvl_desc (Im_lvl_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    Im_lvl_Im_ID INT,
				    Im_lvl_Name VARCHAR(20),
				    Im_lvl_Description VARCHAR(1000),
				    Im_lvl_Status CHAR(1)) character set = utf8mb4",
				    "CREATE TABLE t_memc_kpcc_Learning_Path(Lh_ID INT AUTO_INCREMENT PRIMARY KEY,
				    Lh_Emp_ID VARCHAR(30),
				    Lh_Total_Core INT,
				    Lh_Total_Sub  INT,
				    Lh_Status CHAR(1))",
                    "CREATE TABLE t_memc_kpcc_Employee_item(Ei_ID INT AUTO_INCREMENT PRIMARY KEY,
                    Ei_Lh_ID INT,
                    Ei_Im_ID INT,
                    Ei_Date_Assign VARCHAR(20),
                    Ei_Date_Participate VARCHAR(20),
					Ei_Date_End VARCHAR(20),
					Ei_Description VARCHAR(2000),
                    Ei_Category VARCHAR(20),
                    Ei_Score VARCHAR(20),
                    Ei_Target_Score INT,
                    Ei_Status VARCHAR(10))",
                    "CREATE TABLE t_memc_kpcc_Employee_detail(EmpDetail_ID INT AUTO_INCREMENT PRIMARY KEY,
					EMP_D_ID INT,
                    Emp_ID VARCHAR(30),
                    Emp_P_ID INT,
					Emp_Name VARCHAR(200),
					Emp_Department VARCHAR(50),
					Emp_JobBand INT,
                    EmpDetail_Status INT,
					EmpAssign_Status INT)",
					"CREATE TABLE t_memc_kpcc_Department(D_ID INT AUTO_INCREMENT PRIMARY KEY,
                    D_Name VARCHAR(50),
                    D_HODID VARCHAR(50),
					D_HODNode VARCHAR(50),
                    D_Status CHAR(1))",
					"CREATE TABLE t_memc_kpcc_Report_To(RT_ID INT AUTO_INCREMENT PRIMARY KEY,
					RT_Emp_ID VARCHAR(30),
					Report_To_Emp_ID VARCHAR(30))",
          			"CREATE TABLE t_memc_kpcc_Access_Right (AR_ID INT AUTO_INCREMENT PRIMARY KEY,
                    AR_Level INT,
                    AR_Description VARCHAR(99),
					AR_Status INT)",
					"CREATE TABLE t_memc_staff(stf_id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
					stf_password VARCHAR(200),
					stf_name VARCHAR(200),
					stf_position_id INT(11),
					stf_department_id INT(11),
					stf_report_to_user_id INT(11),
					stf_type VARCHAR(20),
					stf_employee_number VARCHAR(20),
					stf_email VARCHAR(200),
					stf_user_status INT(11),
					stf_gender VARCHAR(20),
					stf_shift_id INT(11),
					stf_plant VARCHAR(20),
					stf_position_category VARCHAR(20),
					stf_grade INT(11)
					)",
					"CREATE TABLE t_memc_kpcc_employee_profile(ep_id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
					ep_number VARCHAR(200),
					ep_workexperience VARCHAR(200),
					ep_strength VARCHAR(200),
					ep_weakness VARCHAR(200)
					)",
					"CREATE TABLE t_memc_department(dpt_id INT(11) Primary Key NOT NULL,
					dpt_name VARCHAR(200)
					)",
					"CREATE TABLE t_memc_position(pos_id INT(11) PRIMARY KEY NOT NULL,
					pos_name VARCHAR(200))"
    );
	
	$conn = mysqli_connect($localhost,$username,$password); 
	//$conn = mysqli_connect($localhost,$username,$password);
	if($conn)
	{
		if(!mysqli_select_db($conn,$dbname))
		{
			$sql="CREATE DATABASE ".$dbname;
			//$result= mysql_query($sql,$conn);
			$result= mysqli_query($conn,$sql);
		}
		//mysql_select_db($dbname);
		mysqli_select_db($conn,$dbname);
		for($i=0;$i<count($tables);++$i)
		{
			mysqli_query($conn,$tables[$i]);	
		}

		$ARSearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = 0";
		$ARSearchResult = mysqli_query($conn, $ARSearchSQL);
		if(mysqli_num_rows($ARSearchResult)>0)
		{
			//Nothing
		}
		else
		{
			$DefaultSQL = "INSERT INTO t_memc_kpcc_access_right(AR_Level, AR_Description, AR_Status) VALUES(0, 'Superuser', 0)";
			$DefaultResult = mysqli_query($conn, $DefaultSQL);	
		}
	}
	else
	{
		echo "Fail connecting to Database Server.";
	}
?>