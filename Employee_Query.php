<?php 
    error_reporting(0);
    include ("database/database.php");
	$formdata = $_POST['formdata'];
	$flag = false; 
    if($_POST['action'] == "addPosition"){
		
		$SearchSQL= "SELECT * FROM t_memc_kpcc_position WHERE P_name = '".strtoupper(trim($formdata[0]['value']))."'";
        $SearchResult = mysqli_query($conn,$SearchSQL);
		if(mysqli_num_rows($SearchResult) > 0)
		{
            echo "same";
		}
        else
        {
            $AddPositionSQL = "INSERT INTO t_memc_kpcc_position(P_name, P_level, P_Status) VALUES(
                '".strtoupper(trim($formdata[0]['value']))."',
                '".$formdata[1]['value']."',
                'ACTIVE'
            )";
            $AddPositionResult = mysqli_query($conn, $AddPositionSQL);
            if($AddPositionResult)
            {
                echo "success";
            }
            else
            {
                echo "fail";
            }
        }
    }

	if($_POST['action'] == "addDepartment"){
		
		$SearchSQL= "SELECT * FROM t_memc_kpcc_department WHERE D_Name = '".strtoupper(trim($formdata[0]['value']))."'";
		//echo "I am in";
        $SearchResult = mysqli_query($conn,$SearchSQL);
		if(mysqli_num_rows($SearchResult) > 0)
		{
            echo "Department Name is Existed";
		}
        else
        {
            $SearchDepartmentSQL = "SELECT COUNT(D_ID) AS userFound FROM t_memc_kpcc_department";
			$Result = mysqli_query($conn, $SearchDepartmentSQL);
			$row = mysqli_fetch_array($Result);
			if($row['userFound'] == 0)
			{
				$AddDepartmentSQL = "INSERT INTO t_memc_kpcc_department(D_Name, D_HODName, D_Quarter, D_Year, D_HODNode, D_Status) VALUES(
                '".strtoupper(trim($formdata[0]['value']))."',
				'".strtoupper(trim($formdata[1]['value']))."',
                '".$formdata[2]['value']."',
				'".$formdata[3]['value']."',
				'".strtoupper(trim($formdata[4]['value']))."',
                'A')";
			}
			
			else
			{
				$SID = "1" + $row['userFound'];
				$EmpID = "DEP-".sprintf('%04d', $SID);
				
				$AddDepartmentSQL = "INSERT INTO t_memc_kpcc_department(D_ID, D_Name, D_HODName, D_Quarter, D_Year, D_HODNode, D_Status) VALUES(
				'$EmpID',
                '".strtoupper(trim($formdata[0]['value']))."',
				'".strtoupper(trim($formdata[1]['value']))."',
                '".$formdata[2]['value']."',
				'".$formdata[3]['value']."',
				'".strtoupper(trim($formdata[4]['value']))."',
                'A')";
			}
			
            $AddDepartmentResult = mysqli_query($conn, $AddDepartmentSQL);
            if($AddDepartmentResult)
            {
                echo "success";
            }
            else
            {
                echo "fail";
            }

        }
    }

?>