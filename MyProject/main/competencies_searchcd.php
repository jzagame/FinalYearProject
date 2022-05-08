<?php 
  session_start();
  error_reporting(0);
include ("../../includes/database.php");
include("../includes/MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
<div class="container px-1 py-3 mx-auto" id="show_editcd">
<div class="row d-flex justify-content-center">
	<div class="col-xl-7 col-lg-8 col-md-9 col-11">
		<div class="card">
		<h3 class="text-center mb-4" style="margin: 15px"><strong>View/Edit Competencies Dimension</strong></h3>
			
<form class="form-card" id="scd" style="margin: 10px">
	<div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Core Competency Name</label>
    <input type="text" class="form-control" placeholder="Enter Core Competency Name" name="txtsmname">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Competencies Dimension Name</label>
    <input type="text" class="form-control" placeholder="Enter Competencies Dimension Name" name="txtscname">
  </div>
    <div class="form-group col-md-4">
      <label for="inputState">Status</label>
      <select name="selstatus" class="form-control  custom-select">
		  <option value="">Both</option>
        <option value="A">Active</option>
		<option value="I">Inactive</option>
      </select>
    </div>
  </div>
  <input class="btn btn-primary" type="submit" id="btncdsearch" name="btnsearch" value="Search">
	<input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
</form>
<div id="show_searchcd"> 
<?php
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Cd_ID IS NOT NULL AND "; //Search Core competencies
		$sql.= "ORDER BY Cd_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
	  <table class="table table-bordered table-hover" style="margin-top:15px">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Core Competency</th>
			<th>Competencies Dimension</th>
			<th>Definition</th> 
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
		 echo "<tr role=\"button\" onClick=\"sendeditcd('".$row['Cd_ID']."')\">";
			echo "<td>".$row['Cd_ID']."</td>";
			echo "<td>".$row['Cc_name']."</td>";
			echo "<td>".$row['Cd_Name']."</td>";
			echo "<td>".$row['Cd_Definition']."</td>";
			if($row['Cd_status']=="A"){
				echo "<td>Active</td>";
			}else{
				echo "<td>Inactive</td>";
			}
		echo "</tr>";	
	}
	?>
    </tbody>
            </table>
    </div>
	</div>
    </div>
</div>
	
<?php
		}
	?>

	
</div>	
 

</body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>