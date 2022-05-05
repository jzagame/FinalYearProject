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
      <div class="container" style="padding: 50px 0px 50px 100px;" id="ShowEditForm">
        <form method="" id="searchPositionForm">
        <div class="form-group d-flex justify-content-center">
        <h3><strong>Position Category</strong></h3>
        </div>
        <hr class="bdr-light">
          <div class="container" id="SearchPositionDiv">
            <div class="row">
              <div class="col">
                <div class="ml-12">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-11" style="padding: 0px 20px 20px 0px;">
                        <input type="text" class="form-control" placeholder="Search" name="txtSearchPosition">	
                      </div>
                      <div class="col-sm-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchPosition" value="Search" onclick="SearchPosition()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchTable">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Position Name</th>
                          <th scope="col" style="vertical-align:middle">Level</th>
                          <th scope="col" style="vertical-align:middle">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $SearchSQL = "SELECT * FROM t_memc_kpcc_position";
                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
                                $row = mysqli_fetch_array($SearchResult);
                                echo "<tr role=\"button\" onClick=\"editPosition('".$row['P_ID']."')\">";
                                echo "<td>".($i+1)."</td>";
                                echo "<td>".$row['P_name']."</td>";
                                echo "<td>".$row['P_level']."</td>";
                                echo "<td>".$row['P_Status']."</td>";
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
<script src="../../includes/assest/JS/Ajax.js"></script>
</html>