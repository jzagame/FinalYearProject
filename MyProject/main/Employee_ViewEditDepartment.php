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
            <form method="" id="searchDepartmentForm">
            <div class="form-group d-flex justify-content-center">
            <h3><strong>Department</strong></h3>
            </div>
            <hr class="bdr-light">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="ml-12">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-11" style="padding: 0px 20px 20px 0px;">
                            <input type="text" class="form-control" placeholder="Search" name="txtSearchDepartment">	
                          </div>
                          <div class="col-sm-1" style="text-align: center;">
                            <input type="button" class="btn btn-dark" name="btnSearchDepartment" value="Search" onClick="SearchDepartment()">
                          </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Score</h4>
                        </div> -->
						  <div class="table-responsive" id="showDepartTable">
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Department Name</th>
							  <th scope="col">Department HOD Name</th>
                              <th scope="col" style="vertical-align:middle">Quarter</th>
                              <th scope="col" style="vertical-align:middle">Year</th>
							  <th scope="col" style="vertical-align:middle">Node</th>
							  <th scope="col" style="vertical-align:middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                          $SearchSQL = "SELECT * FROM t_memc_kpcc_department";
                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
                                $row = mysqli_fetch_array($SearchResult);
                                echo "<tr role=\"button\" onClick=\"editDepartment('".$row['D_ID']."')\">";
                                echo "<td>".$row['D_ID']."</td>";
                                echo "<td>".$row['D_Name']."</td>";
                                echo "<td>".$row['D_HODName']."</td>";
                                echo "<td>".$row['D_Quarter']."</td>";
								echo "<td>".$row['D_Year']."</td>";
								echo "<td>".$row['D_HODNode']."</td>";
								echo "<td>".$row['D_Status']."</td>";
                                echo "</tr>";
                              }
                          }
                          else
                          {
                            echo "<script> alert('No Result Found');
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