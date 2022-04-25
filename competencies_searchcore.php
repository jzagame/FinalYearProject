<?php 
  session_start();
  error_reporting(0);
  include ("database/database.php");
    include("MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<?php
	if($_POST['btnsearch'] || $_GET['id'] == "e")
	{
		$sql= "SELECT * FROM corecompetencies,majorcompetencies WHERE majorcompetencies.Mc_ID = corecompetencies.Cc_Mc_ID AND Cc_ID IS NOT NULL AND "; //Search Core competencies
		if(trim($_POST['txtsname']) != "")
		{
			$sql .= "Cc_Name LIKE '%".trim($_POST['txtsname'])."%' AND ";
		}
		if(trim($_POST['selstatus']) != "")
		{
			$sql .= "Cc_status = '".trim($_POST['selstatus'])."' AND ";
		}
		$sql.= "ORDER BY Cc_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
	
<div class="container px-1 py-3 mx-auto">
<div class="row d-flex justify-content-center">
	<div class="col-xl-7 col-lg-8 col-md-9 col-11">
		<div class="card">
                <h3 class="text-center mb-4" style="margin: 15px"><strong>Edit/View Core Competencies</strong></h3>
			
			
			
<form class="form-card" METHOD="post" style="margin: 10px">
=======
=======
>>>>>>> Stashed changes
<div class="container px-1 py-3 mx-auto" id="show_editcc">
<div class="row d-flex justify-content-center">
	<div class="col-xl-7 col-lg-8 col-md-9 col-11">
		<div class="card">
		<h3 class="text-center mb-4" style="margin: 15px"><strong>Edit/View Core Competencies</strong></h3>
			
<form class="form-card" id="scc" style="margin: 10px">
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
	<div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Major Competency Name</label>
    <input type="text" class="form-control" placeholder="Enter Major Competency Name" name="txtsmname">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Core Competency Name</label>
    <input type="text" class="form-control" placeholder="Enter Core Competency Name" name="txtscname">
  </div>
    <div class="form-group col-md-4">
      <label for="inputState">Status</label>
      <select name="selstatus" class="form-control">
		  <option value="">Both</option>
        <option value="A">Active</option>
		<option value="I">Inactive</option>
      </select>
    </div>
  </div>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
  <input class="btn btn-dark" type="submit" name="btnsearch" value="Search">
</form>
			
			
		
            
					
					
=======
=======
>>>>>>> Stashed changes
  <input class="btn btn-dark" type="submit" id="btnccsearch" name="btnsearch" value="Search">
	<input type="reset" class="btn btn-dark" name="btnclear" value="Clear">
</form>
<div id="show_searchcc"> 
<?php
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies,t_memc_kpcc_majorcompetencies WHERE t_memc_kpcc_majorcompetencies.Mc_ID = t_memc_kpcc_corecompetencies.Cc_Mc_ID AND Cc_ID IS NOT NULL AND "; //Search Core competencies
		$sql.= "ORDER BY Cc_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
	  <table class="table table-hover" style="margin-top:15px">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Major Competency</th>
			<th>Name</th>
			<th>Description</th> 
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        if($_GET['id'] == "e")
        {
		 echo "<tr role=\"button\" onclick=\"location='competencies_addcore.php?id=".$row['Cc_ID']."'\">";
        }
        else{
            echo "<tr>";
        }
=======
		 echo "<tr role=\"button\" onClick=\"sendeditcc('".$row['Cc_ID']."')\">";
>>>>>>> Stashed changes
=======
		 echo "<tr role=\"button\" onClick=\"sendeditcc('".$row['Cc_ID']."')\">";
>>>>>>> Stashed changes
			echo "<td>".$row['Cc_ID']."</td>";
			echo "<td>".$row['Mc_name']."</td>";
			echo "<td>".$row['Cc_Name']."</td>";
			echo "<td>".$row['Cc_Description']."</td>";
			if($row['Cc_status']=="A"){
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        else
        {
            echo "<script>alert('Not Data Found.');location='competencies_addcore.php';</script>";
        }
	}
	else
	{
		echo "<script>alert('Page Not Found.');location='competencies_searchcore.php?id=e';</script>";
	}
?>


</body>

=======
=======
>>>>>>> Stashed changes
	?>

	
</div>	
 

</body>
<script src="js/Ajax.js"></script>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
</html>