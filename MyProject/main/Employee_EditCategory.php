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
        <form id="EmployeeCategoryForm">
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
                      <div class="col-2" style="padding: 0px 20px 20px 0px;">
                        <label class="col-form-label">Category</label>	
                      </div>
                      <div class="col-9" style="padding: 0px 20px 20px 0px;">
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
                      <div class="col-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchCategoryEmployee" value="Search" onclick="SearchCategoryEmployee()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchTable">
                    
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