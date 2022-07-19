<?php
session_start();
error_reporting(0);
include("../../includes/conn.php");
?>
<html>

<head>

	<title>Key Position Core Competencies Management System</title>
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

	<style>
		canvas {
			margin: 0 auto;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<?php
		include("../includes/MenuBar.php");
		?>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<ul class="list-group mt-2 mb-2">
					<li class="list-group-item active">
						<h5 class="m-0">Dashboard</h5>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<select name="dash_year" id="dash_year" class="form-control float-right ml-4" style="width: 100px;" onchange="DashChangeYear()">
				<?php 
					$result = $conn -> query("select DISTINCT Q_Year from t_memc_kpcc_quarter order by Q_Year desc");
					while($row = $result -> fetch_assoc()){
				?>
					<option value="<?php echo $row['Q_Year']; ?>"><?php echo $row['Q_Year'] ?></option>
				<?php
					}
				?>
				</select>
				<select name="dash_category" id="dash_category" class="form-control float-right" style="width: 200px;" onchange="DashChangeCategory()">
					<?php 
					$result =$conn -> query("select * from t_memc_kpcc_category");
					while($row = $result ->fetch_assoc()){
					?>
						<option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-3" role="listitem" aria-labelledby="asdasdsadsadsads">
				<div class="card" style="height: 250px;">
					<div class="card-body">
						<h5 class="card-title">Total Employee - 20</h5>
						<h6 class="card-subtitle mb-2 text-muted">Key Position - 10</h6>
						<h6 class="card-subtitle mb-2 text-muted">Young Talent - 12</h6>
						<h6 class="card-subtitle mb-2 text-muted">Both - 12</h6>
						<p class="card-text">This showing the total person that you able to view. this text will be removed in <br />feature</p>
						<a href="#" class="float-right">View All</a>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="card" style="height: 250px;">
					<div class="card-body">
						<h5 class="card-title">Direct Report - 10</h5>
						<h6 class="card-subtitle mb-2 text-muted">Key Position - 7</h6>
						<h6 class="card-subtitle mb-2 text-muted">Young Talent - 5</h6>
						<h6 class="card-subtitle mb-2 text-muted">Both - 2</h6>
						<p class="card-text">This showing how many person direct report to the user. this text will be removed in feature</p>
						<a href="#" class="float-right">View All</a>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="card" style="height: 250px;">
					<div class="card-body">
						<h5 class="card-title">Indirect Report - 10</h5>
						<h6 class="card-subtitle mb-2 text-muted">Key Position - 7</h6>
						<h6 class="card-subtitle mb-2 text-muted">Young Talent - 5</h6>
						<h6 class="card-subtitle mb-2 text-muted">Both - 2</h6>
						<p class="card-text">This showing how many person indirect report to the user. this text will be removed in feature</p>
						<a href="#" class="float-right">View All</a>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="card" style="height: 250px;">
					<div class="card-body">
						<h5 class="card-title">Processing Development Plan - 10</h5>
						<h6 class="card-subtitle mb-2 text-muted">Key Position - 7</h6>
						<h6 class="card-subtitle mb-2 text-muted">Young Talent - 5</h6>
						<h6 class="card-subtitle mb-2 text-muted">Both - 2</h6>
						<p class="card-text">This showing how many person have ongoing action plan[status is open]. this text will be removed in feature</p>
						<a href="#" class="float-right">View All</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-6">
				<div class="card" style="height: 500px;">
					<div class="card-body">
						<h5 class="card-title float-left">Completeness of Core Competencies</h5>
						<select name="dash_quarter" id="dash_quarter" style="width: 100px;" class="form-control float-right" onchange="DashKPIChangeQuarter()">
							
						</select>
					</div>
					<div class="row">
						<div class="col-12" id="KPI_Chart_Container">
							<canvas id="KPI_Chart"></canvas>
						</div>
					</div><br/>
				</div>
			</div>
			<div class="col-6">
				<div class="card overflow-auto" style="height: 500px;">
					<div class="card-body">
						<h5 class="card-title">Direct Staff Competencies Dimention In selected Year And Quarter</h5>
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Staff ID</td>
									<td colspan="4">Staff Name</td>
									<td colspan="2">Position</td>
									<td>Job Band</td>
								</tr>
							</thead>
							<tbody id="KPI_Table">

							</tbody>
						</table><br /><br /><br /><br />
					</div>
				</div>
			</div>
		</div>
	</div>
	<br /><br /><br /><br /><br /><br />
</body>
<script>

</script>
<script src="../../includes/assest/library/datatables.net/JS/dashboard.js"></script>

</html>