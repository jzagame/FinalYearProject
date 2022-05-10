<?php
ini_set( 'auto_detect_line_endings', TRUE );
error_reporting( 0 );
include( "../../includes/database.php" );
$formdata = $_POST[ 'formdata' ];
$xx = 0;
$c = 0;
$totalcolumn = 0;
$totalrow = 0;
$success = 0;
$same = 0;
$updatedone =0;
//Core Competecies
if ( $_POST[ 'action' ] == "createcc" ) {

  $sql2 = "SELECT * FROM t_memc_kpcc_corecompetencies";
  $result2 = mysqli_query( $conn, $sql2 );
  if ( mysqli_num_rows( $result2 ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
      $row2 = mysqli_fetch_array( $result2 );
      if ( $formdata[ 0 ][ 'value' ] == $row2[ 'Cc_name' ] ) {
        $xx = 1;
      }
    }
  }
  if ( $xx == 1 ) {
    echo "same";
  } else {
    $addcc = "INSERT INTO t_memc_kpcc_corecompetencies (Cc_name,Cc_status) VALUES('" . trim( $formdata[ 0 ][ 'value' ] ) . "',
			'" . trim( $formdata[ 1 ][ 'value' ] ) . "'
			)";
    $addccsql = mysqli_query( $conn, $addcc );
    if ( $addccsql ) {

      echo "success";
    } else {
      echo "fail";
    }
  }

}


if ( $_POST[ 'action' ] == "editcc" ) {

  $sql2 = "SELECT * FROM t_memc_kpcc_corecompetencies";
  $result2 = mysqli_query( $conn, $sql2 );
  if ( mysqli_num_rows( $result2 ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
      $row2 = mysqli_fetch_array( $result2 );
      if ( $formdata[ 0 ][ 'value' ] == $row2[ 'Cc_name' ] && $formdata[ 1 ][ 'value' ] == $row2[ 'Cc_status' ] ) {
        $xx = 1;
      }
    }
  }
  if ( $xx == 1 ) {
    echo "same";
  } else {
    $uppmc = "UPDATE t_memc_kpcc_corecompetencies SET Cc_name='" . trim( $formdata[ 0 ][ 'value' ] ) . "',
		Cc_status='" . trim( $formdata[ 1 ][ 'value' ] ) . "' WHERE Cc_ID ='" . trim( $_POST[ 'ccidd' ] ) . "'";
    if ( mysqli_query( $conn, $uppmc ) ) {

      echo "updated";
    } else {
      echo "fail";
    }
  }
}

if ( $_POST[ 'action' ] == "searchcc" ) {
  $sql = "SELECT * FROM t_memc_kpcc_corecompetencies WHERE Cc_ID IS NOT NULL AND "; //Search major competencies
  if ( trim( $formdata[ 0 ][ 'value' ] ) != "" ) {
    $sql .= "Cc_name LIKE '%" . trim( $formdata[ 0 ][ 'value' ] ) . "%' AND ";
  }
  if ( trim( $formdata[ 1 ][ 'value' ] ) != "" ) {
    $sql .= "Cc_status = '" . trim( $formdata[ 1 ][ 'value' ] ) . "' AND ";
  }
  $sql .= "ORDER BY Cc_ID";
  $sql = str_replace( "AND ORDER", "ORDER", $sql );
  $view = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $view ) > 0 ) {
    ?>
<table class="table table-hover table-bordered" style="margin-top:15px">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for ( $i = 0; $i < mysqli_num_rows( $view ); ++$i ) {
      $row = mysqli_fetch_array( $view );

      echo "<tr role=\"button\" onClick=\"sendeditcc('" . $row[ 'Cc_ID' ] . "')\">";

      echo "<td>" . ( $i + 1 ) . "</td>";
      echo "<td>" . $row[ 'Cc_name' ] . "</td>";
      if ( $row[ 'Cc_status' ] == "1" ) {
        echo "<td>Active</td>";
      } else {
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
} else {
  echo "nf";
}

}
//Competencies Dimension
if ( $_POST[ 'action' ] == "createcd" ) {
  $sql2 = "SELECT * FROM t_memc_kpcc_competenciesdimension";
  $result2 = mysqli_query( $conn, $sql2 );
  if ( mysqli_num_rows( $result2 ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
      $row2 = mysqli_fetch_array( $result2 );
      if ( $formdata[ 1 ][ 'value' ] == $row2[ 'Cd_Name' ] && $formdata[ 0 ][ 'value' ] == $row2[ 'Cd_Cc_ID' ] ) {
        $xx = 1;
      }
    }
  }
  if ( $xx == 1 ) {
    echo "same";
  } else {
    $formdata2 = str_replace( "'", "\'", $formdata[ 2 ][ 'value' ] );
    $addcd = "INSERT INTO t_memc_kpcc_competenciesdimension (Cd_Cc_ID,Cd_Name,Cd_Definition,Cd_status) VALUES('" . trim( $formdata[ 0 ][ 'value' ] ) . "',
			'" . trim( $formdata[ 1 ][ 'value' ] ) . "',
			'" . trim( $formdata2 ) . "',
			'" . trim( $formdata[ 3 ][ 'value' ] ) . "'
			)";

    $addcdsql = mysqli_query( $conn, $addcd );
    if ( $addcdsql ) {
      echo "success";
    } else {
      echo "fail";
    }
  }
}
if ( $_POST[ 'action' ] == "editcd" ) {

  $sql2 = "SELECT * FROM t_memc_kpcc_competenciesdimension";
  $result2 = mysqli_query( $conn, $sql2 );
  if ( mysqli_num_rows( $result2 ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
      $row2 = mysqli_fetch_array( $result2 );
      if ( $formdata[ 0 ][ 'value' ] == $row2[ 'Cd_Cc_ID' ] && $formdata[ 1 ][ 'value' ] == $row2[ 'Cd_Name' ] && $formdata[ 2 ][ 'value' ] == $row2[ 'Cd_Definition' ] && $formdata[ 3 ][ 'value' ] == $row2[ 'Cd_status' ] ) {
        $xx = 1;
      }
    }
  }
  if ( $xx == 1 ) {
    echo "same";
  } else {
    $formdata2 = str_replace( "'", "\'", $formdata[ 2 ][ 'value' ] );
    $uppcd = "UPDATE t_memc_kpcc_competenciesdimension SET Cd_Cc_ID ='" . trim( $formdata[ 0 ][ 'value' ] ) . "', 
		Cd_Name='" . trim( $formdata[ 1 ][ 'value' ] ) . "',	
		Cd_Definition ='" . trim( $formdata2 ) . "',
		Cd_status='" . trim( $formdata[ 3 ][ 'value' ] ) . "' WHERE Cd_ID ='" . trim( $_POST[ 'cdidd' ] ) . "'";
    if ( mysqli_query( $conn, $uppcd ) ) {

      echo "updated";
    } else {
      echo "fail";
    }
  }
}
if ( $_POST[ 'action' ] == "searchcd" ) {
  $sql = "SELECT * FROM t_memc_kpcc_competenciesdimension,t_memc_kpcc_corecompetencies WHERE t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Cd_ID IS NOT NULL AND "; //Search Core competencies
  if ( trim( $formdata[ 0 ][ 'value' ] ) != "" ) {
    $sql .= "Cc_name LIKE '%" . trim( $formdata[ 0 ][ 'value' ] ) . "%' AND ";
  }
  if ( trim( $formdata[ 1 ][ 'value' ] ) != "" ) {
    $sql .= "Cd_Name LIKE '%" . trim( $formdata[ 1 ][ 'value' ] ) . "%' AND ";
  }
  if ( trim( $formdata[ 2 ][ 'value' ] ) != "" ) {
    $sql .= "Cd_status = '" . trim( $formdata[ 2 ][ 'value' ] ) . "' AND ";
  }
  $sql .= "ORDER BY Cd_ID";
  $sql = str_replace( "AND ORDER", "ORDER", $sql );
  $view = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $view ) > 0 ) {
    ?>
<table class="table table-hover table-bordered" style="margin-top:15px">
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
      echo "<td>" . ( $i + 1 ) . "</td>";
      echo "<td>" . $row[ 'Cc_name' ] . "</td>";
      echo "<td>" . $row[ 'Cd_Name' ] . "</td>";
      echo "<td>" . $row[ 'Cd_Definition' ] . "</td>";
      if ( $row[ 'Cd_status' ] == "1" ) {
        echo "<td>Active</td>";
      } else {
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
} else {
  echo "nf";
}

}

if ( $_POST[ 'action' ] == "createitem" ) {
  $sql2 = "SELECT * FROM t_memc_kpcc_items";
  $result2 = mysqli_query( $conn, $sql2 );
  if ( mysqli_num_rows( $result2 ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
      $row2 = mysqli_fetch_array( $result2 );
      if ( $formdata[ 0 ][ 'value' ] == $row2[ 'Im_UID' ] ) {
        $xx = 1;
      }
    }
  }
  if ( $xx == 1 ) {
    echo "same";
  } else {
    $formdata8 = str_replace( "'", "\'", $formdata[ 8 ][ 'value' ] );
    $formdata7 = str_replace( "'", "\'", $formdata[ 7 ][ 'value' ] );
    $formdata6 = str_replace( "'", "\'", $formdata[ 6 ][ 'value' ] );
    $formdata5 = str_replace( "'", "\'", $formdata[ 5 ][ 'value' ] );
    $formdata4 = str_replace( "'", "\'", $formdata[ 4 ][ 'value' ] );
    $formdata3 = str_replace( "'", "\'", $formdata[ 3 ][ 'value' ] );

    $itemdes = array( $formdata8, $formdata7, $formdata6, $formdata5, $formdata4 );

    $additem = "INSERT INTO t_memc_kpcc_items (Im_Cd_ID,Im_UID,Im_Name,Im_Definition,Im_Status) VALUES('" . trim( $formdata[ 1 ][ 'value' ] ) . "',
			'" . trim( $formdata[ 0 ][ 'value' ] ) . "',
			'" . trim( $formdata[ 2 ][ 'value' ] ) . "',
			'" . trim( $formdata3 ) . "',
			'" . trim( $formdata[ 9 ][ 'value' ] ) . "'
			)";

    $additemsql = mysqli_query( $conn, $additem );
    $last_id = mysqli_insert_id( $conn );

    for ( $i = 0; $i < 5; ++$i ) {
      $additem2 = "INSERT INTO t_memc_kpcc_Items_lvl_desc (Im_lvl_Im_ID,Im_lvl_Name,Im_lvl_Description,Im_lvl_Status) VALUES('" . trim( $last_id ) . "',
				'level " . trim( ( $i + 1 ) ) . "',
				'" . trim( $itemdes[ $i ] ) . "',
				'" . trim( $formdata[ 9 ][ 'value' ] ) . "'
			)";
      $additemlvlsql = mysqli_query( $conn, $additem2 );
      if ( $additemlvlsql ) {
        ++$c;
      }
    }
    if ( $additemsql && $c == 5 ) {
      echo "success";
    } else {
      echo "fail";
    }
  }
}

if ( $_POST[ 'action' ] == "searchitem" ) {
  $sql = "SELECT * FROM t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension WHERE t_memc_kpcc_items.Im_Cd_ID = t_memc_kpcc_competenciesdimension.Cd_ID AND t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Im_ID IS NOT NULL AND "; //Search item
  if ( trim( $formdata[ 0 ][ 'value' ] ) != "" ) {
    $sql .= "Cc_name LIKE '%" . trim( $formdata[ 0 ][ 'value' ] ) . "%' AND ";
  }
  if ( trim( $formdata[ 1 ][ 'value' ] ) != "" ) {
    $sql .= "Cd_name LIKE '%" . trim( $formdata[ 1 ][ 'value' ] ) . "%' AND ";
  }
  if ( trim( $formdata[ 2 ][ 'value' ] ) != "" ) {
    $sql .= "Im_Name LIKE '%" . trim( $formdata[ 2 ][ 'value' ] ) . "%' AND ";
  }
  if ( trim( $formdata[ 3 ][ 'value' ] ) != "" ) {
    $sql .= "Im_status = '" . trim( $formdata[ 3 ][ 'value' ] ) . "' AND ";
  }
  $sql .= "ORDER BY Im_ID";
  $sql = str_replace( "AND ORDER", "ORDER", $sql );
  $view = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $view ) > 0 ) {
    ?>
<table class="table table-hover table-sm table-bordered" style="margin-top:15px">
  <thead>
    <tr>
      <th nowrap>ID</th>
      <th nowrap>Unique ID</th>
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
      echo "<td>" . ( $i + 1 ) . "</td>";
      echo "<td>" . $row[ 'Im_UID' ] . "</td>";
      echo "<td>" . $row[ 'Cc_name' ] . "</td>";
      echo "<td>" . $row[ 'Cd_Name' ] . "</td>";
      echo "<td>" . $row[ 'Im_Name' ] . "</td>";
      echo "<td>" . $row[ 'Im_Definition' ] . "</td>";
      $catesql = "SELECT * FROM t_memc_kpcc_items_lvl_desc WHERE Im_lvl_Im_ID = " . $row[ 'Im_ID' ] . "";
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
</div>
</div>
</div>
</div>
<?php
} else {
  echo "nf";
}

}

if ( $_POST[ 'action' ] == "edititem" ) {

  $sql2 = "SELECT * FROM t_memc_kpcc_items";
  $result2 = mysqli_query( $conn, $sql2 );
  if ( mysqli_num_rows( $result2 ) > 0 ) {
    for ( $i = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
      $row2 = mysqli_fetch_array( $result2 );
      if ( $formdata[ 0 ][ 'value' ] == $row2[ 'Im_UID' ] && $_POST[ 'itemidd' ] != $row2[ 'Im_ID' ] ) {
        $xx = 1;
      }
    }
  }
  if ( $xx == 1 ) {
    echo "same";
  } else {
    $formdata8 = str_replace( "'", "\'", $formdata[ 8 ][ 'value' ] );
    $formdata7 = str_replace( "'", "\'", $formdata[ 7 ][ 'value' ] );
    $formdata6 = str_replace( "'", "\'", $formdata[ 6 ][ 'value' ] );
    $formdata5 = str_replace( "'", "\'", $formdata[ 5 ][ 'value' ] );
    $formdata4 = str_replace( "'", "\'", $formdata[ 4 ][ 'value' ] );
    $formdata3 = str_replace( "'", "\'", $formdata[ 3 ][ 'value' ] );

    $itemdes = array( $formdata8, $formdata7, $formdata6, $formdata5, $formdata4 );

    $uppcd = "UPDATE t_memc_kpcc_items SET Im_UID ='" . trim( $formdata[ 0 ][ 'value' ] ) . "',
  Im_Cd_ID ='" . trim( $formdata[ 1 ][ 'value' ] ) . "', 
		Im_Name='" . trim( $formdata[ 2 ][ 'value' ] ) . "',	
		Im_Definition ='" . trim( $formdata3 ) . "',
		Im_status='" . trim( $formdata[ 9 ][ 'value' ] ) . "' WHERE Im_ID ='" . trim( $_POST[ 'itemidd' ] ) . "'";

    $lvlidarray = array();
    $getlvlid = "SELECT * FROM t_memc_kpcc_Items_lvl_desc WHERE Im_lvl_Im_ID = '" . trim( $_POST[ 'itemidd' ] ) . "'";
    $view2 = mysqli_query( $conn, $getlvlid );
    if ( mysqli_num_rows( $view2 ) > 0 ) {
      for ( $x = 0; $x < mysqli_num_rows( $view2 ); ++$x ) {
        $row2 = mysqli_fetch_array( $view2 );
        array_push( $lvlidarray, $row2[ 'Im_lvl_ID' ] );
      }
    }

    for ( $i = 0; $i < 5; ++$i ) {
      $uppitemlvl = "UPDATE t_memc_kpcc_Items_lvl_desc SET Im_lvl_Description = '" . trim( $itemdes[ $i ] ) . "',
			Im_lvl_Status = '" . trim( $formdata[ 8 ][ 'value' ] ) . "' WHERE Im_lvl_Im_ID = '" . trim( $_POST[ 'itemidd' ] ) . "' AND Im_lvl_ID = " . $lvlidarray[ $i ] . "";
      $additemlvlsql = mysqli_query( $conn, $uppitemlvl );
      if ( $additemlvlsql ) {
        ++$c;
      }
    }

    if ( mysqli_query( $conn, $uppcd ) && $c == 5 ) {

      echo "updated";
    } else {
      echo "fail";
    }
  }

}


if ( $_FILES[ "excelfile" ][ "name" ] != "" ) {

  $file = $_FILES[ "excelfile" ][ "tmp_name" ];
  $file_open = fopen( $file, "r" );
  fgets( $file_open );
  while ( ( $csv = fgetcsv( $file_open, 1000, "," ) ) !== false ) {
    $totalrow += 1;
    for ( $i = 0, $tempArray = []; $i < count( $csv ); ++$i ) {
      $tempArray[ $i ] = $csv[ $i ];
    }
    for ( $i = 0, $str = array(); $i < count( $tempArray ); ++$i ) {
      $tempstr = str_replace( "'", "\'", $tempArray[ $i ] );
      array_push( $str, $tempstr );
      if ( $totalrow == 1 )$totalcolumn += 1;
    }
    //Append
    if ( $totalcolumn == 10 && $_POST[ 'seltype' ] == "a" ) {

      $sql2 = "SELECT * FROM t_memc_kpcc_items";
      $result2 = mysqli_query( $conn, $sql2 );
      if ( mysqli_num_rows( $result2 ) > 0 ) {
        for ( $i = 0, $xx = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
          $row2 = mysqli_fetch_array( $result2 );
          if ( $str[ 0 ] == $row2[ 'Im_UID' ] ) {
            $xx = 1;
          }
        }
      }
      if ( $xx == 1 ) {
        $same += 1;
      } else {

        $addcc = "INSERT INTO t_memc_kpcc_corecompetencies (Cc_name,Cc_status) VALUES('" . $str[ 1 ] . "',
			'1')";
        $addccsql = mysqli_query( $conn, $addcc );
        if ( $addccsql ) {
          $success += 1;
        }
        $last_ccid = mysqli_insert_id( $conn );
        $addcd = "INSERT INTO t_memc_kpcc_competenciesdimension (Cd_Cc_ID,Cd_Name,Cd_Definition,Cd_status) VALUES('" . $last_ccid . "',
			'" . $str[ 2 ] . "','','1')";

        $addcdsql = mysqli_query( $conn, $addcd );
        if ( $addcdsql ) {
          $success += 1;
        }

        $last_cdid = mysqli_insert_id( $conn );
        $additem = "INSERT INTO t_memc_kpcc_items (Im_Cd_ID,Im_UID,Im_Name,Im_Definition,Im_Status) VALUES('" . $last_cdid . "',
	  '" . $str[ 0 ] . "',
			'" . $str[ 3 ] . "',
			'" . $str[ 4 ] . "',
			'1')";

        $additemsql = mysqli_query( $conn, $additem );
        $last_itemid = mysqli_insert_id( $conn );

        for ( $i = 0, $c = 0; $i < 5; ++$i ) {
          $additem2 = "INSERT INTO t_memc_kpcc_Items_lvl_desc (Im_lvl_Im_ID,Im_lvl_Name,Im_lvl_Description,Im_lvl_Status) VALUES('" . trim( $last_itemid ) . "',
				'level " . trim( ( $i + 1 ) ) . "',
				'" . trim( $str[ 5 + $i ] ) . "',
				'1'
			)";
          $additemlvlsql = mysqli_query( $conn, $additem2 );
          if ( $additemlvlsql ) {
            ++$c;
          }
        }
        if ( $additemsql && $c == 5 ) {
          $success += 1;
        }
      }
      //Override
    } elseif ( $totalcolumn == 10 && $_POST[ 'seltype' ] == "o" ) {
      $matchimid;
      $sql2 = "SELECT * FROM t_memc_kpcc_items";
      $result2 = mysqli_query( $conn, $sql2 );
      if ( mysqli_num_rows( $result2 ) > 0 ) {
        for ( $i = 0, $xx = 0; $i < mysqli_num_rows( $result2 ); ++$i ) {
          $row2 = mysqli_fetch_array( $result2 );
          if ( $str[ 0 ] == $row2[ 'Im_UID' ] ) {
            $xx = 1;
            $matchimid = $row2[ 'Im_ID' ];
          }
        }
      }
      if ( $xx == 1 ) {
        $same += 1;
        $uppcd = "UPDATE t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension,t_memc_kpcc_items SET	Im_Name='" . $str[ 3 ] . "',
			  Cc_name='" . $str[ 1 ] . "',
			  Cd_Name='" . $str[ 2 ] . "',
			  Im_Definition ='" . $str[ 4 ] . "' WHERE t_memc_kpcc_items.Im_Cd_ID = t_memc_kpcc_competenciesdimension.Cd_ID AND t_memc_kpcc_corecompetencies.Cc_ID = t_memc_kpcc_competenciesdimension.Cd_Cc_ID AND Im_ID ='" . $matchimid . "'";

        $lvlidarray = array();
        $getlvlid = "SELECT * FROM t_memc_kpcc_Items_lvl_desc WHERE Im_lvl_Im_ID = '" . $matchimid . "'";
        $view2 = mysqli_query( $conn, $getlvlid );
        if ( mysqli_num_rows( $view2 ) > 0 ) {
          for ( $x = 0; $x < mysqli_num_rows( $view2 ); ++$x ) {
            $row2 = mysqli_fetch_array( $view2 );
            array_push( $lvlidarray, $row2[ 'Im_lvl_ID' ] );
          }
        }

        for ( $i = 0,$c=0; $i < 5; ++$i ) {
          $uppitemlvl = "UPDATE t_memc_kpcc_Items_lvl_desc SET Im_lvl_Description = '" . trim( $str[ 5 + $i ] ) . "'
			 WHERE Im_lvl_Im_ID = '" . $matchimid . "' AND Im_lvl_ID = " . $lvlidarray[ $i ] . "";
          $additemlvlsql = mysqli_query( $conn, $uppitemlvl );
          if ( $additemlvlsql ) {
            ++$c;
          }
        }

        if ( mysqli_query( $conn, $uppcd ) && $c == 5 ) {

          $updatedone +=1;

        }
      } else {

        $addcc = "INSERT INTO t_memc_kpcc_corecompetencies (Cc_name,Cc_status) VALUES('" . $str[ 1 ] . "',
			'1')";
        $addccsql = mysqli_query( $conn, $addcc );
        if ( $addccsql ) {
          $success += 1;
        }
        $last_ccid = mysqli_insert_id( $conn );
        $addcd = "INSERT INTO t_memc_kpcc_competenciesdimension (Cd_Cc_ID,Cd_Name,Cd_Definition,Cd_status) VALUES('" . $last_ccid . "',
			'" . $str[ 2 ] . "','','1')";

        $addcdsql = mysqli_query( $conn, $addcd );
        if ( $addcdsql ) {
          $success += 1;
        }

        $last_cdid = mysqli_insert_id( $conn );
        $additem = "INSERT INTO t_memc_kpcc_items (Im_Cd_ID,Im_UID,Im_Name,Im_Definition,Im_Status) VALUES('" . $last_cdid . "',
	  '" . $str[ 0 ] . "',
			'" . $str[ 3 ] . "',
			'" . $str[ 4 ] . "',
			'1')";

        $additemsql = mysqli_query( $conn, $additem );
        $last_itemid = mysqli_insert_id( $conn );

        for ( $i = 0, $c = 0; $i < 5; ++$i ) {
          $additem2 = "INSERT INTO t_memc_kpcc_Items_lvl_desc (Im_lvl_Im_ID,Im_lvl_Name,Im_lvl_Description,Im_lvl_Status) VALUES('" . trim( $last_itemid ) . "',
				'level " . trim( ( $i + 1 ) ) . "',
				'" . trim( $str[ 5 + $i ] ) . "',
				'1'
			)";
          $additemlvlsql = mysqli_query( $conn, $additem2 );
          if ( $additemlvlsql ) {
            ++$c;
          }
        }
        if ( $additemsql && $c == 5 ) {
          $success += 1;
        }

      }

    }


  }
  if ( ( ( $totalrow - $same ) * 3 ) == $success && $totalcolumn == 10 && $_POST[ 'seltype' ] == "a" ) {
    echo "success".($success/3);
  } else if(( ( $totalrow - $same ) * 3 ) == $success && $totalcolumn == 10 && $_POST[ 'seltype' ] == "o" ){
	  echo "updated".$updatedone.",".($success/3);
  }
else {
    echo "fail";
  }


}

?>
