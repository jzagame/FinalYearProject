<?php
    session_start();
    error_reporting(0);
    include ("../../includes/database.php");
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
        <div class="container-fluid">
		<form method="" id="AddAccessRightForm">
            <ul class="list-group mt-2 mb-2">
                <li class="list-group-item active"><h5 class="m-0">Create Access Right</h5></li>
            </ul>
            <hr class="bdr-light">
            <div class="container-fluid">
				<div class="form-group row">
                    <div class="col-2">
                        <label class="col-form-label">Access Right Level</label>
                    </div>
					<div class="col-10">
                        <input type="number" class="form-control" placeholder="Enter Access Right Level" name="txtAccessRoghtLevel" min="0" step="1" required>	
					</div>
				</div>
				<div class="form-group row">
                    <div class="col-2">
                        <label class="col-form-label">Description</label>
                    </div>
					<div class="col-10">
                        <textarea class="form-control" placeholder="Enter Description" name="txtAccessRightDescription" rows="4"></textarea>	
					</div>
				</div>
                <div class="form-group row">
                    <div class="col-2">
                        <label class="col-form-label">Status</label>
                    </div>
					<div class="col-10">
                        <select class="form-control custom-select" name="txtARStatus">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>	
					</div>
				</div>
                <div class="form-group">
                <div class="col-12" style="text-align: center;">
                    <input type="button" class="btn btn-primary" name="btnCPosition" value="Create" onclick="AddAccessRight()">
                    <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
                </div>
                </div>
            </div>
        </form>
        </div>
    </body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>