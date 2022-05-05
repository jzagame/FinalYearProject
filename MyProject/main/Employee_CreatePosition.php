<?php
    session_start();
    error_reporting(0);
  include ("../../includes/assest/library/database.php");
    include("../includes/MenuBar.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>
            Key Position Core Competencies
        </title>
    </head>

    <body>
        <div class="container" style="padding: 50px 0px 50px 100px;">
		<form method="" id="AddPositionForm">
			<div class="form-group d-flex justify-content-center">
				<h3><strong>Create Position Category</strong></h3>
			</div>
            <hr class="bdr-light">
            <div class="container" style="padding: 0px 50px 0px 100px;">
				<div class="form-group">
					<label class="col-form-label">Position Name</label>
					<div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter Position Name" name="txtPositionName">	
					</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Level</label>
					<div class="col-sm-12">
                        <input type="number" class="form-control" placeholder="Enter Position Level" name="txtPositionLevel" min="0" step="1">	
					</div>
				</div>
                <div class="form-group">
                <div class="col-sm-12" style="text-align: center;">
                    <input type="button" class="btn btn-primary" name="btnCPosition" value="Create" onclick="AddPosition()">
                    <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
                </div>
                </div>
            </div>
        </form>
        </div>
    </body>
<script src="../../includes/assest/JS/Ajax.js"></script>
</html>