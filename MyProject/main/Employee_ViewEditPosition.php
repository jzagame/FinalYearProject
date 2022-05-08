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
      <div class="container-fluid" style="padding-top: 50px;" id="ShowEditForm">
        <form method="" id="searchAccessRightForm">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active"><h5 class="m-0">Access Right List</h5></li>
        </ul>
        <hr class="bdr-light">
          <div class="container-fluid" id="SearchAccessRightDiv">
            <div class="row">
              <div class="col">
                <div class="ml-12">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11" style="padding: 0px 20px 20px 0px;">
                        <input type="text" class="form-control" placeholder="Search" name="txtSearchAccessRight">	
                      </div>
                      <div class="col-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchAccessRight" value="Search" onclick="SearchAccessRight()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchTable">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Level</th>
                          <th scope="col" style="vertical-align:middle">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $SearchSQL = "SELECT * FROM t_memc_kpcc_access_right";
                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
                                $row = mysqli_fetch_array($SearchResult);
                                echo "<tr role=\"button\" onClick=\"editAccessRight('".$row['AR_ID']."')\">";
                                echo "<td>".($i+1)."</td>";
                                echo "<td>".$row['AR_Level']."</td>";
                                echo "<td>".$row['AR_Description']."</td>";
                                echo "</tr>";
                              }
                          }
                          else
                          {
                            echo "<script> alert('No Record Found');
						                location='index.php'; </script>";
                          }
                        ?>
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
    </body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>