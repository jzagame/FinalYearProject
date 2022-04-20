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
</form>
            

<div id="show_searchmc"></div>
	  
 </div>
  </div> 
	</div>
  </div>

</body>
<script src="js/Ajax.js"></script>
</html>