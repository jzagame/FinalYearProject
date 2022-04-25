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

    if($_POST['action'] == "searchPosition"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_position WHERE P_name LIKE '%".strtoupper(trim($formdata[0]['value']))."%'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Position Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Level</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Status</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr role=\"button\" onClick=\"editPosition('".$row['P_ID']."')\">";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['P_name']."</td>";
                        echo "<td>".$row['P_level']."</td>";
                        echo "<td>".$row['P_Status']."</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        }
        else
        {
            echo "fail";
        }
    }

    if($_POST['action'] == "editPosition"){
        $pid = $_POST['position_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_position WHERE P_ID = $pid";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            $row = mysqli_fetch_array($SearchResult);
?>
            <div class="container" style="padding: 50px 0px 50px 100px;">
            <form method="" id="UpdatePositionForm">
                <div class="form-group d-flex justify-content-center">
                    <h3><strong>Edit Position Category</strong></h3>
                </div>
                <hr class="bdr-light">
                <div class="container" style="padding: 0px 50px 0px 100px;">
                    <div class="form-group">
                        <label class="col-form-label">Position Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="<?php echo $row['P_name'];?>" name="txtPositionName">	
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Level</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" value="<?php echo $row['P_level'];?>" name="txtPositionLevel" min="0" step="1">	
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnBack" value="Back" onClick="location='Employee_ViewEditPosition.php'">
                        <input type="button" class="btn btn-primary" name="btnUPosition" value="Update" onClick="UpdatePosition(<?php echo $row['P_ID'];?>)">
                    </div>
                    </div>
                </div>
            </form>
            </div>
<?php
        }
    }

    if($_POST['action'] == 'updatePosition'){
        $pid = $_POST['position_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_position WHERE P_name = '".strtoupper(trim($formdata[0]['value']))."'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "same";
        }
        else
        {
            $UpdateSQL = "UPDATE t_memc_kpcc_position SET P_name = '".strtoupper(trim($formdata[0]['value']))."',
            P_level = '".$formdata[1]['value']."'
            WHERE P_ID = $pid";
            $UpdateResult = mysqli_query($conn, $UpdateSQL);
            if($UpdateResult)
            {
                echo "success";
            }
            else
            {
                echo "fail";
            }
        }
    }

    if($_POST['action'] == "searchEmployee"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail WHERE Emp_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\"></th>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Employee Number</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Employee Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Email</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\" name=\"".$row['Emp_Detail_ID']."\"></td>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['P_name']."</td>";
                        echo "<td>".$row['P_level']."</td>";
                        echo "<td>".$row['P_Status']."</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        }
        else
        {
            echo "fail";
        }
    }
?>