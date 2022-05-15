<?php 
    session_start();
    error_reporting(0);
    include ("../../includes/database.php");
    include("../includes/MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Key Position Core Competencies Management System</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	
	

</head>

<body>
<div class="container-fluid">
	<ul class="list-group mt-2 mb-2">
                <li class="list-group-item active"><h5 class="m-0">Dashboard</h5></li>
            </ul>
	<hr class="bdr-light">
		<form id="piepie">
			<div class="container-fluid">
			<div class="form-group row">
						<div class="col-2">
							<label>Year</label>
						</div>
				<div class="col-10">
			<select class= "custom-select" name="sltY" id="selectyear" onchange="ChangeY()" required>
					<option value=""></option>
					<?php
						$SCSQL = "SELECT DISTINCT Q_Year FROM t_memc_kpcc_quarter ORDER BY Q_Year desc";
						$SCResult = mysqli_query($conn, $SCSQL);
						if(mysqli_num_rows($SCResult)>0)
						{
							for($i=0;$i<mysqli_num_rows($SCResult);++$i)
							{
								$scrow = mysqli_fetch_array($SCResult);
					?>
								<option value="<?php echo $scrow['Q_Year'];?>"><?php echo $scrow['Q_Year']?></option>
					<?php
							}
						}
					?>
		</select>	
	</div>
			</div>
			
			<div class="form-group row">
						<div class="col-2">
							<label>Department</label>
						</div>
				<div class="col-10">
			<select class= "custom-select" name="sltD" id="selectdepartment" onchange="ChangeY()" required>
					<option value=""></option>
					<?php
						$SCSQLL = "SELECT D_Name FROM t_memc_kpcc_department";
						$SCResultt = mysqli_query($conn, $SCSQLL);
						if(mysqli_num_rows($SCResultt)>0)
						{
							for($i=0;$i<mysqli_num_rows($SCResultt);++$i)
							{
								$scroww = mysqli_fetch_array($SCResultt);
					?>
								<option value="<?php echo $scroww['D_Name'];?>"><?php echo $scroww['D_Name']?></option>
					<?php
							}
						}
					?>
		</select>	
	</div>
			</div>
			
			<div class="form-group row">
						<div class="col-2">
							<label>Quarter</label>
						</div>
				<div class="col-10">
			<select class= "custom-select" name="sltQ" id="selectquarter" onchange="ChangeY()" required>
					<option value=""></option>
					<?php
						$SCSQLLL = "SELECT DISTINCT Q_Name FROM t_memc_kpcc_quarter";
						$SCResulttt = mysqli_query($conn, $SCSQLLL);
						if(mysqli_num_rows($SCResulttt)>0)
						{
							for($i=0;$i<mysqli_num_rows($SCResulttt);++$i)
							{
								$scrowww = mysqli_fetch_array($SCResulttt);
					?>
								<option value="<?php echo $scrowww['Q_Name'];?>"><?php echo $scrowww['Q_Name']?></option>
					<?php
							}
						}
					?>
		</select>	
	</div>
			</div>
			</div>
	</form>
	<div id="piechart">
    <div class="row d-flex">

	</div>
	<div class="row d-flex">
	<div class="col justify-content-end">
            <div id="chart"></div>
          </div>
	</div>
	</div> 

		  </div>
</body>
	<script>

</script>
	<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>
