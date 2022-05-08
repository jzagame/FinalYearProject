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
					Emp_Name VARCHAR(99),
					Emp_Email VARCHAR(50),
                    EmpDetail_Status VARCHAR(20))",
					"CREATE TABLE t_memc_kpcc_Department(D_ID INT AUTO_INCREMENT PRIMARY KEY,
                    D_Name VARCHAR(50),
                    D_HODID VARCHAR(50),
					D_Q_ID_start VARCHAR(10),
					D_Q_ID_END INT,
					D_HODNode VARCHAR(50),
                    D_Status CHAR(1))",
          "CREATE TABLE t_memc_kpcc_Access_Right (AR_ID INT AUTO_INCREMENT PRIMARY KEY,
                    AR_Level INT,
                    AR_Description VARCHAR(99),
					          AR_Status VARCHAR(10))"
                    
                    
    );
	$conn = mysqli_connect($localhost,$username,$password) or die(mysql_error()); 
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
	}
	else
	{
		echo "Fail connecting to Database Server.";
	}

?>