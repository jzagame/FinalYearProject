<?php 
  session_start();
  error_reporting(0);
  include ("database/database.php");
    include("MenuBar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	
	?>

</head>

<body>
	<?php
	$xx=0;
	if($_GET['id'] != "")
	{
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_ID = '".$_GET['id']."'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row= mysqli_fetch_array($result);
		}
	}
    if($_POST['btnedit'])   
	{
		$sql2= "SELECT * FROM t_memc_kpcc_corecompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($_POST['txtName'] == $row2['Cc_Name'] && $_POST['selstatus'] == $row2['Cc_status']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "<script>alert('Same Core Competencies Exist.');</script>";
        }
		else{
		$uppcc = "UPDATE t_memc_kpcc_corecompetencies SET Cc_Name='".trim($_POST['txtName'])."',
		Cc_status='".trim($_POST['selstatus'])."' WHERE Cc_ID ='".trim($_GET['id'])."'";
			if(mysqli_query($conn,$uppcc))
		 {
			
			echo "<script>alert('Update successfully.');location='competencies_searchcore.php?id=e';</script>";
		 }
		 else 
		 {
			 echo "<script>alert('Update failed.');location='competencies_searchcore.php?id=e';</script>";
		 }
		}
		
			
	}
    elseif(isset($_POST['btnadd'])) //Add the Core Competencies information
    {
		$sql2= "SELECT * FROM t_memc_kpcc_corecompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($_POST['txtname'] == $row2['Cc_Name'] && $_POST['selmcid'] == $row2['Cc_Mc_ID']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "<script>alert('Same Core Competencies Exist.');</script>";
        }
		else{
			$addcc = "INSERT INTO t_memc_kpcc_corecompetencies (Cc_Mc_ID,Cc_Name,Cc_Description,Cc_status) VALUES('".trim($_POST['selmcid'])."',
			'".trim($_POST['txtname'])."',
			'".trim($_POST['txtdes'])."',
			'".trim($_POST['selstatus'])."'
			)";

			$addccsql= mysqli_query($conn,$addcc);
			if($addccsql)
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
<div class="container-fluid px-1 py-3 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Create Core Competencies</h3>
            <div class="card">
				<?php if($_GET['id'] != ""){?>
				<input class="btn btn-dark col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchcore.php?id=e'">
				<?php
				}
				?>
                <h5 class="text-center mb-4"></h5>
                <form class="form-card" method="post">
					<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Major Competency</label>
							<div class="col-md-12">
						<select class="custom-select form-control col-5" id="Position" name="selmcid">
							<?php 
							$catesql= "SELECT * FROM t_memc_kpcc_majorcompetencies WHERE Mc_status = 'A'";
							$view= mysqli_query($conn,$catesql);
							if(mysqli_num_rows($view) > 0)
							{
								for($i=0;$i<mysqli_num_rows($view);++$i)
								{
								$row2 = mysqli_fetch_array($view);
									if($_GET['id'] != "" && $row['Cc_Mc_ID'] == $row2['Mc_ID']){
										echo "<option selected=\"selected\" value=\"".$row2['Cc_ID']."\">".$row2['Cc_Name']."</option>";
									}else
									{	echo "<option value=\"".$row2['Mc_ID']."\">".$row2['Mc_name']."</option>";}
								}
							}
							?>
						</select>
						</div>
					</div>
					</div>
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
						<label class="form-control-label px-3">Core Competency Name</label>
						<div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Enter Core Competency Name" name="txtname" value="<?php if($_GET['id'] != "")echo $row['Cc_Name'];else echo $_POST['txtname']; ?>">	
							</div>
							</div>
						</div>
					<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Core Competency Description</label> 
                        <div class="col-md-12">
                            <textarea id="form_message" name="txtdes" class="form-control" placeholder="Describe here" rows="3" ><?php if($_GET['id'] != "")echo $row['Cc_Description'];else echo $_POST['txtdes']; ?></textarea> 
							</div>
                        </div>
                         </div>
						<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Status</label>
							<div class="col-md-12">
						<select class="custom-select form-control col-5" id="Position" name="selstatus">
							<?php 
								if($_GET['id'] != ""){
									if($row['Cc_status']=="A")
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
                        <input class="btn btn-dark" type="submit" name="<?php if($_GET['id']!=""){echo "btnedit";}else echo "btnadd"; ?>" 
                            value="<?php if($_GET['id']!=""){echo "Update";}else echo "Create"; ?>">
							<input type="reset" class="btn btn-dark" name="btnclear" value="Clear">
                        </div>
                    </div>
                    

                    
                </form>
            </div>
        </div>
    </div>
</div>


</body>

</html>