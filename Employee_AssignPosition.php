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
      <?php
        if($_GET['id'] == 'a')
        {
      ?>
          <div class="container" style="padding: 50px 0px 50px 100px;">
          <form action="" method="post">
            <div class="form-group d-flex justify-content-center">
              <h3><strong>Position Information</strong></h3>
            </div>
            <hr class="bdr-light">
            <div class="container" style="padding: 0px 50px 0px 100px;">
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
                  <input type="submit" class="btn btn-dark" name="btnEditPosition" value="Edit">
                  <input type="button" class="btn btn-dark" name="btnBack" value="Back" onClick="back()">
                </div>
              </div>
            </div>
          </form>
          </div>
      <?php
        }
        else
        {
      ?>
          <div class="container" style="padding: 50px 0px 50px 100px;">
            <form action="" method="post">
            <div class="form-group d-flex justify-content-center">
            <h3><strong>Employee</strong></h3>
            </div>
            <hr class="bdr-light">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="ml-12">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-11" style="padding: 0px 20px 20px 0px;">
                            <input type="text" class="form-control" placeholder="Search" name="txtSearchEmployee">	
                          </div>
                          <div class="col-sm-1" style="text-align: center;">
                            <input type="submit" class="btn btn-dark" name="btnSearchEmployee" value="Search">
                          </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Score</h4>
                        </div> -->
                        <div class="table-responsive">
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                              <th scope="col">No.</th>
                              <th scope="col">IC</th>
                              <th scope="col" style="vertical-align:middle">Name</th>
                              <th scope="col" style="vertical-align:middle">Job Band</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="checkbox" name="chkAssignPosition"></td>
                              <td>1</td>
                              <td>0111</td>
                              <td>Ivan</td>
                              <td>7</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="chkAssignPosition"></td>
                              <td>2</td>
                              <td>222</td>
                              <td>Simon</td>
                              <td>8</td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                        <div class="form-group row">
						    <label class="col-sm-2">Position</label>
						    <div class="col-sm-12">
                                <select class="form-control" name="txtPosition">
									<option value="">Admin</option>
									<option value="">Head Of Department</option>
								</select>	
						    </div>
					    </div>
                        <div class="form-group row">
						    <label class="col-sm-2">Department</label>
						    <div class="col-sm-12">
                                <select class="form-control" name="txtDepartment">
									<option value="">Human Resource(HR)</option>
									<option value="">Information Technology(IT)</option>
								</select>	
						    </div>
					    </div>
                        <div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
						  	<input type="submit" class="btn btn-dark" name="btnAssignPosition" value="Assign">
                            <input type="reset" class="btn btn-dark" name="btnClear" value="Clear">
						</div>
					    </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
      <?php
        }
      ?>
    </body>
</html>