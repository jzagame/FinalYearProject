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

	<script>
	window.onload = function() {
	   showaddf();
	}
	</script> 
	<div id="show_addcc"></div>



</body>
<script src="js/Ajax.js"></script>
</html>