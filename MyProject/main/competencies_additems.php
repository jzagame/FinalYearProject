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
	<?php
	$catesql= "SELECT * FROM t_memc_kpcc_corecompetencies";
	$view= mysqli_query($conn,$catesql);
	if(mysqli_num_rows($view) > 0)
	{
		
	}else{
		echo "<script>alert('No Core Competencies data, Please create.');location='competencies_addcd.php';</script>";
	}
	
	?>
<script>
	window.onload = function() {
	   showaddfitem();
	}
	</script> 
	<div id="show_additem"></div>


</body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>