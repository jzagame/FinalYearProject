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
      <?php
        if($_POST['btnSearchDepartment']){
				
			$SQL = "SELECT * FROM Department WHERE D_Status = 'A' ";
			if(trim($_POST['txtSearchDepartment']) != "")
			{
				$SQL .= " AND Department.D_Name = '".strtoupper(trim($_POST['txtSearchDepartment']))."'";	
			}
			$Result = mysqli_query($link, $SQL);
			if(mysqli_num_rows($Result) > 0)
			{
			
      ?>
      <?php
        }
			else{
					echo "<script>alert('No Record Found.');</script>";
					echo "<script> location = 'Employee_ViewEditDepartment.php' </script>";
				}
		}
      ?>
		<div class="container" style="padding: 50px 0px 50px 100px;">
            <form action="" method="post">
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
                            <input type="submit" class="btn btn-dark" name="btnSearchDepartment" value="Search">
                          </div>
                        </div>
                        <!-- <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Score</h4>
                        </div> -->
						  <div class="table-responsive">
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Department Name</th>
							  <th scope="col">Department HOD Name</th>
                              <th scope="col" style="vertical-align:middle">Nodes</th>
                              <th scope="col" style="vertical-align:middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
					for($i = 0; $i < mysqli_num_rows($Result); $i++)
					{
						$row = mysqli_fetch_array($Result);
						echo "<tr>";
						//if($_GET['id'] == 'e')
						//echo "onclick = \"location = 'addEmp.php?id=".$row['D_ID']."'\"";
						//else echo  "onclick = \"location = 'empReport.php?id=".$row['EmpId']."'\"";
//						echo ">";
						echo "<td>".$row['D_ID']."</td>";
						echo "<td>".$row['D_Name']."</td>";
						echo "<td>".$row['D_HODName']."</td>";
						echo "<td>".$row['D_HODNode']."</td>";
						echo "<td>".$row['D_Status']."</td>";
						echo "</tr>";
						
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
</html>