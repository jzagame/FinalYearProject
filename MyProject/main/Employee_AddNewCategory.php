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
        <form id="searchCEmployeeForm">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active"><h5 class="m-0">Employee List</h5></li>
        </ul>
        <hr class="bdr-light">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <div class="ml-12">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11" style="padding: 0px 20px 20px 0px;">
                        <input type="text" class="form-control" placeholder="Search" name="txtSearchEmployee">	
                      </div>
                      <div class="col-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchEmployee" value="Search" onclick="SearchCEmployee()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchTable">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">No.</th>
                          <th scope="col">Employee Number</th>
                          <th scope="col" style="vertical-align:middle">Employee Name</th>
                          <th scope="col" style="vertical-align:middle">Department</th>
                          <th scope="col" style="vertical-align:middle">Job Band</th>
                          <th scope="col" style="vertical-align:middle">Category</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_staff, t_memc_department WHERE EmpDetail_Status = 1 
                        AND stf_employee_number = Emp_ID
                        AND stf_department_id = dpt_id";

                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
                                $row = mysqli_fetch_array($SearchResult);
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\" value=\"".$row['stf_employee_number']."\" name=\"txtEmployeePass[]\"></td>";
                                echo "<td>".($i+1)."</td>";
                                echo "<td>".$row['stf_employee_number']."</td>";
                                echo "<td>".$row['stf_name']."</td>";
                                echo "<td>".$row['dpt_name']."</td>";
                                echo "<td>".$row['stf_grade']."</td>";
                                echo "<td>";
                                $SeacrhEmployeeActiveCategorySQL = "SELECT * FROM t_memc_kpcc_employee_category, t_memc_kpcc_category 
                                WHERE ec_employee_id = '".$row['stf_employee_number']."'
                                AND ec_category_id = c_id";
                                $SeacrhEmployeeActiveCategoryResult = mysqli_query($conn, $SeacrhEmployeeActiveCategorySQL);
                                if(mysqli_num_rows($SeacrhEmployeeActiveCategoryResult) > 0)
                                {
                                  for($j = 0; $j < mysqli_num_rows($SeacrhEmployeeActiveCategoryResult); ++$j)
                                  {
                                    $jrow = mysqli_fetch_array($SeacrhEmployeeActiveCategoryResult);
                                    echo "-".$jrow['c_name']."<br>";
                                  }
                                }
                                echo "</td>";
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
                    <div class="form-group row" style="padding-top: 20px;">
                      <label class="col-2">Category</label>
                      <div class="col-10">
                      <select class="form-control custom-select" name="txtCategory">
                        <?php
                          $CategorySQL = "SELECT * from t_memc_kpcc_category WHERE c_status = 1";
                          $CategoryResult = mysqli_query($conn, $CategorySQL);
                          if(mysqli_num_rows($CategoryResult) > 0)
                          {
                            for($i = 0; $i < mysqli_num_rows($CategoryResult); ++$i)
                            {
                              $crow = mysqli_fetch_array($CategoryResult);
                            ?>
                              <option value="<?php echo $crow['c_id']?>"><?php echo $crow['c_name'];?></option>
                            <?php
                            }
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group" style="padding-top: 10px;">
                        <div class="col-12" style="text-align: center;">
                            <input type="button" class="btn btn-primary" name="btnAddNewEmployeeCategory" value="Add" onclick="AddNewCategoryEmployee()">
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