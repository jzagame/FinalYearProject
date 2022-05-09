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
	img {
    max-width: 100%;
    height: auto;
    width: auto\9;
}
	</style>
</head>

<body>
<div class="container-fluid" >
	<div class="row">
  <div class="col-12">
    <ul class="list-group mt-2 mb-2">
      <li class="list-group-item active">
        <h5 class="m-0">
          Import Excel (.csv)
        </h5>
      </li>
    </ul>
  </div>
</div>
<hr class="bdr-light">
<form class="form-card" id="aie" enctype="multipart/form-data" >
	
	<div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Example</label>
    </div>
    <div class="col-10">
      <img src="../includes/CoreCompetenciesExcelExample.PNG" class="rounded" alt="Cinque Terre" >
    </div>
  </div>
	
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Type</label>
    </div>
    <div class="col-10">
      <select class="custom-select form-control" id="Position" name="seltype">
		<option value="a">Append</option>
        <option value="o">Override</option>
      </select>
    </div>
  </div>
	  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Excel (.csv)</label>
    </div>
    <div class="col-10">
          <div class="custom-file mb-3">
      <input type="file" class="form-control custom-file-input" id="customFile" name="excelfile">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    </div>
  </div>
	
  <div class="form-group row ">
    <div class="col-12" style="text-align: center;">
      <input class="btn btn-primary" type="submit" value="Submit" >
      <input type="reset" class="btn btn-primary" id ="btnexcelclear" name="btnclear" value="Clear">
    </div>
  </div>
</form>
</div>


</body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
	<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</html>