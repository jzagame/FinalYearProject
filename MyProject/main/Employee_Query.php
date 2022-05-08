<?php 
    error_reporting(0);
    include ("../../includes/database.php");
	$formdata = $_POST['formdata'];
	$flag = false; 
    if($_POST['action'] == "addAccessRight"){
		
		$SearchSQL= "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = '".trim($formdata[0]['value'])."'";
        $SearchResult = mysqli_query($conn,$SearchSQL);
		if(mysqli_num_rows($SearchResult) > 0)
		{
            echo "same";
		}
        else
        {
            $AddAccessRightSQL = "INSERT INTO t_memc_kpcc_access_right(AR_Level, AR_Description) VALUES(
                '".trim($formdata[0]['value'])."',
                '".$formdata[1]['value']."'
            )";
            $AddAccessRightResult = mysqli_query($conn, $AddAccessRightSQL);
            if($AddAccessRightResult)
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

    if($_POST['action'] == "searchAccessRight"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level LIKE '%".trim($formdata[0]['value'])."%'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover table-bordered\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Level</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Description</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr role=\"button\" onClick=\"editAccessRight('".$row['AR_ID']."')\">";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['AR_Level']."</td>";
                        echo "<td>".$row['AR_Description']."</td>";
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

    if($_POST['action'] == "editAccessRight"){
        $arid = $_POST['accessright_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_ID = $arid";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            $row = mysqli_fetch_array($SearchResult);
?>
            <div class="container-fluid" style="padding-top: 30px;">
            <form method="" id="UpdateAccessRightForm">
                <ul class="list-group mt-2 mb-2">
                    <li class="list-group-item active"><h5 class="m-0">Edit Access Right</h5></li>
                </ul>
                <hr class="bdr-light">
                <div class="container-fluid">
                    <div class="form-group row">
                        <div class="col-2">
                            <label class="col-form-label">Access Right Level</label>
                        </div>
                        <div class="col-10">
                            <input type="number" class="form-control" value="<?php echo $row['AR_Level'];?>" name="txtAccessRoghtLevel" min="0" step="1">	
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2">
                            <label class="col-form-label">Description</label>
                        </div>
                        <div class="col-10">
                            <textarea class="form-control" name="txtAccessRightDescription" rows="4"><?php echo $row['AR_Description'];?></textarea>	
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnBack" value="Back" onClick="location='Employee_ViewEditPosition.php'">
                        <input type="button" class="btn btn-primary" name="btnUAccessRight" value="Update" onClick="UpdateAccessRight(<?php echo $row['AR_ID'];?>)">
                    </div>
                    </div>
                </div>
            </form>
            </div>
<?php
        }
    }

    if($_POST['action'] == 'updateAccessRight'){
        $arid = $_POST['accessright_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = '".trim($formdata[0]['value'])."' AND AR_ID != $arid";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "same";
        }
        else
        {
            $UpdateSQL = "UPDATE t_memc_kpcc_access_right SET AR_Level = '".trim($formdata[0]['value'])."',
            AR_Description = '".(trim($formdata[1]['value']))."'
            WHERE AR_ID = $arid";
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

	if($_POST['action'] == "searchDepartment"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover\">";
			echo "<thead class=\"thead-dark\">";
                echo "<tr>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Department Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Department HOD Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Quarter</th>";
					echo "<th scope=\"col\" style=\"vertical-align:middle\">Year</th>";
					echo "<th scope=\"col\" style=\"vertical-align:middle\">Node</th>";
					echo "<th scope=\"col\" style=\"vertical-align:middle\">Status</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                                echo "<tr role=\"button\" onClick=\"editDepartment('".$row['D_ID']."')\">";
                                echo "<td>".$row['D_ID']."</td>";
                                echo "<td>".$row['D_Name']."</td>";
                                echo "<td>".$row['D_HODName']."</td>";
                                echo "<td>".$row['D_Quarter']."</td>";
								echo "<td>".$row['D_Year']."</td>";
								echo "<td>".$row['D_HODNode']."</td>";
								echo "<td>".$row['D_Status']."</td>";
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

	if($_POST['action'] == "editDepartment"){
        $did = $_POST['D_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            $row = mysqli_fetch_array($SearchResult);
?>
            <div class="container" style="padding: 50px 0px 50px 100px;">
            <form method="" id="UpdateDepartmentForm">
                <div class="form-group d-flex justify-content-center">
                    <h3><strong>Edit Department</strong></h3>
                </div>
                <hr class="bdr-light">
                <div class="container" style="padding: 0px 50px 0px 100px;">
                    <div class="form-group">
                        <label class="col-form-label">Department Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="<?php echo $row['D_Name'];?>" name="txtDepartmentName">	
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Department HOD Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="<?php echo $row['D_HODName'];?>" name="txtDepartmentHOD">	
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-form-label">Quarter</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" value="<?php echo $row['D_Quarter'];?>" name="txtQuarter">	
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-form-label">Year</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" value="<?php echo $row['D_Year'];?>" name="txtYear">	
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-form-label">Node</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="<?php echo $row['D_HODNode'];?>" name="txtNode">	
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnBack" value="Back" onClick="location='Employee_ViewEditDepartment.php'">
                        <input type="button" class="btn btn-primary" name="btnUDepartment" value="Update" onClick="UpdateDepartment(<?php echo $row['D_ID'];?>)">
                    </div>
                    </div>
                </div>
            </form>
            </div>
<?php
        }
    }
	
	if($_POST['action'] == 'updateDepartment'){
        $did = $_POST['D_ID'];
            $UpdateSQL = "UPDATE t_memc_kpcc_department SET D_Name = '".strtoupper(trim($formdata[0]['value']))."',
            D_HODName = '".strtoupper(trim($formdata[1]['value']))."',
			D_Quarter = '".$formdata[2]['value']."',
			D_Year = '".$formdata[3]['value']."',
			D_HODNode = '".strtoupper(trim($formdata[4]['value']))."'
            WHERE D_ID = $did";
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
?>