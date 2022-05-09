<?php
error_reporting( 0 );
include( "../../includes/database.php" );

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
<div class="row">
  <div class="col-12">
    <ul class="list-group mt-2 mb-2">
      <li class="list-group-item active">
        <h5 class="m-0">
          <?php if($ccid1 !=""){ ?>
          Edit Core Competecies
          <?php }else  {?>
          Create Core Competencies
          <?php } ?>
        </h5>
      </li>
    </ul>
  </div>
</div>
<hr class="bdr-light">
<form class="form-card" id="acc" onSubmit="event.preventDefault(); <?php if($ccid1!=""){echo "btneditccf(".$ccid1.")";}else echo "btnaddccf()"; ?>">
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Core Competency name</label>
    </div>
    <div class="col-10">
      <textarea id="form_message" name="txtname" class="form-control" placeholder="Write the name here." rows="3" required="required" data-error="Please, leave a name."><?php if($ccid1 != "")echo $row['Cc_name']; ?>
</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Status</label>
    </div>
    <div class="col-10">
      <select class="custom-select form-control col-5" id="Position" name="selstatus">
        <?php
        if ( $ccid1 != "" ) {
          if ( $row[ 'Cc_status' ] == "1" ) {
            echo "<option selected=\"selected\" value=\"1\">Active</option>";
            echo "<option value=\"2\">Inactive</option>";
          } else {
            echo "<option selected=\"selected\" value=\"2\">Inactive</option>";
            echo "<option value=\"1\">Active</option>";
          }
        } else {


          ?>
        <option value="1">Active</option>
        <option value="2">Inactive</option>
        <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row ">
    <div class="col-12" style="text-align: center;">
      <?php if($ccid1 !=""){?>
      <input class="btn btn-primary" type="button" name="btnback" value="Back" onClick="location='competencies_searchcore.php'">
      <?php
      }
      ?>
      <input class="btn btn-primary" type="submit" value="<?php if($ccid1!=""){echo "Update";}else echo "Create"; ?>" >
      <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
    </div>
  </div>
</form>
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
<div class="row">
  <div class="col-12">
    <ul class="list-group mt-2 mb-2">
      <li class="list-group-item active">
        <h5 class="m-0">
          <?php if($cdid1 !=""){ ?>
          Edit Competencies Dimension
          <?php }else  {?>
          Create Competencies Dimension
          <?php } ?>
        </h5>
      </li>
    </ul>
  </div>
</div>
<hr class="bdr-light">
<form class="form-card" id="acd" onSubmit="event.preventDefault(); <?php if($cdid1!=""){echo "btneditcdf(".$cdid1.")";}else echo "btnaddcdf()"; ?>">
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Core Competency</label>
    </div>
    <div class="col-10">
      <select class="custom-select form-control" id="Position" name="selccid">
        <?php
        if ( $cdid1 != "" ) {
          $catesql = "SELECT * FROM t_memc_kpcc_corecompetencies";
        } else {
          $catesql = "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_Status <> 'I'";
        }

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
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Competencies Dimension Name</label>
    </div>
    <div class="col-10">
      <input type="text" class="form-control" placeholder="Enter Competencies Dimension" name="txtname" value="<?php if($cdid1 !="")echo $row['Cd_Name']; ?>" required="required" data-error="Please, leave a name.">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Competencies Dimension Definition</label>
    </div>
    <div class="col-10">
      <textarea id="form_message" name="txtdes" class="form-control" placeholder="Describe here" rows="3" ><?php if($cdid1 !="")echo $row['Cd_Definition']; ?>
</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-2">
      <label class="form-control-label px-3">Status</label>
    </div>
    <div class="col-10">
      <select class="custom-select form-control col-5" name="selstatus">
        <?php
        if ( $cdid1 != "" ) {
          if ( $row[ 'Cd_status' ] == "1" ) {
            echo "<option selected=\"selected\" value=\"" . $row[ 'Cc_status' ] . "\">Active</option>";
            echo "<option value=\"2\">Inactive</option>";
          } else {
            echo "<option selected=\"selected\" value=\"" . $row[ 'Cc_status' ] . "\">Inactive</option>";
            echo "<option value=\"1\">Active</option>";
          }
        } else {


          ?>
        <option value="1">Active</option>
        <option value="2">Inactive</option>
        <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row ">
    <div class="col-12" style="text-align: center;">
      <?php if($cdid1 !=""){?>
      <input class="btn btn-primary" type="button" name="btnback" value="Back" onClick="location='competencies_searchcd.php'">
      <?php
      }
      ?>
      <input class="btn btn-primary" type="submit" value="<?php if($cdid1!=""){echo "Update";}else echo "Create"; ?>">
      <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
    </div>
  </div>
</form>
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
      $catesql = "SELECT * FROM t_memc_kpcc_items_lvl_desc WHERE Im_lvl_Im_ID = " . $itemid1 . "";
      $view = mysqli_query( $conn, $catesql );
      if ( mysqli_num_rows( $view ) > 0 ) {
        for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
          $row2 = mysqli_fetch_array( $view );
          array_push( $itemdesarray, $row2[ 'Im_lvl_Description' ] );
        }
      }
    }
  }
  ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item active">
          <h5 class="m-0">
            <?php if($itemid1 !=""){ ?>
            Edit Items
            <?php }else  {?>
            Create Items
            <?php } ?>
          </h5>
        </li>
      </ul>
    </div>
  </div>
  <hr class="bdr-light">
  <form class="form-card" id="aitem" style="margin: 10px" onSubmit="event.preventDefault(); <?php if($itemid1!=""){echo "btnedititemf(".$itemid1.")";}else echo "btnadditemf()"; ?>">
    <div class="form-group row">
      <div class="col-2">
        <label>Core Competencies</label>
      </div>
      <div class="col-4">
        <select class="custom-select form-control"  required="required" onChange="changecd(this)">
          <?php
          $first;
          $selected;
            $catesql = "SELECT * FROM t_memc_kpcc_corecompetencies";          
          $view = mysqli_query( $conn, $catesql );
          if ( mysqli_num_rows( $view ) > 0 ) {
            for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
              $row2 = mysqli_fetch_array( $view );
              if ( $i == 0 )$first = $row2[ 'Cc_ID' ];
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
      <div class="col-2">
        <label>Competencies Dimension</label>
      </div>
      <div class="col-4" id="show_additemcd">
        <select class="custom-select form-control" id="Position" name="selcdid">
          <?php
          if ( $itemid1 != "" ) {
            $catesql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_Cc_ID = " . $selected . "";
          } else {
            $catesql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_Cc_ID = " . $first . "";
          }
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
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress" >Item Name</label>
      </div>
      <div class="col-10">
        <textarea id="form_message" name="txtname" class="form-control" placeholder="Write the name here." rows="4" required="required" data-error="Please, leave a Definition."><?php if($itemid1 != "")echo $row['Im_Name']; ?>
</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2">
        <label >Definition</label>
      </div>
      <div class="col-10">
        <textarea id="form_message" name="txtdef" class="form-control" placeholder="Write the Definition here." rows="4" data-error="Please, leave a Definition."><?php if($itemid1 != "")echo $row['Im_Definition']; ?>
</textarea>
      </div>
    </div>
    <hr class="bdr-light">
    <div class="form-group">
      <div class="row">
        <div class="col-12">
          <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
              <h5 class="m-0"> 各等级行为描述 Each Level Behavioral Description </h5>
            </li>
          </ul>
        </div>
      </div>
      <hr class="bdr-light">
    </div>
    <div class="form-row ">
      <div class="form-group col-md-4">
        <label ><strong style="font-size: 30px">5</strong>（引领/战略）Lead / Strategiest</label>
        <textarea id="form_message" name="txtdef5" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[4]; ?>
</textarea>
      </div>
      <div class="form-group col-md-4">
        <label ><strong style="font-size: 30px">4</strong>（统筹/专家）Coordinate / Professional</label>
        <textarea id="form_message" name="txtdef4" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[3]; ?>
</textarea>
      </div>
      <div class="form-group col-md-4">
        <label ><strong style="font-size: 30px">3</strong>（指导/中级）Direct / Intermediate</label>
        <textarea id="form_message" name="txtdef3" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[2]; ?>
</textarea>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-md-4">
        <label><strong style="font-size: 30px">2</strong>（独立/熟练）Independent / Experienced</label>
        <textarea id="form_message" name="txtdef2" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[1]; ?>
</textarea>
      </div>
      <div class="form-group col-md-4">
        <label ><strong style="font-size: 30px">1</strong>（辅助/初级）Assist / Novice</label>
        <textarea id="form_message" name="txtdef1" class="form-control" placeholder="Write the Description here." rows="4"><?php if($itemid1 != "")echo $itemdesarray[0]; ?>
</textarea>
      </div>
    </div>
    <hr class="bdr-light">
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="inputState">Status</label>
        <select class="custom-select form-control" name="selstatus">
          <?php
          if ( $itemid1 != "" ) {
            if ( $row[ 'Im_Status' ] == "1" ) {
              echo "<option selected=\"selected\" value=\"" . $row[ 'Im_Status' ] . "\">Active</option>";
              echo "<option value=\"2\">Inactive</option>";
            } else {
              echo "<option selected=\"selected\" value=\"" . $row[ 'Im_Status' ] . "\">Inactive</option>";
              echo "<option value=\"1\">Active</option>";
            }
          } else {


            ?>
          <option value="1">Active</option>
          <option value="2">Inactive</option>
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
    $catesql = "SELECT * FROM t_memc_kpcc_competenciesdimension WHERE Cd_Cc_ID = " . $_POST[ 'value1' ] . "";

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
