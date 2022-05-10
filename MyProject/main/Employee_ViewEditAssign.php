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
        <form method="" id="SearchVEPForm">
        <ul class="list-group mt-2 mb-2">
                <li class="list-group-item active"><h5 class="m-0">View/Edit Reporting-to</h5></li>
            </ul>
        <hr class="bdr-light">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <div class="ml-12">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11" style="padding: 0px 20px 20px 0px;">
                        <input type="text" class="form-control" placeholder="Search" name="txtSearchVEPEmployee">	
                      </div>
                      <div class="col-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchVEPEmployee" value="Search" onclick="SearchVEPEmployee()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchVEPTable">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                            <th scope="col"></th>
                          <th scope="col">No.</th>
                          <th scope="col">Employee Number</th>
                          <th scope="col" style="vertical-align:middle">Name</th>
                          <th scope="col" style="vertical-align:middle">Department</th>
                          <th scope="col" style="vertical-align:middle">Job Band</th>
                          <th scope="col" style="vertical-align:middle">Access Right</th>
                          <th scope="col" style="vertical-align:middle">Reporting-To</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_kpcc_access_right, t_memc_kpcc_report_to 
                        WHERE EmpDetail_Status = 1 AND EmpAssign_Status = 1
                        AND t_memc_kpcc_employee_detail.Emp_P_ID = t_memc_kpcc_access_right.AR_ID
                        AND t_memc_kpcc_employee_detail.Emp_ID = t_memc_kpcc_report_to.RT_Emp_ID";
                        $SearchResult = mysqli_query($conn, $SearchSQL);
                        if(mysqli_num_rows($SearchResult) > 0)
                        {
                            for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                            {
                              $row = mysqli_fetch_array($SearchResult);
                              $SearchReportToNameSQL = "SELECT Emp_Name FROM t_memc_kpcc_employee_detail 
                              WHERE Emp_ID = '".$row['Report_To_Emp_ID']."'";
                              $SearchReportToNameResult = mysqli_query($conn, $SearchReportToNameSQL);
                              $fetchrow = mysqli_fetch_array($SearchReportToNameResult);
                              echo "<tr>";
                              echo "<td><input type=\"checkbox\" value=\"".$row['Emp_ID']."\" name=\"chkEmployee[]\"></td>";
                              echo "<td>".($i+1)."</td>";
                              echo "<td>".$row['Emp_ID']."</td>";
                              echo "<td>".$row['Emp_Name']."</td>";
                              echo "<td>".$row['Emp_Department']."</td>";
                              echo "<td>".$row['Emp_JobBand']."</td>";
                              echo "<td>"."[".$row['AR_Level']."] ".$row['AR_Description']."</td>";
                              echo "<td>"."[".$row['Report_To_Emp_ID']."] ".$fetchrow['Emp_Name']."</td>";
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
                    <div class="form-group row">
                      <label class="col-2">Access Right</label>
                      <div class="col-10">
                        <select class="form-control custom-select" name="txtAccessRight">
                          <option value=""></option>
                        <?php
                          $AccessRightSQL = "SELECT * from t_memc_kpcc_access_right WHERE AR_Level <> 0 AND AR_Status <> 2";
                          $AccessRightResult = mysqli_query($conn, $AccessRightSQL);
                          if(mysqli_num_rows($AccessRightResult) > 0)
                          {
                            for($i = 0; $i < mysqli_num_rows($AccessRightResult); ++$i)
                            {
                              $arrow = mysqli_fetch_array($AccessRightResult);
                            ?>
                              <option value="<?php echo $arrow['AR_ID']?>"><?php echo "[".$arrow['AR_Level']."] ".$arrow['AR_Description'];?></option>
                            <?php
                            }
                          }
                        ?>
                        </select>	
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2">Reporting To</label>
                      <div class="col-10">
                      <select class="form-control custom-select" name="txtReportingTo">
                          <option value=""></option>
                        <?php
                          $ReportToSQL = "SELECT * from t_memc_kpcc_employee_detail WHERE EmpDetail_Status = 1";
                          $ReportToResult = mysqli_query($conn, $ReportToSQL);
                          if(mysqli_num_rows($ReportToResult) > 0)
                          {
                            for($i = 0; $i < mysqli_num_rows($ReportToResult); ++$i)
                            {
                              $rprow = mysqli_fetch_array($ReportToResult);
                            ?>
                              <option value="<?php echo $rprow['Emp_ID']?>"><?php echo "[".$rprow['Emp_ID']."] ".$rprow['Emp_Name'];?></option>
                            <?php
                            }
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                    <input type="button" class="btn btn-primary" name="btnUpdatePosition" value="Update" onclick="UpdatePosition()">
                      <input type="reset" class="btn btn-primary" name="btnClear" value="Clear">
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
    <script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>