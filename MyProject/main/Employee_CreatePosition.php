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
        <div class="container-fluid" style="padding: 50px 0px 50px 100px;">
		<form method="" id="AddAccessRightForm">
			<div class="form-group d-flex justify-content-center">
				<h3><strong>Create Access Right</strong></h3>
			</div>
            <hr class="bdr-light">
            <div class="container" style="padding: 0px 50px 0px 100px;">
				<div class="form-group">
					<label class="col-form-label">Access Right Level</label>
					<div class="col-sm-12">
                        <input type="number" class="form-control" placeholder="Enter Access Right Level" name="txtAccessRoghtLevel" min="0" step="1">	
					</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Description</label>
					<div class="col-sm-12">
                        <textarea class="form-control" placeholder="Enter Description" name="txtAccessRightDescription" rows="4"></textarea>	
					</div>
				</div>
                <div class="form-group">
                <div class="col-sm-12" style="text-align: center;">
                    <input type="button" class="btn btn-primary" name="btnCPosition" value="Create" onclick="AddAccessRight()">
                    <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
                </div>
                </div>
            </div>
        </form>
        </div>
    </body>
<script src="../../includes/assest/JS/Ajax.js"></script>
</html>