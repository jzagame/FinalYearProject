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
<script>
	window.onload = function() {
	   showaddfpt();
	}
	</script> 
	<div class="container-fluid" id="show_addpt"></div>


</body>
<script src="../../includes/assest/library/datatables.net/JS/Competencies_Ajax.js"></script>
</html>