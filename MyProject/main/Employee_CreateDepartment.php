<?php
    session_start();
    error_reporting(0);
  include ("../../includes/database.php");
    include("../includes/MenuBar.php");
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
        <div class="container-fluid">
			<form method="" id="AddDepartmentForm">
				<ul class="list-group mt-2 mb-2">
                <li class="list-group-item active"><h5 class="m-0">Create Department Relationship</h5></li>
            </ul>
				<hr class="bdr-light">
                <div class="container-fluid">
					<div class="form-group row">
						<div class="col-2">
							<label>Department Name</label>
						</div>
						<div class="col-10">
                            <select class= "custom-select" name="sltD" required>
                                        <option value=""></option>
                                        <?php
                                            $SCSQL = "SELECT * FROM t_memc_department";
                                            $SCResult = mysqli_query($conn, $SCSQL);
                                            if(mysqli_num_rows($SCResult)>0)
                                            {
                                                for($i=0;$i<mysqli_num_rows($SCResult);++$i)
                                                {
                                                    $scrow = mysqli_fetch_array($SCResult);
                                        ?>
                                                    <option><?php echo $scrow['dpt_id']."-". $scrow['dpt_name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>	
						</div>
					</div>
					<div class="form-group row">
						<label class="col-2">Head of Department</label>
						<div class="col-10">
<!--                            <input type="text" class="form-control" placeholder="Select Head of Department Name" name="txtHODName">	-->
							<select class= "custom-select" name="sltHOD" required>
                                        <option value=""></option>
                                        <?php
                                            $SCSQL = "SELECT * FROM t_memc_kpcc_employee_detail";
                                            $SCResult = mysqli_query($conn, $SCSQL);
                                            if(mysqli_num_rows($SCResult)>0)
                                            {
                                                for($i=0;$i<mysqli_num_rows($SCResult);++$i)
                                                {
                                                    $scrow = mysqli_fetch_array($SCResult);
                                        ?>
                                                    <option value="<?php echo $scrow['Emp_ID'];?>"><?php echo $scrow['Emp_ID']."-".$scrow['Emp_Name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-2">Parent Department</label>
						<div class="col-10">
                            <select class= "custom-select" name="sltPD" required>
                                        <option value=""></option>
                                        <?php
                                            $SCSQL = "SELECT * FROM t_memc_department";
                                            $SCResult = mysqli_query($conn, $SCSQL);
                                            if(mysqli_num_rows($SCResult)>0)
                                            {
                                                for($i=0;$i<mysqli_num_rows($SCResult);++$i)
                                                {
                                                    $scrow = mysqli_fetch_array($SCResult);
                                        ?>
                                                    <option><?php echo $scrow['dpt_id']."-".$scrow['dpt_name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>	
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
						  	<input type="button" class="btn btn-primary" name="btnCDep" value="Create" onclick="AddDepartment()">
                            <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
						</div>
					</div>
                </div>
            </form>
		</div>
    </body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>