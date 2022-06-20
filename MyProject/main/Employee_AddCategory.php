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
		<form method="" id="AddCategoryForm">
            <ul class="list-group mt-2 mb-2">
                <li class="list-group-item active"><h5 class="m-0">Create Employee Category</h5></li>
            </ul>
            <hr class="bdr-light">
            <div class="container-fluid">
				<div class="form-group row">
                    <div class="col-2">
                        <label class="col-form-label">Category Type</label>
                    </div>
					<div class="col-10">
                        <input type="text" class="form-control" placeholder="Enter Category Type" name="txtCategory">	
					</div>
				</div>
                <div class="form-group row">
                    <div class="col-2">
                        <label class="col-form-label">Status</label>
                    </div>
					<div class="col-10">
                        <select class="form-control custom-select" name="txtCStatus">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>	
					</div>
				</div>
                <div class="form-group">
                <div class="col-12" style="text-align: center;">
                    <input type="button" class="btn btn-primary" name="btnCCategory" value="Create" onclick="AddCategory()">
                    <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
                </div>
                </div>
            </div>
        </form>
        </div>
    </body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>