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

	
<div class="container px-1 py-3 mx-auto" id="show_editmc">
<div class="row d-flex justify-content-center">
	<div class="col-xl-7 col-lg-8 col-md-9 col-11">
		<h3 class="text-center mb-4"><strong>Edit/View Major Competencies</strong></h3>
		<div class="card">
           
						
<form class="form-card" id="smc" style="margin: 10px">
  <div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Major Competency Name</label>
    <input type="text" class="form-control" placeholder="Enter Major Competency Name" name="txtsname">
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
	
	

  <input class="btn btn-dark" type="submit" id="btnmcsearch" value="Search">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
</form>
            

<div id="show_searchmc"></div>
=======
=======
>>>>>>> Stashed changes
	<input type="reset" class="btn btn-dark" name="btnclear" value="Clear">
</form>
            

<div id="show_searchmc">
	<?php
		$sql= "SELECT * FROM t_memc_kpcc_majorcompetencies WHERE Mc_ID IS NOT NULL AND "; //Search major competencies
		$sql.= "ORDER BY Mc_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
	  <table class="table table-hover" style="margin-top:15px">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
		
		 echo "<tr role=\"button\" onClick=\"sendeditmc('".$row['Mc_ID']."')\">";

			echo "<td>".$row['Mc_ID']."</td>";
			echo "<td>".$row['Mc_name']."</td>";
			if($row['Mc_status']=="A"){
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
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
	  
 </div>
  </div> 
	</div>
  </div>

</body>
<script src="js/Ajax.js"></script>
</html>