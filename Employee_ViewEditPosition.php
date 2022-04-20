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
            <h3><strong>Position</strong></h3>
            </div>
            <hr class="bdr-light">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="ml-12">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-11" style="padding: 0px 20px 20px 0px;">
                            <input type="text" class="form-control" placeholder="Search" name="txtSearchPosition">	
                          </div>
                          <div class="col-sm-1" style="text-align: center;">
                            <input type="submit" class="btn btn-dark" name="btnSearchPosition" value="Search">
                          </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Score</h4>
                        </div> -->
                        <div class="table-responsive">
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Position Name</th>
                              <th scope="col" style="vertical-align:middle">Level</th>
                              <th scope="col" style="vertical-align:middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr onclick="location='Employee_ViewEditPosition.php?id=a'">
                              <td>1</td>
                              <td>Admin</td>
                              <td>1</td>
                              <td>Open</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Head of Department</td>
                              <td>2</td>
                              <td>Open</td>
                            </tr>
                          </tbody>
                        </table>
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