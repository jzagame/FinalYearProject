<?php 
  session_start();
  error_reporting(0);
  include ("database/database.php");
    include("MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< Updated upstream
	<?php
	
	?>

</head>

<body>
	<?php
	$xx=0;
	if($_GET['id'] != "")
	{
		$sql= "SELECT * FROM majorcompetencies WHERE Mc_ID = '".$_GET['id']."'";
		$result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row= mysqli_fetch_array($result);
		}
	}
    if($_POST['btnedit'])   
	{
		$sql2= "SELECT * FROM majorcompetencies";
        $result2=mysqli_query($link,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($_POST['txtname'] == $row2['Mc_name'] && $_POST['selstatus'] == $row2['Mc_status']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "<script>alert('Same Major Competencies Exist.');</script>";
        }
		else{
		$uppmc = "UPDATE majorcompetencies SET Mc_name='".trim($_POST['txtname'])."',
		Mc_status='".trim($_POST['selstatus'])."' WHERE Mc_ID ='".trim($_GET['id'])."'";
			if(mysqli_query($link,$uppmc))
		 {
			
			echo "<script>alert('Update successfully.');location='competencies_searchmajor.php?id=e';</script>";
		 }
		 else 
		 {
			 echo "<script>alert('Update failed.');location='competencies_searchmajor.php?id=e';</script>";
		 }
		}
		
			
	}
    elseif(isset($_POST['btnadd'])) //Add the Major Competencies information
    {
		$sql2= "SELECT * FROM majorcompetencies";
        $result2=mysqli_query($link,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($_POST['txtname'] == $row2['Mc_name']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "<script>alert('Same Major Competencies Exist.');</script>";
        }
		else{
			$addmc = "INSERT INTO majorcompetencies (Mc_name,Mc_status) VALUES('".trim($_POST['txtname'])."',
			'".trim($_POST['selstatus'])."'
			)";

			$addmcsql= mysqli_query($link,$addmc);
			if($addmcsql)
			{
				echo "<script>alert('Created successfully.');location='';</script>";
			}
			else 
			{
				echo "<script>alert('Create failure.');location='';</script>'";	
			}
		}
    }
	?>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Add Major Competencies</h3>
            <div class="card">
				<?php if($_GET['id'] != ""){?>
				<input class="btn-block btn-primary col-2" type="submit" name="btnback" value="<Back" onClick="location='competencies_searchmajor.php?id=e'">
				<?php
				}
				?>
                <h5 class="text-center mb-4"></h5>
                <form class="form-card" method="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Major Competency name</label> 
                        <div class="col-md-12">
                            <textarea id="form_message" name="txtname" class="form-control" placeholder="Write the name here." rows="3" required="required" data-error="Please, leave us a message."><?php if($_GET['id'] != "")echo $row['Mc_name'];else echo $_POST['txtname']; ?></textarea> 
							</div>
                        </div>
                        </div>
						<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Status</label>
							<div class="col-md-12">
						<select class="custom-select form-control col-5" id="Position" name="selstatus">
							<?php 
								if($_GET['id'] != ""){
									if($row['Mc_status']=="A")
									{
										echo "<option selected=\"selected\" value=\"".$row['status']."\">Active</option>";
										echo "<option value=\"I\">Inactive</option>";
									}else{
										echo "<option selected=\"selected\" value=\"".$row['status']."\">Inactive</option>";
										echo "<option value=\"A\">Active</option>";
									}
									}else{
								 

							?>
							<option value="A">Active</option>
							<option value="I">Inactive</option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
							</div>
                        <div class="row justify-content-center">
                        <div class="form-group col-sm-6">
                        <input class="btn-block btn-primary" type="submit" name="<?php if($_GET['id']!=""){echo "btnedit";}else echo "btnadd"; ?>" 
                            value="<?php if($_GET['id']!=""){echo "Update";}else echo "Create"; ?>">
                        </div>
                    </div>
                    

                    
                </form>
            </div>
        </div>
    </div>
</div>


</body>

=======
	
</head>

<body>

	<script>
	window.onload = function() {
	   showaddf();
	}
	</script> 
	<div id="show_addmc"></div>



</body>
<script src="js/Ajax.js"></script>
>>>>>>> Stashed changes
</html>