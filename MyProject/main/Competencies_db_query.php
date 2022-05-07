<?php 
    error_reporting(0);
  include ("../../includes/assest/library/database.php");
	$formdata = $_POST['formdata'];
	$xx=0;
	$c=0;
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
			$formdata2 = str_replace("'", "\'",$formdata[2]['value']);
			$addcd = "INSERT INTO t_memc_kpcc_competenciesdimension (Cd_Cc_ID,Cd_Name,Cd_Definition,Cd_status) VALUES('".trim($formdata[0]['value'])."',
			'".trim($formdata[1]['value'])."',
			'".trim($formdata2)."',
			'".trim($formdata[3]['value'])."'
			)";

			$addcdsql= mysqli_query($conn,$addcd);
			if($addcdsql)
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
		$formdata2 = str_replace("'", "\'",$formdata[2]['value']);
		$uppcd = "UPDATE t_memc_kpcc_competenciesdimension SET Cd_Cc_ID ='".trim($formdata[0]['value'])."', 
		Cd_Name='".trim($formdata[1]['value'])."',	
		Cd_Definition ='".trim($formdata2)."',
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

if($_POST['action'] == "createitem"){
	$sql2= "SELECT * FROM t_memc_kpcc_items";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[1]['value'] == $row2['Im_Name']){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
			$formdata7 = str_replace("'", "\'",$formdata[7]['value']);
			$formdata6 = str_replace("'", "\'",$formdata[6]['value']);
			$formdata5 = str_replace("'", "\'",$formdata[5]['value']);
			$formdata4 = str_replace("'", "\'",$formdata[4]['value']);
			$formdata3 = str_replace("'", "\'",$formdata[3]['value']);
			$formdata2 = str_replace("'", "\'",$formdata[2]['value']);
			
			$itemdes = array($formdata7,$formdata6,$formdata5,$formdata4,$formdata3);
			
			$additem = "INSERT INTO t_memc_kpcc_items (Im_Cd_ID,Im_Name,Im_Definition,Im_Status) VALUES('".trim($formdata[0]['value'])."',
			'".trim($formdata[1]['value'])."',
			'".trim($formdata2)."',
			'".trim($formdata[8]['value'])."'
			)";
			
			$additemsql= mysqli_query($conn,$additem);
			$last_id = mysqli_insert_id($conn);
			
			for($i =0; $i<5; ++$i){
				$additem2 = "INSERT INTO t_memc_kpcc_Items_lvl_desc (Im_lvl_Im_ID,Im_lvl_Name,Im_lvl_Description,Im_lvl_Status) VALUES('".trim($last_id)."',
				'level ".trim(($i + 1))."',
				'".trim($itemdes[$i])."',
				'".trim($formdata[8]['value'])."'
			)";
				$additemlvlsql= mysqli_query($conn,$additem2);
				if($additemlvlsql){
					++$c;
				}
			}
			if($additemsql && $c==5)
			{
				echo "success";
			}
			else 
			{
				echo "fail";	
			}
		}
}

if($_POST['action'] == "searchitem"){
		$sql= "SELECT * FROM t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_items.Im_Cd_ID = t_memc_kpcc_competenciesdimension.Cd_ID AND t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Im_ID IS NOT NULL AND "; //Search item
		if(trim($formdata[0]['value']) != "")
		{
			$sql .= "Cc_name LIKE '%".trim($formdata[0]['value'])."%' AND ";
		}
		if(trim($formdata[1]['value']) != "")
		{
			$sql .= "Cd_name LIKE '%".trim($formdata[1]['value'])."%' AND ";
		}
		if(trim($formdata[2]['value']) != "")
		{
			$sql .= "Im_Name LIKE '%".trim($formdata[2]['value'])."%' AND ";
		}
		if(trim($formdata[3]['value']) != "")
		{
			$sql .= "Im_status = '".trim($formdata[3]['value'])."' AND ";
		}
		$sql.= "ORDER BY Im_ID";
		$sql = str_replace("AND ORDER","ORDER",$sql);
		$view= mysqli_query($conn,$sql);
		if(mysqli_num_rows($view) > 0)
{
            ?>
	  <table class="table table-hover table-sm" style="margin-top:15px">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Core Competency</th>
			<th>Competencies Dimension</th>
			<th>Item Name</th> 
			<th>Definition</th>
			<th>Lv 5 Definition</th>
			<th>Lv 4 Definition</th>
			<th>Lv 3 Definition</th>
			<th>Lv 2 Definition</th>
			<th>Lv 1 Definition</th>
			<th>Status</th>
		  </tr>
		</thead>
<tbody>
         <?php
	for($i=0;$i<mysqli_num_rows($view);++$i)
	{
		$row = mysqli_fetch_array($view);
		 echo "<tr role=\"button\" onClick=\"sendedititem('".$row['Im_ID']."')\">";
			echo "<td>".$row['Im_ID']."</td>";
			echo "<td>".$row['Cc_name']."</td>";
			echo "<td>".$row['Cd_Name']."</td>";
			echo "<td>".$row['Im_Name']."</td>";
			echo "<td>".$row['Im_Definition']."</td>";
		  $catesql = "SELECT * FROM t_memc_kpcc_items_lvl_desc WHERE Im_lvl_Im_ID = ".$row['Im_ID']."";
		  $view2 = mysqli_query( $conn, $catesql );
		  if ( mysqli_num_rows( $view2 ) > 0 ) {
			for ( $x = 0; $x < mysqli_num_rows( $view2 ); ++$x ) {
			  $row2 = mysqli_fetch_array( $view2 );
				echo "<td>".$row2['Im_lvl_Description']."</td>";
			}
		  }
			if($row['Im_Status']=="A"){
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

if($_POST['action'] == "edititem"){
		
		$sql2= "SELECT * FROM t_memc_kpcc_items";
        $result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0)
		{
            for($i=0;$i<mysqli_num_rows($result2);++$i)      
	        {
			$row2= mysqli_fetch_array($result2);
            if($formdata[0]['value'] == $row2['Im_Cd_ID'] && $formdata[1]['value'] == $row2['Im_Name'] && $formdata[2]['value'] == $row2['Im_Definition'] && $formdata[7]['value'] == $row2['Im_lv1_Def'] && $formdata[6]['value'] == $row2['Im_lv2_Def']&& $formdata[5]['value'] == $row2['Im_lv3_Def']&& $formdata[4]['value'] == $row2['Im_lv4_Def']&& $formdata[3]['value'] == $row2['Im_lv5_Def']&& $formdata[8]['value'] == $row2['Im_Status'] ){
            $xx=1;}
            }
		}
		if($xx == 1){
            echo "same";
        }
		else{
		$formdata7 = str_replace("'", "\'",$formdata[7]['value']);
		$formdata6 = str_replace("'", "\'",$formdata[6]['value']);
		$formdata5 = str_replace("'", "\'",$formdata[5]['value']);
		$formdata4 = str_replace("'", "\'",$formdata[4]['value']);
		$formdata3 = str_replace("'", "\'",$formdata[3]['value']);
		$formdata2 = str_replace("'", "\'",$formdata[2]['value']);
		
		$itemdes = array($formdata7,$formdata6,$formdata5,$formdata4,$formdata3);
			
		$uppcd = "UPDATE t_memc_kpcc_items SET Im_Cd_ID ='".trim($formdata[0]['value'])."', 
		Im_Name='".trim($formdata[1]['value'])."',	
		Im_Definition ='".trim($formdata2)."',
		Im_status='".trim($formdata[8]['value'])."' WHERE Im_ID ='".trim($_POST['itemidd'])."'";
			
		$lvlidarray = array();	
		$getlvlid = "SELECT * FROM t_memc_kpcc_Items_lvl_desc WHERE Im_lvl_Im_ID = '".trim($_POST['itemidd'])."'";
		$view2 = mysqli_query( $conn, $getlvlid );
		  if ( mysqli_num_rows( $view2 ) > 0 ) {
			for ( $x = 0; $x < mysqli_num_rows( $view2 ); ++$x ) {
			  $row2 = mysqli_fetch_array( $view2 );
				array_push($lvlidarray,$row2['Im_lvl_ID']);
			}
		  }
			
		for($i =0; $i<5; ++$i){
			$uppitemlvl = "UPDATE t_memc_kpcc_Items_lvl_desc SET Im_lvl_Description = '".trim($itemdes[$i])."',
			Im_lvl_Status = '".trim($formdata[8]['value'])."' WHERE Im_lvl_Im_ID = '".trim($_POST['itemidd'])."' AND Im_lvl_ID = ".$lvlidarray[$i]."";
			$additemlvlsql= mysqli_query($conn,$uppitemlvl);
			if($additemlvlsql){
				++$c;
			}
		}

		if(mysqli_query($conn,$uppcd) && $c==5)
		 {
			
			echo "updated";
		 }
		 else 
		 {
			 echo "fail";
		 }
		}
	}

?>