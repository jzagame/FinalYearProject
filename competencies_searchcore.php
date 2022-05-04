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

	
<div class="container px-1 py-3 mx-auto" id="show_editcc">
<div class="row d-flex justify-content-center">
	<div class="col-xl-7 col-lg-8 col-md-9 col-11">
		<h3 class="text-center mb-4"><strong>View/Edit Core Competencies</strong></h3>
		<div class="card">
           
						
<form class="form-card" id="scc" style="margin: 10px">
  <div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Core Competency Name</label>
    <input type="text" class="form-control" placeholder="Enter Core Competency Name" name="txtsname">
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
	
	

  <input class="btn btn-primary" type="submit" id="btnccsearch" value="Search">
	<input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
</form>
            

<div id="show_searchcc">
	<?php
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_ID IS NOT NULL AND "; //Search major competencies
		$sql.= "ORDER BY Cc_ID";
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
		
		 echo "<tr role=\"button\" onClick=\"sendeditcc('".$row['Cc_ID']."')\">";

			echo "<td>".$row['Cc_ID']."</td>";
			echo "<td>".$row['Cc_name']."</td>";
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
        		
	?>
</div>
	  
 </div>
  </div> 
	</div>
  </div>

</body>
<script src="js/Ajax.js"></script>
</html>