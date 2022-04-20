<?php
    session_start();
    error_reporting(0);
    include("database/database.php");
    include("MenuBar.php");
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
			<form action="" method="post">
				<div class="form-group d-flex justify-content-center">
					<h3><strong>Position</strong></h3>
				</div>
                <div class="container" style="padding: 0px 50px 0px 100px;">
                <hr class="bdr-light">
					<div class="form-group">
						<label class="col-sm-2">Position Name</label>
						<div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Position Name" name="txtPositionName">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Level</label>
						<div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="Enter Position Level" name="txtPositionLevel" min="0" step="1">	
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
						  	<input type="submit" class="btn btn-dark" name="btnCPosition" value="Create">
                            <input type="reset" class="btn btn-dark" name="btnClear" value="Clear">
						</div>
					</div>
                </div>
            </form>
		</div>
    </body>
</html>