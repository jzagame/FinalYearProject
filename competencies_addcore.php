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
	<?php
	$catesql= "SELECT * FROM t_memc_kpcc_majorcompetencies";
	$view= mysqli_query($conn,$catesql);
	if(mysqli_num_rows($view) > 0)
	{
		
	}else{
		echo "<script>alert('No Major Competencies data, Please create.');location='competencies_addmajor.php';</script>";
	}
	
	?>
<script>
	window.onload = function() {
	   showaddfcc();
	}
	</script> 
	<div id="show_addcc"></div>


</body>
<script src="js/Ajax.js"></script>
</html>