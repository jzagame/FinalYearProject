<?php 
    error_reporting(0);
    include ("database/database.php");
$mcid1 = $_POST['mcid1'];
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
				<h3><strong>Create Major Competencies</strong></h3>
				<div class="card">
					<?php if($mcid1 !=""){?>
					<input class="btn btn-dark col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchmajor.php?id=e'">
					<?php
					}
					?>
					<h5 class="text-center mb-4"></h5>
					<form class="form-card" id="amc">
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
							<button class="btn btn-dark" type="button" onClick="<?php if($mcid1!=""){echo "btneditmcf(".$mcid1.")";}else echo "btnaddmcf()"; ?>"><?php if($mcid1!=""){echo "Update";}else echo "Create"; ?></button>
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



?>
