<?php
error_reporting( 0 );
  include ("../../includes/database.php");

$ccid1 = $_POST[ 'ccid1' ];
$cdid1 = $_POST[ 'cdid1' ];
$itemid1 = $_POST[ 'itemid1' ];
//Core Competecies
if ( $_POST[ 'action' ] == "showaddcc" ) {

  if ( $ccid1 != "" ) {
    $sql = "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_ID = '" . $ccid1 . "'";
    $result = mysqli_query( $conn, $sql );
    if ( mysqli_num_rows( $result ) > 0 ) {
      $row = mysqli_fetch_array( $result );
    }
  }
  ?>
<div class="container-fluid px-1 py-3 mx-auto">
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
      <h3><strong>
        <?php if($ccid1 !=""){ ?>
        Edit Core Competecies
        <?php }else  {?>
        Create Core Competencies
        <?php } ?>
        </strong></h3>
      <div class="card">
        <?php if($ccid1 !=""){?>
        <input class="btn btn-primary col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchcore.php'">
        <?php
        }
        ?>
        <h5 class="text-center mb-4"></h5>
        <form class="form-card" id="acc" onSubmit="event.preventDefault(); <?php if($ccid1!=""){echo "btneditccf(".$ccid1.")";}else echo "btnaddccf()"; ?>">
          <div class="row justify-content-center text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
              <label class="form-control-label px-3">Core Competency name</label>
              <div class="col-md-12">
                <textarea id="form_message" name="txtname" class="form-control" placeholder="Write the name here." rows="3" required="required" data-error="Please, leave a name."><?php if($ccid1 != "")echo $row['Cc_name']; ?>
</textarea>
              </div>
            </div>
          </div>
          <div class="row justify-content-center text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
              <label class="form-control-label px-3">Status</label>
              <div class="col-md-12">
                <select class="custom-select form-control col-5" id="Position" name="selstatus">
                  <?php
                  if ( $ccid1 != "" ) {
                    if ( $row[ 'Cc_status' ] == "A" ) {
                      echo "<option selected=\"selected\" value=\"A\">Active</option>";
                      echo "<option value=\"I\">Inactive</option>";
                    } else {
                      echo "<option selected=\"selected\" value=\"I\">Inactive</option>";
                      echo "<option value=\"A\">Active</option>";
                    }
                  } else {


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
              <input class="btn btn-primary" type="submit" value="<?php if($ccid1!=""){echo "Update";}else echo "Create"; ?>" >
              <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}
//Competencies Dimension
if ( $_POST[ 'action' ] == "showaddcd" ) {

  if ( $cdid1 != "" ) {
    $sql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_ID = '" . $cdid1 . "'";
    $result = mysqli_query( $conn, $sql );
    if ( mysqli_num_rows( $result ) > 0 ) {
      $row = mysqli_fetch_array( $result );
    }
  }
  ?>
<div class="container-fluid px-1 py-3 mx-auto">
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
      <h3><strong>
        <?php if($cdid1 !=""){ ?>
        Edit Competencies Dimension
        <?php }else  {?>
        Create Competencies Dimension
        <?php } ?>
        </strong></h3>
      <div class="card">
        <?php if($cdid1 !=""){?>
        <input class="btn btn-primary col-2" type="submit" name="btnback" value="Back" onClick="location='competencies_searchcd.php'">
        <?php
        }
        ?>
        <h5 class="text-center mb-4"></h5>
        <form class="form-card" id="acd" onSubmit="event.preventDefault(); <?php if($cdid1!=""){echo "btneditcdf(".$cdid1.")";}else echo "btnaddcdf()"; ?>">
          <div class="row justify-content-center text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
              <label class="form-control-label px-3">Core Competency</label>
              <div class="col-md-12">
                <select class="custom-select form-control" id="Position" name="selccid">
                  <?php
                  $catesql = "SELECT * FROM t_memc_kpcc_corecompetencies";
                  $view = mysqli_query( $conn, $catesql );
                  if ( mysqli_num_rows( $view ) > 0 ) {
                    for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
                      $row2 = mysqli_fetch_array( $view );
                      if ( $cdid1 != "" && $row[ 'Cd_Cc_ID' ] == $row2[ 'Cc_ID' ] ) {
                        echo "<option selected=\"selected\" value=\"" . $row2[ 'Cc_ID' ] . "\">" . $row2[ 'Cc_name' ] . "</option>";
                      } else {
                        echo "<option value=\"" . $row2[ 'Cc_ID' ] . "\">" . $row2[ 'Cc_name' ] . "</option>";
                      }
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row justify-content-center text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
              <label class="form-control-label px-3">Competencies Dimension Name</label>
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Enter Competencies Dimension" name="txtname" value="<?php if($cdid1 !="")echo $row['Cd_Name']; ?>" required="required" data-error="Please, leave a name.">
              </div>
            </div>
          </div>
          <div class="row justify-content-center text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
              <label class="form-control-label px-3">Competencies Dimension Definition</label>
              <div class="col-md-12">
                <textarea id="form_message" name="txtdes" class="form-control" placeholder="Describe here" rows="3" ><?php if($cdid1 !="")echo $row['Cd_Definition']; ?>
</textarea>
              </div>
            </div>
          </div>
          <div class="row justify-content-center text-left">
            <div class="form-group col-sm-6 flex-column d-flex">
              <label class="form-control-label px-3">Status</label>
              <div class="col-md-12">
                <select class="custom-select form-control col-5" name="selstatus">
                  <?php
                  if ( $cdid1 != "" ) {
                    if ( $row[ 'Cd_status' ] == "A" ) {
                      echo "<option selected=\"selected\" value=\"" . $row[ 'Cc_status' ] . "\">Active</option>";
                      echo "<option value=\"I\">Inactive</option>";
                    } else {
                      echo "<option selected=\"selected\" value=\"" . $row[ 'Cc_status' ] . "\">Inactive</option>";
                      echo "<option value=\"A\">Active</option>";
                    }
                  } else {


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
              <input class="btn btn-primary" type="submit" value="<?php if($cdid1!=""){echo "Update";}else echo "Create"; ?>">
              <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php


}
//Items
if ( $_POST[ 'action' ] == "showadditem" ) {
  if ( $itemid1 != "" ) {
    $sql = "SELECT * FROM t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_items.Im_Cd_ID = t_memc_kpcc_competenciesdimension.Cd_ID AND t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Im_ID = '" . $itemid1 . "'";
    $result = mysqli_query( $conn, $sql );
    if ( mysqli_num_rows( $result ) > 0 ) {
      $row = mysqli_fetch_array( $result );
	$itemdesarray = array();
	  $catesql = "SELECT * FROM t_memc_kpcc_items_lvl_desc WHERE Im_lvl_Im_ID = ".$itemid1."";
	  $view = mysqli_query( $conn, $catesql );
	  if ( mysqli_num_rows( $view ) > 0 ) {
		for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
		  $row2 = mysqli_fetch_array( $view );
			array_push($itemdesarray,$row2['Im_lvl_Description']);
		}
	  }
    }
  }
  ?>
<div class="container px-1 py-3 mx-auto" id="show_edititem">
<div class="row d-flex justify-content-center">
  <div class="col-12">
    <h3><strong><center>
        <?php if($itemid1 !=""){ ?>
        Edit Items
        <?php }else  {?>
        Create Items
        <?php } ?>
        </center></strong></h3>
    <div class="card">
      <form class="form-card" id="aitem" style="margin: 10px" onSubmit="event.preventDefault(); <?php if($itemid1!=""){echo "btnedititemf(".$itemid1.")";}else echo "btnadditemf()"; ?>">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Core Competencies</label>
            <select class="custom-select form-control"  required="required" onChange="changecd(this)">
				
              <?php
				$first;
				$selected;
              $catesql = "SELECT * FROM t_memc_kpcc_corecompetencies";
              $view = mysqli_query( $conn, $catesql );
              if ( mysqli_num_rows( $view ) > 0 ) {
                for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
                  $row2 = mysqli_fetch_array( $view );
					if($i==0) $first = $row2[ 'Cc_ID' ];
                  if ( $itemid1 != "" && $row[ 'Cd_Cc_ID' ] == $row2[ 'Cc_ID' ] ) {
                    echo "<option selected=\"selected\" value=\"" . $row2[ 'Cc_ID' ] . "\">" . $row2[ 'Cc_name' ] . "</option>";
					  $selected = $row2[ 'Cc_ID' ];
                  } else {
                    echo "<option value=\"" . $row2[ 'Cc_ID' ] . "\">" . $row2[ 'Cc_name' ] . "</option>";
                  }
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Competencies Dimension</label>
            <div id="show_additemcd">
              <select class="custom-select form-control" id="Position" name="selcdid">
				    <?php
				  if ( $itemid1 != "" ){
				  $catesql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_Cc_ID = " . $selected . "";}
				  else {$catesql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_Cc_ID = " . $first . " AND Cd_status = 'A'";}
				  $view = mysqli_query( $conn, $catesql );
				  if ( mysqli_num_rows( $view ) > 0 ) {
					for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
					  $row2 = mysqli_fetch_array( $view );
					  if ( $itemid1 != "" && $row[ 'Im_Cd_ID' ] == $row2[ 'Cd_ID' ] ) {
						echo "<option selected=\"selected\" value=\"" . $row2[ 'Cd_ID' ] . "\">" . $row2[ 'Cd_Name' ] . "</option>";
					  } else {
						echo "<option value=\"" . $row2[ 'Cd_ID' ] . "\">" . $row2[ 'Cd_Name' ] . "</option>";
					  }
					}
				  } else {
					echo "<option value=\"\">No data</option>";
				  }
				  ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-row ">
          <div class="form-group col-md-6">
            <label for="inputAddress" >Item Name</label>
              <textarea id="form_message" name="txtname" class="form-control" placeholder="Write the name here." rows="4" required="required" data-error="Please, leave a Definition."><?php if($itemid1 != "")echo $row['Im_Name']; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label >Definition</label>
              <textarea id="form_message" name="txtdef" class="form-control" placeholder="Write the Definition here." rows="4" data-error="Please, leave a Definition."><?php if($itemid1 != "")echo $row['Im_Definition']; ?></textarea>
          </div>
        </div>
		 <hr class="bdr-light">
		<div class="form-group">
		  <h3 class="text-center mb-4"><strong>各等级行为描述 Each Level Behavioral Description</strong></h3>
		  </div>
		 <div class="form-row ">
          <div class="form-group col-md-4">
            <label ><strong style="font-size: 30px">5</strong>（引领/战略）Lead / Strategiest</label>
              <textarea id="form_message" name="txtdef5" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[4]; ?></textarea>
          </div>
          <div class="form-group col-md-4">
            <label ><strong style="font-size: 30px">4</strong>（统筹/专家）Coordinate / Professional</label>
              <textarea id="form_message" name="txtdef4" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[3]; ?></textarea>
          </div>
			 <div class="form-group col-md-4">
            <label ><strong style="font-size: 30px">3</strong>（指导/中级）Direct / Intermediate</label>
              <textarea id="form_message" name="txtdef3" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[2]; ?></textarea>
          </div>
        </div>
		  
		  <div class="form-row justify-content-center">
		  <div class="form-group col-md-4">
            <label><strong style="font-size: 30px">2</strong>（独立/熟练）Independent / Experienced</label>
              <textarea id="form_message" name="txtdef2" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[1]; ?></textarea>
          </div>
          <div class="form-group col-md-4">
            <label ><strong style="font-size: 30px">1</strong>（辅助/初级）Assist / Novice</label>
              <textarea id="form_message" name="txtdef1" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[0]; ?></textarea>
          </div>
		  </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-md-3">
            <label for="inputState">Status</label>
                <select class="custom-select form-control" name="selstatus">
                  <?php
                  if ( $itemid1 != "" ) {
                    if ( $row[ 'Im_Status' ] == "A" ) {
                      echo "<option selected=\"selected\" value=\"" . $row[ 'Im_Status' ] . "\">Active</option>";
                      echo "<option value=\"I\">Inactive</option>";
                    } else {
                      echo "<option selected=\"selected\" value=\"" . $row[ 'Im_Status' ] . "\">Inactive</option>";
                      echo "<option value=\"A\">Active</option>";
                    }
                  } else {


                    ?>
                  <option value="A">Active</option>
                  <option value="I">Inactive</option>
                  <?php
                  }
                  ?>
                </select>
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group">
            <input class="btn btn-primary" type="submit" value="<?php if($itemid1!=""){echo "Update";}else echo "Create"; ?>">
              <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
}
if ( $_POST[ 'action' ] == "showadditemcd" ) {
  ?>
<select class="custom-select form-control" id="Position" required="required" name="selcdid">
  <?php
  $catesql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_Cc_ID = " . $_POST[ 'value1' ] . " AND Cd_status = 'A'";
  $view = mysqli_query( $conn, $catesql );
  if ( mysqli_num_rows( $view ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
      $row2 = mysqli_fetch_array( $view );
      if ( $itemid1 != "" && $row[ 'Im_Cd_ID' ] == $row2[ 'Cd_ID' ] ) {
        echo "<option selected=\"selected\" value=\"" . $row2[ 'Cd_ID' ] . "\">" . $row2[ 'Cd_name' ] . "</option>";
      } else {
        echo "<option value=\"" . $row2[ 'Cd_ID' ] . "\">" . $row2[ 'Cd_Name' ] . "</option>";
      }
    }
  } else {
    echo "<option value=\"\">No data</option>";
  }
  ?>
</select>
<?php

}
?>
