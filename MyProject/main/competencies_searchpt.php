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
<div class="container-fluid" id="show_editpt">
  <div class="row">
    <div class="col-12">
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item active">
          <h5 class="m-0"> View/Edit plan type name </h5>
        </li>
      </ul>
    </div>
  </div>
  <hr class="bdr-light">
  <form class="form-card" id="spt" style="margin: 10px">
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress">plan type name Name</label>
      </div>
      <div class="col-10">
        <input type="text" class="form-control" placeholder="Enter Plan Type Name" name="txtsname">
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
        <input class="btn btn-primary" type="submit" id="btnptsearch" value="Search">
        <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
      </div>
    </div>
  </form>
  <div class="table-responsive" id="show_searchpt">
    <?php
    $sql = "SELECT * FROM t_memc_kpcc_plantype WHERE Pt_ID IS NOT NULL AND "; //Search major competencies
    $sql .= "ORDER BY Pt_ID";
    $sql = str_replace( "AND ORDER", "ORDER", $sql );
    $view = mysqli_query( $conn, $sql );
    if ( mysqli_num_rows( $view ) > 0 ) {
      ?>
    <table class="table table-hover table-bordered" style="margin-top:15px">
      <thead>
        <tr>
            <th  style="width:10px">Edit</th>
          <th>ID</th>
          <th>Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
          $row = mysqli_fetch_array( $view );
            echo "<tr>";
          echo "<td><input type=\"button\" class=\"btn btn-primary\" name=\"btnedit\" value=\"Edit\" onclick=\"sendeditpt('" . $row[ 'Pt_ID' ] . "')\"></td>";
          echo "<td>" . ( $i + 1 ) . "</td>";
          echo "<td>" . $row[ 'Pt_Name' ] . "</td>";
          if ( $row[ 'Pt_Status' ] == "1" ) {
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
<script src="../../includes/assest/library/datatables.net/JS/Competencies_Ajax.js"></script>
</html>