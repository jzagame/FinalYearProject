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

?>