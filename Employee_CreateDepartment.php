<?php
    session_start();
    error_reporting(0);
    include("database/database.php");
    include("MenuBar.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>
            Key Position Core Competencies
        </title>
    </head>

    <body>
		<?php
			
			if($_POST['btnCDep']){

			$TestName = "SELECT * FROM Department WHERE D_Name = '".strtoupper(trim($_POST['txtDName']))."' AND D_Status='A'";
			$TestResult = mysqli_query($link, $TestName);
			if(mysqli_num_rows($TestResult) > 0)
			{
				echo "<script>alert('Department Name Repeated, Add Failure');</script>";
				echo "<script>location = 'Employee_CreateDepartment.php'</script>";
			}
			else
			{	
			$SQL = "SELECT COUNT(D_ID) AS userFound FROM department";
			$Result = mysqli_query($link, $SQL);
			$row = mysqli_fetch_array($Result);
			if($row['userFound'] == 0)
			{
	 			mysqli_query($link, "INSERT INTO department(D_Name, D_HODName, D_HODNode, D_Status)VALUES(  
				'".strtoupper(trim($_POST['txtDName']))."', 
				'".strtoupper(trim($_POST['txtHODName']))."', 
				'".strtoupper(trim($_POST['sltNodes']))."', 
				'A')");
				//echo "<script>alert('".$_POST['txtDName']."');</script>";
			}
			else
			{
				$SID = "1" + $row['userFound'];
				$EmpID = "DEP-".sprintf('%04d', $SID);
				
				mysqli_query($link, "INSERT INTO department(D_ID, D_Name, D_HODName, D_HODNode, D_Status)VALUES(
				'$EmpID',  
				'".strtoupper(trim($_POST['txtDName']))."', 
				'".strtoupper(trim($_POST['txtHODName']))."', 
				'".strtoupper(trim($_POST['sltNodes']))."', 
				'A')");
			}
			echo "<script>alert('Department Added Successfully !');</script>";
			echo "<script>location = 'Employee_CreateDepartment.php'</script>";	
		}
			}
	?>
        <div class="container" style="padding: 50px 0px 50px 100px;">
			<form action="" method="post">
				<div class="form-group d-flex justify-content-center">
					<h3><strong>Create Department</strong></h3>
				</div>
                <div class="container" style="padding: 0px 50px 0px 100px;">
                <hr class="bdr-light">
					<div class="form-group">
						<label class="col-sm-4">Department Name</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Department Name" name="txtDName">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Head of Department</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Head of Department Name" name="txtHODName">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Nodes</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Select Department" name="sltNodes">	
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
						  	<input type="submit" class="btn btn-dark" name="btnCDep" value="Create">
                            <input type="reset" class="btn btn-dark" name="btnClear" value="Clear">
						</div>
					</div>
                </div>
            </form>
		</div>
    </body>
</html>