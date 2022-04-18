<?php 
  session_start();
  error_reporting(0);
  include ("database/database.php");
    include("MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
<?php
	if($_POST['btnsearch'])
	{
		$sql= "SELECT * FROM majorcompetencies WHERE Mc_ID IS NOT NULL AND "; //Search major competencies
		if(trim($_POST['txtsname']) != "")
		{
			$sql .= "Mc_name LIKE '%".trim($_POST['txtsname'])."%' AND ";
		}
		if(trim($_POST['selstatus']) != "")
		{
			$sql .= "Mc_status = '".trim($_POST['selstatus'])."' AND ";
		}
		$sql.= "ORDER BY Mc_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($link,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
	
<div class="container px-1 py-5 mx-auto">
<div class="row d-flex justify-content-center">
	<div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
		<div class="card">
			<input class="btn-block btn-primary col-2" type="submit" name="btnback" value="<Back" onClick="location='competencies_searchmajor.php?id=e'">
	  <h2>Major Competencies</h2>            
	  <table class="table table-hover">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
        if($_GET['id'] == "e")
        {
		 echo "<tr role=\"button\" onclick=\"location='competencies_addmajor.php?id=".$row['Mc_ID']."'\">";
        }
        else{
            echo "<tr>";
        }
			echo "<td>".$row['Mc_ID']."</td>";
			echo "<td>".$row['Mc_name']."</td>";
			if($row['Mc_status']=="A"){
				echo "<td>Active</td>";
			}else{
				echo "<td>Inactive</td>";
			}
		echo "</tr>";	
	}
	?>
    </tbody>
            </table>
    </div>
	</div>
    </div>
</div>
	
<?php
		}
        else
        {
            echo "<script>alert('Not Found.');location='';</script>";
        }
	}
	else
	{
	?>
    <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Search Major Competencies</h3>
            <div class="card">
                <h5 class="text-center mb-4"></h5>
                <form class="form-card" METHOD="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Major Competency name</label> 
                        <div class="col-md-12">
                            <textarea id="form_message" name="txtsname" class="form-control" placeholder="Empty to search all" rows="3" data-error="Please, leave us a message."></textarea> </div>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="form-group col-sm-6">
                        <input class="btn-block btn-primary" type="submit" name="btnsearch" value="Search">
                        </div>
                    </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</div>

    <?php
	}
?>


</body>

</html>