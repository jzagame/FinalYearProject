<?php
session_start();
error_reporting( 0 );
include( "../../includes/database.php" );
include( "../includes/MenuBar.php" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
td, th {
    max-width: 200px;
	word-wrap: break-word;
}
.table-responsive {
    max-height:500px;
}
thead tr:nth-child(1) th{
    background: white;
    position: sticky;
    top: 0;
    z-index: 10;
  }
</style>
</head>

<body>
<div class="container-fluid" id="show_edititem">
  <div class="row">
    <div class="col-12">
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item active">
          <h5 class="m-0"> View/Edit Items </h5>
        </li>
      </ul>
    </div>
  </div>
  <hr class="bdr-light">
  <form class="form-card" id="sitem" style="margin: 10px">
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress">Core Competencies</label>
      </div>
      <div class="col-10">
        <input type="text" class="form-control" placeholder="Enter Core Competencies Name" name="txtsccname">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress">Competencies Dimension</label>
      </div>
      <div class="col-10">
        <input type="text" class="form-control" placeholder="Enter Competencies Dimension Name" name="txtscdname">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress">Item Name</label>
      </div>
      <div class="col-10">
        <input type="text" class="form-control" placeholder="Enter Competencies Dimension Name" name="txtsitemname">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2">
        <label for="inputState">Status</label>
      </div>
      <div class="col-10">
        <select name="selstatus" class="form-control custom-select">
          <option value="">Both</option>
          <option value="1">Active</option>
          <option value="2">Inactive</option>
        </select>
      </div>
    </div>
    <div class="form-group row ">
      <div class="col-12" style="text-align: center;">
        <input class="btn btn-primary" type="submit" id="btnitemsearch" name="btnsearch" value="Search">
        <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
      </div>
    </div>
  </form>
  <div class="table-responsive" id="show_searchitem">
    <?php
    $sql = "SELECT * FROM t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_items.Im_Cd_ID = t_memc_kpcc_competenciesdimension.Cd_ID AND t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Im_ID IS NOT NULL AND "; //Search Items
    $sql .= "ORDER BY Im_ID";
    $sql = str_replace( "AND ORDER", "ORDER", $sql );
    $view = mysqli_query( $conn, $sql );
    if ( mysqli_num_rows( $view ) > 0 ) {
      ?>
    <table class="table table-bordered table-hover table-sm" style="margin-top:15px;" >
      <thead>
        <tr>
          <th nowrap>ID</th>
          <th nowrap>Core Competency</th>
          <th nowrap>Competencies Dimension</th>
          <th nowrap>Item Name</th>
          <th nowrap width="160px">Definition</th>
          <th nowrap width="160px">Lv 5 Definition</th>
          <th nowrap width="160px">Lv 4 Definition</th>
          <th nowrap width="160px">Lv 3 Definition</th>
          <th nowrap width="160px">Lv 2 Definition</th>
          <th nowrap width="160px">Lv 1 Definition</th>
          <th nowrap>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
          $row = mysqli_fetch_array( $view );
          echo "<tr role=\"button\" onClick=\"sendedititem('" . $row[ 'Im_ID' ] . "')\">";
          echo "<td>" . $row[ 'Im_ID' ] . "</td>";
          echo "<td>" . $row[ 'Cc_name' ] . "</td>";
          echo "<td>" . $row[ 'Cd_Name' ] . "</td>";
          echo "<td>" . $row[ 'Im_Name' ] . "</td>";
          echo "<td>" . $row[ 'Im_Definition' ] . "</td>";

          $catesql = "SELECT * FROM t_memc_kpcc_items_lvl_desc WHERE Im_lvl_Im_ID = " . $row[ 'Im_ID' ] . " ORDER BY Im_lvl_ID DESC";
          $view2 = mysqli_query( $conn, $catesql );
          if ( mysqli_num_rows( $view2 ) > 0 ) {
            for ( $x = 0; $x < mysqli_num_rows( $view2 ); ++$x ) {
              $row2 = mysqli_fetch_array( $view2 );
              echo "<td>" . $row2[ 'Im_lvl_Description' ] . "</td>";
            }
          }
          if ( $row[ 'Im_Status' ] == "1" ) {
            echo "<td>Active</td>";
          } else {
            echo "<td>Inactive</td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <?php
    }
    ?>
  </div>
</div>
</body>
<script src="../../includes/assest/library/datatables.net/JS/Ajax.js"></script>
</html>