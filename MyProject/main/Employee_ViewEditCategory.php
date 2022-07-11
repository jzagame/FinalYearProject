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
        <form method="" id="searchCategoryForm">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active"><h5 class="m-0">Category List</h5></li>
        </ul>
        <hr class="bdr-light">
          <div class="container-fluid" id="SearchCategoryDiv">
            <div class="row">
              <div class="col">
                <div class="ml-12">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11" style="padding: 0px 20px 20px 0px;">
                        <input type="text" class="form-control" placeholder="Search" name="txtSearchCategory">	
                      </div>
                      <div class="col-1" style="text-align: center;">
                        <input type="button" class="btn btn-primary" name="btnSearchCategory" value="Search" onclick="SearchCategory()">
                      </div>
                    </div>
                    <!-- <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">Score</h4>
                    </div> -->
                    <div class="table-responsive" id="showSearchTable">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" style="width:15px"></th>
                          <th scope="col">No.</th>
                          <th scope="col">Category</th>
                          <th scope="col" style="vertical-align:middle">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $SearchSQL = "SELECT * FROM t_memc_kpcc_category";
                          $SearchResult = mysqli_query($conn, $SearchSQL);
                          if(mysqli_num_rows($SearchResult) > 0)
                          {
                              for($i = 0; $i < mysqli_num_rows($SearchResult); ++$i)
                              {
                                $row = mysqli_fetch_array($SearchResult);
                                echo "<td><input type=\"button\" name=\"btnedit\" value=\"Edit\" class=\"btn btn-primary\" onClick=\"editCategory('".$row['c_id']."')\"></td>";
                                echo "<td>".($i+1)."</td>";
                                echo "<td>".$row['c_name']."</td>";
                                if($row['c_status'] == 1)
                                {
                                  echo "<td>ACTIVE</td>";
                                }
                                else
                                {
                                  echo "<td>INACTIVE</td>";
                                }
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