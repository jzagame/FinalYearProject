<?php 
    error_reporting(0);
    include ("../../includes/database.php");
	$formdata = $_POST['formdata'];
	$flag = false;
    //Add Access Right
    if($_POST['action'] == "addAccessRight"){
		
		$SearchSQL= "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = '".trim($formdata[0]['value'])."'";
        $SearchResult = mysqli_query($conn,$SearchSQL);
		if(mysqli_num_rows($SearchResult) > 0)
		{
            echo "same";
		}
        else if(trim($formdata[0]['value']) == "")
        {
            echo "AR Null";
        }
        else
        {
            $AddAccessRightSQL = "INSERT INTO t_memc_kpcc_access_right(AR_Level, AR_Description, AR_Status) VALUES(
                '".trim($formdata[0]['value'])."',
                '".$formdata[1]['value']."',
                '".$formdata[2]['value']."'
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
		
		if(strtoupper(trim($formdata[0]['value'])) == "" || strtoupper(trim($formdata[1]['value'])) == "" || strtoupper(trim($formdata[2]['value'])) == "")
		{
			echo "fill";
		}
		else
		{
			$SearchSQL= "SELECT * FROM t_memc_kpcc_department_link WHERE D_Name = '".strtoupper(trim($formdata[0]['value']))."' AND D_HODID = 
			'".strtoupper(trim($formdata[1]['value']))."' AND D_HODNode = '".strtoupper(trim($formdata[2]['value']))."'";
			//echo "I am in";
			$SearchResult = mysqli_query($conn,$SearchSQL);
			if(mysqli_num_rows($SearchResult) > 0)
			{
				echo "Department Link is Existed";
			}
			else
			{
				$SearchDepartmentSQL = "SELECT COUNT(D_ID) AS userFound FROM t_memc_kpcc_department_link";
				$Result = mysqli_query($conn, $SearchDepartmentSQL);
				$row = mysqli_fetch_array($Result);
				if($row['userFound'] == 0)
				{
					$AddDepartmentSQL = "INSERT INTO t_memc_kpcc_department_link(D_Name, D_HODID, D_HODNode, D_Status) VALUES(
					'".strtoupper(trim($formdata[0]['value']))."',
					'".strtoupper(trim($formdata[1]['value']))."',
					'".strtoupper(trim($formdata[2]['value']))."',
					'1')";
				}

				else
				{
					$SID = "1" + $row['userFound'];
					$EmpID = "DEP-".sprintf('%04d', $SID);

					$AddDepartmentSQL = "INSERT INTO t_memc_kpcc_department_link(D_ID, D_Name, D_HODID, D_HODNode, D_Status) VALUES(
					'$EmpID',
					'".strtoupper(trim($formdata[0]['value']))."',
					'".strtoupper(trim($formdata[1]['value']))."',
					'".strtoupper(trim($formdata[2]['value']))."',
					'1')";
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
	}

    //Search Access Right
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
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Status</th>";
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
                        if($row['AR_Status'] == 1)
                        {
                            echo "<td>ACTIVE</td>";
                        }
                        else
                        {
                            echo "<td>INACTIVE</td>";
                        }
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

    //Edit Access Right
    if($_POST['action'] == "editAccessRight"){
        $arid = $_POST['accessright_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_ID = $arid";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            $row = mysqli_fetch_array($SearchResult);
?>
            <div class="container-fluid">
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
                    <div class="form-group row">
                    <div class="col-2">
                        <label class="col-form-label">Status</label>
                    </div>
					<div class="col-10">
                        <select class="form-control custom-select" name="txtARStatus">
                            <option value="1" <?php echo ($row['AR_Status'] == 1) ?  "selected" : "" ;  ?>>Active</option>
                            <option value="2" <?php echo ($row['AR_Status'] == 2) ?  "selected" : "" ;  ?>>Inactive</option>
                        </select>	
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

    //Update Access Right
    if($_POST['action'] == 'updateAccessRight'){
        $arid = $_POST['accessright_ID'];
        $SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = '".trim($formdata[0]['value'])."' AND AR_ID != $arid";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "same";
        }
        else if(trim($formdata[0]['value']) == "")
        {
            echo "AR Null";
        }
        else
        {
            $UpdateSQL = "UPDATE t_memc_kpcc_access_right SET AR_Level = '".trim($formdata[0]['value'])."',
            AR_Description = '".(trim($formdata[1]['value']))."',
            AR_Status = '".$formdata[2]['value']."'
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

    //Search Add Employee
    if($_POST['action'] == "searchEmployee"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail WHERE Emp_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%' AND EmpDetail_Status <> 'A'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover table-bordered\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\"></th>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Employee Number</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Employee Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\" value=\"".$row['EmpDetail_ID']."\" name=\"txtEmployeePass[]\"></td>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['Emp_ID']."</td>";
                        echo "<td>".$row['Emp_Name']."</td>";
                        echo "<td>".$row['Emp_Department']."</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
            echo "<div class=\"form-group\">";
                echo "<div class=\"col-12\" style=\"text-align: center;\">";
                    echo "<input type=\"button\" class=\"btn btn-primary mr-2\" name=\"btnAddEmployee\" value=\"Add\" onclick=\"AddEmployee()\">";
                    echo "<input type=\"reset\" class=\"btn btn-primary\" name=\"btnClear\" value=\"Clear\">";
                echo "</div>";
            echo "</div>";
        }
        else
        {
            echo "fail";
        }
    }

    //Add Employee
    if($_POST['action'] == "addEmployee"){
		$data = array();
        parse_str($formdata, $data);
        for($i = 0; $i < count($data['txtEmployeePass']); $i++)
        {
            $UpdateEmployeeSQL = "UPDATE t_memc_kpcc_employee_detail SET EmpDetail_Status = 'A' WHERE EmpDetail_ID = '".$data['txtEmployeePass'][$i]."'";
            $UpdateEmployeeResult = mysqli_query($conn,$UpdateEmployeeSQL);
        }
        
		if($UpdateEmployeeResult)
		{
            echo "success";
		}
        else
        {
            echo "fail";
        }
    }

    //Search Remove Employee
    if($_POST['action'] == "searchRemoveEmployee"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail WHERE Emp_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%' AND EmpDetail_Status = 'A'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover table-bordered\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\"></th>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Employee Number</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Employee Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\" value=\"".$row['EmpDetail_ID']."\" name=\"txtEmployeePass[]\"></td>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['Emp_ID']."</td>";
                        echo "<td>".$row['Emp_Name']."</td>";
                        echo "<td>".$row['Emp_Department']."</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
            echo "<div class=\"form-group\">";
                echo "<div class=\"col-12\" style=\"text-align: center;\">";
                    echo "<input type=\"button\" class=\"btn btn-primary mr-2\" name=\"btnRemoveEmployee\" value=\"Remove\" onclick=\"RemoveEmployee()\">";
                    echo "<input type=\"reset\" class=\"btn btn-primary\" name=\"btnClear\" value=\"Clear\">";
                echo "</div>";
            echo "</div>";
        }
        else
        {
            echo "fail";
        }
    }

    //Remove Employee
    if($_POST['action'] == "removeEmployee"){
		$data = array();
        parse_str($formdata, $data);
        for($i = 0; $i < count($data['txtEmployeePass']); $i++)
        {
            $UpdateEmployeeSQL = "UPDATE t_memc_kpcc_employee_detail SET EmpDetail_Status = 'D' WHERE EmpDetail_ID = '".$data['txtEmployeePass'][$i]."'";
            $UpdateEmployeeResult = mysqli_query($conn,$UpdateEmployeeSQL);
        }
        
		if($UpdateEmployeeResult)
		{
            echo "success";
		}
        else
        {
            echo "fail";
        }
    }

    //Seacrh Assign Position Employee
    if($_POST['action'] == "searchAPEmployee"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail WHERE Emp_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%' AND EmpDetail_Status = 'A' AND EmpAssign_Status = 2";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover table-bordered\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\"></th>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Employee Number</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\" value=\"".$row['EmpDetail_ID']."\" name=\"chkEmployee[]\"></td>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['Emp_ID']."</td>";
                        echo "<td>".$row['Emp_Name']."</td>";
                        echo "<td>".$row['Emp_Department']."</td>";
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

    //Assign Position
    if($_POST['action'] == "assignPosition"){
		$data = array();
        parse_str($formdata, $data);
        for($i = 0; $i < count($data['chkEmployee']); $i++)
        {
            $AssignPositionSQL = "INSERT INTO t_memc_kpcc_report_to(RT_Emp_ID, Report_To_Emp_ID) VALUES(
                '".$data['chkEmployee'][$i]."',
                '".$data['txtReportingTo']."'
                )";
            $AssignPositionResult = mysqli_query($conn, $AssignPositionSQL);

            $UpdateAPSQL = "UPDATE t_memc_kpcc_employee_detail SET Emp_P_ID = '".$data['txtAccessRight']."',
            EmpAssign_Status = 1
            WHERE Emp_ID = '".$data['chkEmployee'][$i]."'";
            $UpdateAPResult = mysqli_query($conn, $UpdateAPSQL);
        }
        
		if($AssignPositionResult && $UpdateAPResult)
		{
            echo "success";
		}
        else
        {
            echo "fail";
        }
    }

    //Seacrh View/Edit Assign Position
    if($_POST['action'] == "searchVEPEmployee"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_kpcc_access_right, t_memc_kpcc_report_to 
        WHERE Emp_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%' 
        AND EmpDetail_Status = 'A' AND EmpAssign_Status = 1
        AND t_memc_kpcc_employee_detail.Emp_P_ID = t_memc_kpcc_access_right.AR_ID
        AND t_memc_kpcc_employee_detail.Emp_ID = t_memc_kpcc_report_to.RT_Emp_ID";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover table-bordered\">";
                echo "<thead>";
                echo "<tr>";
                    echo "<th scope=\"col\"></th>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Employee Number</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Access Right</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Reporting-To</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                    {
                        $row = mysqli_fetch_array($SearchResult);
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\" value=\"".$row['EmpDetail_ID']."\" name=\"chkEmployee[]\"></td>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$row['Emp_ID']."</td>";
                        echo "<td>".$row['Emp_Name']."</td>";
                        echo "<td>".$row['Emp_Department']."</td>";
                        echo "<td>".$row['AR_Level']."</td>";
                        echo "<td>".$row['Report_To_Emp_ID']."</td>";
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

    //Update Position
    if($_POST['action'] == "updatePosition"){
		$data = array();
        parse_str($formdata, $data);
        for($i = 0; $i < count($data['chkEmployee']); $i++)
        {
            $UpdateAccessRightSQL = "UPDATE t_memc_kpcc_employee_detail SET Emp_P_ID = '".$data['txtAccessRight']."'
            WHERE Emp_ID = '".$data['chkEmployee'][$i]."'";
            $UpdateAccessRightResult = mysqli_query($conn, $UpdateAccessRightSQL);

            $UpdateReportToSQL = "UPDATE t_memc_kpcc_report_to SET Report_To_Emp_ID = '".$data['txtReportingTo']."'
            WHERE RT_Emp_ID = '".$data['chkEmployee'][$i]."'";
            $UpdateReportToResult = mysqli_query($conn, $UpdateReportToSQL);
        }
        
		if($UpdateAccessRightResult && $UpdateReportToResult)
		{
            echo "success";
		}
        else
        {
            echo "fail";
        }
    }

	if($_POST['action'] == "searchDepartment"){
        $SearchSQL = "SELECT * FROM t_memc_kpcc_department_link WHERE D_Name LIKE '%".strtoupper(trim($formdata[0]['value']))."%'";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            echo "<table class=\"table table-hover table-bordered\">";
			echo "<thead";
                echo "<tr>";
                    echo "<th scope=\"col\">No.</th>";
                    echo "<th scope=\"col\">Department Name</th>";
                    echo "<th scope=\"col\" style=\"vertical-align:middle\">Department HOD Name</th>";
					echo "<th scope=\"col\" style=\"vertical-align:middle\">Parent Department</th>";
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
                                echo "<td>".$row['D_HODID']."</td>";
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
        $SearchSQL = "SELECT * FROM t_memc_kpcc_department_link WHERE D_ID = $did";
        $SearchResult = mysqli_query($conn, $SearchSQL);
        if(mysqli_num_rows($SearchResult) > 0)
        {
            $row = mysqli_fetch_array($SearchResult);
?>
            <div class="container-fluid">
            <form method="" id="UpdateDepartmentForm">
                <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active"><h5 class="m-0">Edit Department</h5></li>
        </ul>
                <hr class="bdr-light">
                <div class="container-fluid" style="padding: 0px 50px 0px 100px;">
                    <div class="form-group row">
						<div class="col-2">
                        <label>Department Name</label>
						</div>
                        <div class="col-10">
                            <select class= "custom-select" name="sltD">
                                        <option value=""></option>
                                        <?php
                                            $SCSQLL = "SELECT * FROM t_memc_department";
											//$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
                                            $SCResultt = mysqli_query($conn, $SCSQLL);
							
                                            if(mysqli_num_rows($SCResultt)>0)
                                            {
                                                for($i=0;$i<mysqli_num_rows($SCResultt);++$i)
                                                {
                                                    $scroww = mysqli_fetch_array($SCResultt);
													$s = explode("-", $row['D_Name']);
													//echo $s[0];
													//echo "<script>alert('.$s[0].');</script>";
                                        ?>
                                                    <option value="<?php echo $scroww['D_DID']."-".$scroww['D_Name'];?>"<?php echo ($scroww['D_DID'] == $s[0]) ? "selected" : "" ;?>><?php echo $scroww['D_DID']; echo $scroww['D_Name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>	
                        </div>
                    </div>
                    <div class="form-group row">
						<div class="col-2">
                        <label>Department HOD Name</label>
						</div>
                        <div class="col-10">
                            <select class= "custom-select" name="sltHOD">
                                        <option value=""></option>
                                        <?php
                                            $SCSQL = "SELECT * FROM t_memc_kpcc_employee_detail";
											//$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
                                            $SCResult = mysqli_query($conn, $SCSQL);
							
                                            if(mysqli_num_rows($SCResult)>0)
                                            {
                                                for($i=0;$i<mysqli_num_rows($SCResult);++$i)
                                                {
                                                    $scrow = mysqli_fetch_array($SCResult);
                                        ?>
                                                    <option value="<?php echo $scrow['Emp_ID'];?>"<?php echo ($scrow['Emp_ID'] == $row['D_HODID']) ? "selected" : "" ;?>><?php echo $scrow['Emp_ID']; echo $scrow['Emp_Name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>	
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-2">
                        <label>Parent Department</label>
						</div>
                        <div class="col-10">
                            <select class= "custom-select" name="sltPD">
                                        <option value=""></option>
                                        <?php
                                            $SCSQLL = "SELECT * FROM t_memc_department";
											//$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
                                            $SCResultt = mysqli_query($conn, $SCSQLL);
							
                                            if(mysqli_num_rows($SCResultt)>0)
                                            {
                                                for($i=0;$i<mysqli_num_rows($SCResultt);++$i)
                                                {
                                                    $scroww = mysqli_fetch_array($SCResultt);
													$s = explode("-", $row['D_HODNode']);
													//echo $s[0];
													//echo "<script>alert('.$s[0].');</script>";
                                        ?>
                                                    <option value="<?php echo $scroww['D_DID']."-".$scroww['D_Name'];?>"<?php echo ($scroww['D_DID'] == $s[0]) ? "selected" : "" ;?>><?php echo $scroww['D_DID']; echo $scroww['D_Name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>	
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
            $UpdateSQL = "UPDATE t_memc_kpcc_department_link SET D_Name = '".strtoupper(trim($formdata[0]['value']))."',
            D_HODID = '".strtoupper(trim($formdata[1]['value']))."',
			D_HODNode = '".strtoupper(trim($formdata[2]['value']))."'
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