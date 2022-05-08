<?php
session_start();
error_reporting( 0 );
include( "../../includes/database.php" );
include( "../includes/MenuBar.php" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
<div class="container-fluid" id="show_editcd">
  <div class="row">
    <div class="col-12">
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item active">
          <h5 class="m-0"> View/Edit Competencies Dimension </h5>
        </li>
      </ul>
    </div>
  </div>
  <hr class="bdr-light">
  <form class="form-card" id="scd" style="margin: 10px">
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress">Core Competency Name</label>
      </div>
      <div class="col-10">
        <input type="text" class="form-control" placeholder="Enter Core Competency Name" name="txtsmname">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2">
        <label for="inputAddress">Competencies Dimension Name</label>
      </div>
      <div class="col-10">
        <input type="text" class="form-control" placeholder="Enter Competencies Dimension Name" name="txtscname">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2">
        <label for="inputState">Status</label>
      </div>
      <div class="col-10">
        <select name="selstatus" class="form-control">
          <option value="">Both</option>
          <option value="A">Active</option>
          <option value="I">Inactive</option>
        </select>
      </div>
    </div>
    <div class="form-group row ">
      <div class="col-12" style="text-align: center;">
        <input class="btn btn-primary" type="submit" id="btncdsearch" name="btnsearch" value="Search">
        <input type="reset" class="btn btn-primary" name="btnclear" value="Clear">
      </div>
    </div>
  </form>
  <div id="show_searchcd">
    <?php
    $sql = "SELECT * FROM t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Cd_ID IS NOT NULL AND "; //Search Core competencies
    $sql .= "ORDER BY Cd_ID";
    $sql = str_replace( "AND ORDER", "ORDER", $sql );
    $view = mysqli_query( $conn, $sql );
    if ( mysqli_num_rows( $view ) > 0 ) {
      ?>
    <table class="table table-bordered table-hover" style="margin-top:15px">
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
        for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
          $row = mysqli_fetch_array( $view );
          echo "<tr role=\"button\" onClick=\"sendeditcd('" . $row[ 'Cd_ID' ] . "')\">";
          echo "<td>" . $row[ 'Cd_ID' ] . "</td>";
          echo "<td>" . $row[ 'Cc_name' ] . "</td>";
          echo "<td>" . $row[ 'Cd_Name' ] . "</td>";
          echo "<td>" . $row[ 'Cd_Definition' ] . "</td>";
          if ( $row[ 'Cd_status' ] == "A" ) {
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