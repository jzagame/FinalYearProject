<?php 
    error_reporting(0);
    include ("database/database.php");
	$formdata = $_POST['formdata'];
	$xx=0;
//Core Competecies
    if($_POST['action'] == "createcc"){
		
		$sql2= "SELECT * FROM t_memc_kpcc_corecompetencies";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[0]['value'] == $row2['Cc_name']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
			$addcc = "INSERT INTO t_memc_kpcc_corecompetencies (Cc_name,Cc_status) VALUES('".trim($formdata[0]['value'])."',
			'".trim($formdata[1]['value'])."'
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
            if($formdata[0]['value'] == $row2['Cc_name'] && $formdata[1]['value'] == $row2['Cc_status']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
		$uppmc = "UPDATE t_memc_kpcc_corecompetencies SET Cc_name='".trim($formdata[0]['value'])."',
		Cc_status='".trim($formdata[1]['value'])."' WHERE Cc_ID ='".trim($_POST['ccidd'])."'";
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

	if($_POST['action'] == "searchcc"){
		$sql= "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_ID IS NOT NULL AND "; //Search major competencies
		if(trim($formdata[0]['value']) != "")
		{
			$sql .= "Cc_name LIKE '%".trim($formdata[0]['value'])."%' AND ";
		}
		if(trim($formdata[1]['value']) != "")
		{
			$sql .= "Cc_status = '".trim($formdata[1]['value'])."' AND ";
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
			<th>Name</th>
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
			echo "<td>".$row['Cc_name']."</td>";
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
//Competencies Dimension
if($_POST['action'] == "createcd"){
	$sql2= "SELECT * FROM t_memc_kpcc_competenciesdimension";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[1]['value'] == $row2['Cd_Name'] && $formdata[0]['value'] == $row2['Cd_Cc_ID']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
			$addcc = "INSERT INTO t_memc_kpcc_competenciesdimension (Cd_Cc_ID,Cd_Name,Cd_Definition,Cd_status) VALUES('".trim($formdata[0]['value'])."',
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
	if($_POST['action'] == "editcd"){
		
		$sql2= "SELECT * FROM t_memc_kpcc_competenciesdimension";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[0]['value'] == $row2['Cd_Cc_ID'] && $formdata[1]['value'] == $row2['Cd_Name'] && $formdata[2]['value'] == $row2['Cd_Definition'] && $formdata[3]['value'] == $row2['Cd_status'] ){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
		$uppcd = "UPDATE t_memc_kpcc_competenciesdimension SET Cd_Cc_ID ='".trim($formdata[0]['value'])."', 
		Cd_Name='".trim($formdata[1]['value'])."',	
		Cd_Definition ='".trim($formdata[2]['value'])."',
		Cd_status='".trim($formdata[3]['value'])."' WHERE Cd_ID ='".trim($_POST['cdidd'])."'";
			if(mysqli_query($conn,$uppcd))
		 {
			
			echo "updated";
		 }
		 else 
		 {
			 echo "fail";
		 }
		}
	}
if($_POST['action'] == "searchcd"){
		$sql= "SELECT * FROM t_memc_kpcc_competenciesdimension,t_memc_kpcc_corecompetencies WHERE t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Cd_ID IS NOT NULL AND "; //Search Core competencies
		if(trim($formdata[0]['value']) != "")
		{
			$sql .= "Cc_name LIKE '%".trim($formdata[0]['value'])."%' AND ";
		}
		if(trim($formdata[1]['value']) != "")
		{
			$sql .= "Cd_Name LIKE '%".trim($formdata[1]['value'])."%' AND ";
		}
		if(trim($formdata[2]['value']) != "")
		{
			$sql .= "Cd_status = '".trim($formdata[2]['value'])."' AND ";
		}
		$sql.= "ORDER BY Cd_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
		{
            ?>
				
	  <table class="table table-hover" style="margin-top:15px">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Core Competency</th>
			<th>Competencies Dimension</th>
			<th>Definition</th> 
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
		 echo "<tr role=\"button\" onClick=\"sendeditcd('".$row['Cd_ID']."')\">";
			echo "<td>".$row['Cd_ID']."</td>";
			echo "<td>".$row['Cc_name']."</td>";
			echo "<td>".$row['Cd_Name']."</td>";
			echo "<td>".$row['Cd_Definition']."</td>";
			if($row['Cd_status']=="A"){
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


	

?>