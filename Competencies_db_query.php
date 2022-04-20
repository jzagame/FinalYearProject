<?php 
    error_reporting(0);
    include ("database/database.php");
	$formdata = $_POST['formdata'];
	$xx=0;
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
        
	}


	

?>