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
		<div class="container-fluid" id="ShowEditForm">
            <form method="" id="searchDepartmentForm">
            <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active"><h5 class="m-0">Department List</h5></li>
        </ul>
            <hr class="bdr-light">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <div class="ml-12">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-11" style="padding: 0px 20px 20px 0px;">
                            <input type="text" class="form-control" placeholder="Search" name="txtSearchDepartment">	
                          </div>
                          <div class="col-1" style="text-align: center;">
                            <input type="button" class="btn btn-primary" name="btnSearchDepartment" value="Search" onClick="SearchDepartment()">
                          </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Score</h4>
                        </div> -->
						  <div class="table-responsive" id="showDepartTable">
                        <table class="table table-hover table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Department Name</th>
							  <th scope="col">Department HOD Name</th>
							  <th scope="col" style="vertical-align:middle">Parent Department</th>
							  <th scope="col" style="vertical-align:middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                          $SearchSQL = "SELECT * FROM t_memc_department, t_memc_kpcc_department, t_memc_kpcc_employee_detail WHERE t_memc_kpcc_department.D_HODID = t_memc_kpcc_employee_detail.Emp_ID AND t_memc_kpcc_department.D_DID = t_memc_department.dpt_id ORDER BY D_ID";
                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
								  $SearchSQL2 = "SELECT * FROM t_memc_department, t_memc_kpcc_department WHERE t_memc_department.dpt_id = t_memc_kpcc_department.D_DPID";
								  $SearchResult2 = mysqli_query( $conn, $SearchSQL2 );
								if ( mysqli_num_rows( $SearchResult2 ) > 0 ) 
								{
									for($i = 0; $i < mysqli_num_rows($SearchResult2); ++$i)
									{
										$row = mysqli_fetch_array($SearchResult);
										$row2 = mysqli_fetch_array( $SearchResult2 );
										echo "<tr role=\"button\" onClick=\"editDepartment('".$row['D_ID']."')\">";
										echo "<td>".$row['D_ID']."</td>";
										echo "<td>".$row['D_DID']."-".$row['dpt_name']."</td>";
										echo "<td>".$row['D_HODID']."-".$row['Emp_Name']."</td>";
										echo "<td>".$row['D_DPID']."-".$row2['dpt_name']."</td>";
										echo "<td>".$row['D_Status']."</td>";
										echo "</tr>";
									}
                              }
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