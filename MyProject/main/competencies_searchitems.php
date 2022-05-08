<?php 
  session_start();
  error_reporting(0);
include ("../../includes/database.php");
include("../includes/MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		
		td,th{
			max-width: 200px;
		}
	</style>
</head>

<body>
<div class="container px-1 py-3 mx-auto" id="show_edititem">
<div class="row d-flex justify-content-center">
	<div class="col-12">
		<div class="card">
		<h3 class="text-center mb-4" style="margin: 15px"><strong>View/Edit Items</strong></h3>
			
<form class="form-card" id="sitem" style="margin: 10px">
	<div class="form-row">
		 <div class="form-group col-md-6">
    <label for="inputAddress">Core Competencies</label>
    <input type="text" class="form-control" placeholder="Enter Core Competencies Name" name="txtsccname">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Competencies Dimension</label>
    <input type="text" class="form-control" placeholder="Enter Competencies Dimension Name" name="txtscdname">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputAddress">Item Name</label>
    <input type="text" class="form-control" placeholder="Enter Competencies Dimension Name" name="txtsitemname">
  </div>
    <div class="form-group col-md-4">
      <label for="inputState">Status</label>
      <select name="selstatus" class="form-control custom-select">
		  <option value="">Both</option>
        <option value="A">Active</option>
		<option value="I">Inactive</option>
      </select>
    </div>
  </div>
  <input class="btn btn-primary" type="submit" id="btnitemsearch" name="btnsearch" value="Search">
	<input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
</form>
<div class="table-responsive" id="show_searchitem"> 
<?php
		$sql= "SELECT * FROM t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_items.Im_Cd_ID = t_memc_kpcc_competenciesdimension.Cd_ID AND t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Im_ID IS NOT NULL AND "; //Search Items
		$sql.= "ORDER BY Im_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
	  <table class="table table-bordered table-hover table-sm" style="margin-top:15px;" >
		<thead>
		  <tr>
			<th nowrap>ID</th>
			<th nowrap>Core Competency</th>
			<th nowrap>Competencies Dimension</th>
			<th nowrap>Item Name</th> 
			<th nowrap width="160px">Definition</th>
			<th nowrap width="160px">Lv 5 Definition</th>
			<th nowrap width="160px">Lv 4 Definition</th>
			<th nowrap width="160px">Lv 3 Definition</th>
			<th nowrap width="160px">Lv 2 Definition</th>
			<th nowrap width="160px">Lv 1 Definition</th>
			<th nowrap>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
		 echo "<tr role=\"button\" onClick=\"sendedititem('".$row['Im_ID']."')\">";
			echo "<td>".$row['Im_ID']."</td>";
			echo "<td>".$row['Cc_name']."</td>";
			echo "<td>".$row['Cd_Name']."</td>";
			echo "<td>".$row['Im_Name']."</td>";
			echo "<td>".$row['Im_Definition']."</td>";
		
		  $catesql = "SELECT * FROM t_memc_kpcc_items_lvl_desc WHERE Im_lvl_Im_ID = ".$row['Im_ID']." ORDER BY Im_lvl_ID DESC";
		  $view2 = mysqli_query( $conn, $catesql );
		  if ( mysqli_num_rows( $view2 ) > 0 ) {
			for ( $x = 0; $x < mysqli_num_rows( $view2 ); ++$x ) {
			  $row2 = mysqli_fetch_array( $view2 );
				echo "<td>".$row2['Im_lvl_Description']."</td>";
			}
		  }
			if($row['Im_Status']=="A"){
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