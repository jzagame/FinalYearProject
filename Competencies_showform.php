<?php 
    error_reporting(0);
    include ("database/database.php");
<<<<<<< Updated upstream
<<<<<<< Updated upstream
$mcid1 = $_POST['mcid1'];
=======
=======
>>>>>>> Stashed changes

$mcid1 = $_POST['mcid1'];
$ccid1 = $_POST['ccid1'];
//Major Competecies
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
if($_POST['action'] == "showaddmc"){
	
	if($mcid1 != "")
	{
		$sql= "SELECT * FROM t_memc_kpcc_majorcompetencies WHERE Mc_ID = '".$mcid1."'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row= mysqli_fetch_array($result);
		}
	}
	?>
	<div class="container-fluid px-1 py-3 mx-auto">
		<div class="row d-flex justify-content-center">
			<div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
				<h3><strong>Create Major Competencies</strong></h3>
				<div class="card">
					<?php if($mcid1 !=""){?>
					<input class="btn btn-dark col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchmajor.php?id=e'">
=======
=======
>>>>>>> Stashed changes
				<h3><strong><?php if($ccid1 !=""){ ?> Edit Major Competecies<?php }else  {?>Create Major Competencies <?php } ?></strong></h3>
				<div class="card">
					<?php if($mcid1 !=""){?>
					<input class="btn btn-dark col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchmajor.php'">
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
					<?php
					}
					?>
					<h5 class="text-center mb-4"></h5>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
					<form class="form-card" id="amc">
=======
					<form class="form-card" id="amc" onSubmit="event.preventDefault(); <?php if($mcid1!=""){echo "btneditmcf(".$mcid1.")";}else echo "btnaddmcf()"; ?>">
>>>>>>> Stashed changes
=======
					<form class="form-card" id="amc" onSubmit="event.preventDefault(); <?php if($mcid1!=""){echo "btneditmcf(".$mcid1.")";}else echo "btnaddmcf()"; ?>">
>>>>>>> Stashed changes
						<div class="row justify-content-center text-left">
							<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Major Competency name</label> 
							<div class="col-md-12">
								<textarea id="form_message" name="txtname" class="form-control" placeholder="Write the name here." rows="3" required="required" data-error="Please, leave a name."><?php if($mcid1 != "")echo $row['Mc_name']; ?></textarea> 
								</div>
							</div>
							</div>
							<div class="row justify-content-center text-left">
							<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Status</label>
								<div class="col-md-12">
							<select class="custom-select form-control col-5" id="Position" name="selstatus">
								<?php 
									if($mcid1 != ""){
										if($row['Mc_status']=="A")
										{
											echo "<option selected=\"selected\" value=\"A\">Active</option>";
											echo "<option value=\"I\">Inactive</option>";
										}else{
											echo "<option selected=\"selected\" value=\"I\">Inactive</option>";
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
							<button class="btn btn-dark" type="button" onClick="<?php if($mcid1!=""){echo "btneditmcf(".$mcid1.")";}else echo "btnaddmcf()"; ?>"><?php if($mcid1!=""){echo "Update";}else echo "Create"; ?></button>
=======
							<input class="btn btn-dark" type="submit" value="<?php if($mcid1!=""){echo "Update";}else echo "Create"; ?>" >
>>>>>>> Stashed changes
=======
							<input class="btn btn-dark" type="submit" value="<?php if($mcid1!=""){echo "Update";}else echo "Create"; ?>" >
>>>>>>> Stashed changes
								<input type="reset" class="btn btn-dark" name="btnclear" value="Clear">
							</div>
						</div>



					</form>
				</div>
			</div>
		</div>
	</div>
<?php
}
<<<<<<< Updated upstream
<<<<<<< Updated upstream



=======
=======
>>>>>>> Stashed changes
//Core Competencies
if($_POST['action'] == "showaddcc"){

	if($ccid1 != "")
	{
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_ID = '".$ccid1."'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row= mysqli_fetch_array($result);
		}
	}
	?>
	<div class="container-fluid px-1 py-3 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3><strong><?php if($ccid1 !=""){ ?> Edit Core Competecies<?php }else  {?>Create Core Competencies <?php } ?></strong></h3>
            <div class="card">
				<?php if($ccid1 !=""){?>
				<input class="btn btn-dark col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchcore.php'">
				<?php
				}
				?>
                <h5 class="text-center mb-4"></h5>
                <form class="form-card" id="acc" onSubmit="event.preventDefault(); <?php if($ccid1!=""){echo "btneditccf(".$ccid1.")";}else echo "btnaddccf()"; ?>">
					<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Major Competency</label>
							<div class="col-md-12">
						<select class="custom-select form-control col-5" id="Position" name="selmcid">
							<?php 
							$catesql= "SELECT * FROM t_memc_kpcc_majorcompetencies";
							$view= mysqli_query($conn,$catesql);
							if(mysqli_num_rows($view) > 0)
							{
								for($i=0;$i<mysqli_num_rows($view);++$i)
								{
								$row2 = mysqli_fetch_array($view);
									if($ccid1 !="" && $row['Cc_Mc_ID'] == $row2['Mc_ID']){
										echo "<option selected=\"selected\" value=\"".$row2['Mc_ID']."\">".$row2['Mc_name']."</option>";
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
                            <input type="text" class="form-control" placeholder="Enter Core Competency Name" name="txtname" value="<?php if($ccid1 !="")echo $row['Cc_Name']; ?>" required="required" data-error="Please, leave a name.">	
							</div>
							</div>
						</div>
					<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Core Competency Description</label> 
                        <div class="col-md-12">
                            <textarea id="form_message" name="txtdes" class="form-control" placeholder="Describe here" rows="3" ><?php if($ccid1 !="")echo $row['Cc_Description']; ?></textarea> 
							</div>
                        </div>
                         </div>
						<div class="row justify-content-center text-left">
						<div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Status</label>
							<div class="col-md-12">
						<select class="custom-select form-control col-5" name="selstatus">
							<?php 
								if($ccid1 !=""){
									if($row['Cc_status']=="A")
									{
										echo "<option selected=\"selected\" value=\"".$row['Cc_status']."\">Active</option>";
										echo "<option value=\"I\">Inactive</option>";
									}else{
										echo "<option selected=\"selected\" value=\"".$row['Cc_status']."\">Inactive</option>";
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
						<input class="btn btn-dark" type="submit" value="<?php if($ccid1!=""){echo "Update";}else echo "Create"; ?>">
							<input type="reset" class="btn btn-dark" name="btnclear" value="Clear">
                        </div>
                    </div>
                    

                    
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	
	
}
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
?>
