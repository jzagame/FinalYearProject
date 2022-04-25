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
        <form method="" id="searchEmployeeForm">
        <div class="form-group d-flex justify-content-center">
        <h3><strong>Employee List</strong></h3>
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
                        <input type="button" class="btn btn-primary" name="btnSearchEmployee" value="Search" onclick="SearchEmployee()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchTable">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th scope="col"></th>
                          <th scope="col">No.</th>
                          <th scope="col">Employee Number</th>
                          <th scope="col" style="vertical-align:middle">Employee Name</th>
                          <th scope="col" style="vertical-align:middle">Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail";
                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
                                $row = mysqli_fetch_array($SearchResult);
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\" name=\"".$row['Emp_Detail_ID']."\"></td>";
                                echo "<td>".($i+1)."</td>";
                                echo "<td>".$row['Emp_ID']."</td>";
                                echo "<td>".$row['Emp_Name']."</td>";
                                echo "<td>".$row['Emp_Email']."</td>";
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
                    <div class="form-group">
                        <div class="col-sm-12" style="text-align: center;">
                            <input type="button" class="btn btn-primary" name="btnAddEmployee" value="Add" onclick="RemoveEmployee()">
                            <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
    </body>
    <script src="js/Ajax.js"></script>
</html>