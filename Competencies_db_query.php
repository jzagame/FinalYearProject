<?php 
    error_reporting(0);
    include ("database/database.php");
	$formdata = $_POST['formdata'];
	$xx=0;
<<<<<<< Updated upstream
=======
//Major Competecies
>>>>>>> Stashed changes
    if($_POST['action'] == "createmc"){
		
		$sql2= "SELECT * FROM t_memc_kpcc_majorcompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[0]['value'] == $row2['Mc_name']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
			$addmc = "INSERT INTO t_memc_kpcc_majorcompetencies (Mc_name,Mc_status) VALUES('".trim($formdata[0]['value'])."',
			'".trim($formdata[1]['value'])."'
			)";
			$addmcsql= mysqli_query($conn,$addmc);
			if($addmcsql)
			{
				
				echo "success";
			}
			else 
			{
				echo "fail";	
			}
		}
        
    }


	if($_POST['action'] == "editmc"){
		
		$sql2= "SELECT * FROM t_memc_kpcc_majorcompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[0]['value'] == $row2['Mc_name'] && $formdata[1]['value'] == $row2['Mc_status']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
		$uppmc = "UPDATE t_memc_kpcc_majorcompetencies SET Mc_name='".trim($formdata[0]['value'])."',
		Mc_status='".trim($formdata[1]['value'])."' WHERE Mc_ID ='".trim($_POST['mcidd'])."'";
			if(mysqli_query($conn,$uppmc))
		 {
			
			echo "updated";
		 }
		 else 
		 {
			 echo "fail";
		 }
		}
	}

	if($_POST['action'] == "searchmc"){
		$sql= "SELECT * FROM t_memc_kpcc_majorcompetencies WHERE Mc_ID IS NOT NULL AND "; //Search major competencies
		if(trim($formdata[0]['value']) != "")
		{
			$sql .= "Mc_name LIKE '%".trim($formdata[0]['value'])."%' AND ";
		}
		if(trim($formdata[1]['value']) != "")
		{
			$sql .= "Mc_status = '".trim($formdata[1]['value'])."' AND ";
		}
		$sql.= "ORDER BY Mc_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
	  <table class="table table-hover" style="margin-top:15px">
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
		
		 echo "<tr role=\"button\" onClick=\"sendeditmc('".$row['Mc_ID']."')\">";

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
<<<<<<< Updated upstream
        
	}
=======
		else{
			echo "nf";
		}
        
	}
//Core Competencies
if($_POST['action'] == "createcc"){
	$sql2= "SELECT * FROM t_memc_kpcc_corecompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[1]['value'] == $row2['Cc_Name'] && $formdata[0]['value'] == $row2['Cc_Mc_ID']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
			$addcc = "INSERT INTO t_memc_kpcc_corecompetencies (Cc_Mc_ID,Cc_Name,Cc_Description,Cc_status) VALUES('".trim($formdata[0]['value'])."',
			'".trim($formdata[1]['value'])."',
			'".trim($formdata[2]['value'])."',
			'".trim($formdata[3]['value'])."'
			)";

			$addccsql= mysqli_query($conn,$addcc);
			if($addccsql)
			{
				echo "success";
			}
			else 
			{
				echo "fail";	
			}
		}
}
	if($_POST['action'] == "editcc"){
		
		$sql2= "SELECT * FROM t_memc_kpcc_corecompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[0]['value'] == $row2['Cc_Mc_ID'] && $formdata[1]['value'] == $row2['Cc_Name'] && $formdata[2]['value'] == $row2['Cc_Description'] && $formdata[3]['value'] == $row2['Cc_status'] ){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
		$uppcc = "UPDATE t_memc_kpcc_corecompetencies SET Cc_Mc_ID ='".trim($formdata[0]['value'])."', 
		Cc_Name='".trim($formdata[1]['value'])."',	
		Cc_Description ='".trim($formdata[2]['value'])."',
		Cc_status='".trim($formdata[3]['value'])."' WHERE Cc_ID ='".trim($_POST['ccidd'])."'";
			if(mysqli_query($conn,$uppcc))
		 {
			
			echo "updated";
		 }
		 else 
		 {
			 echo "fail";
		 }
		}
	}
if($_POST['action'] == "searchcc"){
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies,t_memc_kpcc_majorcompetencies WHERE t_memc_kpcc_majorcompetencies.Mc_ID = t_memc_kpcc_corecompetencies.Cc_Mc_ID AND Cc_ID IS NOT NULL AND "; //Search Core competencies
		if(trim($formdata[0]['value']) != "")
		{
			$sql .= "Mc_name LIKE '%".trim($formdata[0]['value'])."%' AND ";
		}
		if(trim($formdata[1]['value']) != "")
		{
			$sql .= "Cc_Name LIKE '%".trim($formdata[1]['value'])."%' AND ";
		}
		if(trim($formdata[2]['value']) != "")
		{
			$sql .= "Cc_status = '".trim($formdata[2]['value'])."' AND ";
		}
		$sql.= "ORDER BY Cc_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
				
	  <table class="table table-hover" style="margin-top:15px">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Major Competency</th>
			<th>Name</th>
			<th>Description</th> 
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
		 echo "<tr role=\"button\" onClick=\"sendeditcc('".$row['Cc_ID']."')\">";
			echo "<td>".$row['Cc_ID']."</td>";
			echo "<td>".$row['Mc_name']."</td>";
			echo "<td>".$row['Cc_Name']."</td>";
			echo "<td>".$row['Cc_Description']."</td>";
			if($row['Cc_status']=="A"){
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
		else{
			echo "nf";
		}
	
}
>>>>>>> Stashed changes


	

?>