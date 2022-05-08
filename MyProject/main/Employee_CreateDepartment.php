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
        <div class="container" style="padding: 50px 0px 50px 100px;">
			<form method="" id="AddDepartmentForm">
				<div class="form-group d-flex justify-content-center">
					<h3><strong>Create Department</strong></h3>
				</div>
                <div class="container" style="padding: 0px 50px 0px 100px;">
                <hr class="bdr-light">
					<div class="form-group">
						<label class="col-sm-4">Department Name</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Department Name" name="txtDName">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Head of Department</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Head of Department Name" name="txtHODName">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Quarter</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter the Quarter" name="txtQuarter">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Year</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter the Year" name="txtYear">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Nodes</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Select Department" name="sltNodes">	
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
						  	<input type="submit" class="btn btn-dark" name="btnCDep" value="Create" onclick="AddDepartment()">
                            <input type="reset" class="btn btn-dark" name="btnClear" value="Clear">
						</div>
					</div>
                </div>
            </form>
		</div>
    </body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>