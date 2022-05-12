<?php
    session_start();
    error_reporting(0);
  include ("../../includes/database.php");
    include("../includes/MenuBar.php");
?>

<style>
td, th {
    max-width: 200px;
	word-wrap: break-word;
}
.table-responsive {
    max-height:500px;
}
thead tr:nth-child(1) th{
    background: white;
    position: sticky;
    top: 0;
    z-index: 10;
  }
</style>

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
        <form method="" id="SearchAPForm">
        <ul class="list-group mt-2 mb-2">
                <li class="list-group-item active"><h5 class="m-0">Assign Access Right & Reporting-to</h5></li>
            </ul>
        <hr class="bdr-light">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <div class="ml-12">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11" style="padding: 0px 20px 20px 0px;">
                        <input type="text" class="form-control" placeholder="Search" name="txtSearchAPEmployee">	
                      </div>
                      <div class="col-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchAPEmployee" value="Search" onclick="SearchAPEmployee()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchAPTable">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">No.</th>
                          <th scope="col">Employee Number</th>
                          <th scope="col" style="vertical-align:middle">Name</th>
                          <th scope="col" style="vertical-align:middle">Department</th>
                          <th scope="col" style="vertical-align:middle">Job Band</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_staff, t_memc_department WHERE EmpDetail_Status = 1 
                        AND EmpAssign_Status = 2
                        AND stf_employee_number = Emp_ID
                        AND stf_department_id = dpt_id";
                        $SearchResult = mysqli_query($conn, $SearchSQL);
                        if(mysqli_num_rows($SearchResult) > 0)
                        {
                            for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                            {
                              $row = mysqli_fetch_array($SearchResult);
                              echo "<tr>";
                              echo "<td><input type=\"checkbox\" value=\"".$row['stf_employee_number']."\" name=\"chkEmployee[]\"></td>";
                              echo "<td>".($i+1)."</td>";
                              echo "<td>".$row['stf_employee_number']."</td>";
                              echo "<td>".$row['stf_name']."</td>";
                              echo "<td>".$row['dpt_name']."</td>";
                              echo "<td>".$row['stf_grade']."</td>";
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
                          $AccessRightSQL = "SELECT * from t_memc_kpcc_access_right WHERE AR_Level <> 0 AND AR_Status = 1";
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
                    <input type="button" class="btn btn-primary" name="btnAssignPosition" value="Assign" onclick="AssignPosition()">
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