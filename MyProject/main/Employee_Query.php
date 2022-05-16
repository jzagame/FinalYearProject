<?php
error_reporting( 0 );
include( "../../includes/database.php" );
$formdata = $_POST[ 'formdata' ];
$flag = false;
//Add Access Right
if ( $_POST[ 'action' ] == "addAccessRight" ) {

	$SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = '" . trim( $formdata[ 0 ][ 'value' ] ) . "'";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( trim( $formdata[ 0 ][ 'value' ] ) == "" ) {
		echo "AR Null";
	} else if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "same";
	} else {
		$AddAccessRightSQL = "INSERT INTO t_memc_kpcc_access_right(AR_Level, AR_Description, AR_Status) VALUES(
                '" . trim( $formdata[ 0 ][ 'value' ] ) . "',
                '" . $formdata[ 1 ][ 'value' ] . "',
                '" . $formdata[ 2 ][ 'value' ] . "'
            )";
		$AddAccessRightResult = mysqli_query( $conn, $AddAccessRightSQL );
		if ( $AddAccessRightResult ) {
			echo "success";
		} else {
			echo "fail";
		}
	}
}

if ( $_POST[ 'action' ] == "addDepartment" ) {

	if ( strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) == "" || strtoupper( trim( $formdata[ 1 ][ 'value' ] ) ) == "" || strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) == "" ) {
		echo "fill";
	}
	else if( strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) == strtoupper( trim( $formdata[ 2 ][ 'value' ] ) )){
		echo "cannot";
	}
	else {
		$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_DID = '" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "' AND D_HODID ='" . strtoupper( trim( $formdata[ 1 ][ 'value' ] ) ) . "' AND D_DPID = '" . strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) . "'";
		//echo "I am in";
		$SearchResult = mysqli_query( $conn, $SearchSQL );
		if ( mysqli_num_rows( $SearchResult ) > 0 ) {
			echo "Department Link is Existed";
		} else {
			$SearchDepartmentSQL = "SELECT COUNT(D_ID) AS userFound FROM t_memc_kpcc_department";
			$Result = mysqli_query( $conn, $SearchDepartmentSQL );
			$row = mysqli_fetch_array( $Result );
			if ( $row[ 'userFound' ] == 0 ) {
				$AddDepartmentSQL = "INSERT INTO t_memc_kpcc_department(D_DID, D_HODID, D_DPID, D_Status) VALUES(
					'" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "',
					'" . strtoupper( trim( $formdata[ 1 ][ 'value' ] ) ) . "',
					'" . strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) . "',
					'1')";
			} else {
				$SID = "1" + $row[ 'userFound' ];
				$EmpID = "DEP-" . sprintf( '%04d', $SID );

				$AddDepartmentSQL = "INSERT INTO t_memc_kpcc_department(D_ID, D_DID, D_HODID, D_DPID, D_Status) VALUES(
					'$EmpID',
					'" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "',
					'" . strtoupper( trim( $formdata[ 1 ][ 'value' ] ) ) . "',
					'" . strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) . "',
					'1')";
			}
			$AddDepartmentResult = mysqli_query( $conn, $AddDepartmentSQL );
			if ( $AddDepartmentResult ) {
				echo "success";
			} else {
				echo "fail";
			}

		}
	}
}

//Search Access Right
if ( $_POST[ 'action' ] == "searchAccessRight" ) {
	$SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Description LIKE '%" . trim( $formdata[ 0 ][ 'value' ] ) . "%'
    AND AR_Status <> 0";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "<table class=\"table table-hover table-bordered\">";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope=\"col\">No.</th>";
		echo "<th scope=\"col\">Level</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Description</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Status</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ( $i = 0; $i < mysqli_num_rows( $SearchResult ); ++$i ) {
			$row = mysqli_fetch_array( $SearchResult );
			echo "<tr role=\"button\" onClick=\"editAccessRight('" . $row[ 'AR_ID' ] . "')\">";
			echo "<td>" . ( $i + 1 ) . "</td>";
			echo "<td>" . $row[ 'AR_Level' ] . "</td>";
			echo "<td>" . $row[ 'AR_Description' ] . "</td>";
			if ( $row[ 'AR_Status' ] == 1 ) {
				echo "<td>ACTIVE</td>";
			} else {
				echo "<td>INACTIVE</td>";
			}
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo "fail";
	}
}

//Edit Access Right
if ( $_POST[ 'action' ] == "editAccessRight" ) {
	$arid = $_POST[ 'accessright_ID' ];
	$SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_ID = $arid";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		$row = mysqli_fetch_array( $SearchResult );
		?>
		<div class="container-fluid">
			<form method="" id="UpdateAccessRightForm">
				<ul class="list-group mt-2 mb-2">
					<li class="list-group-item active">
						<h5 class="m-0">Edit Access Right</h5>
					</li>
				</ul>
				<hr class="bdr-light">
				<div class="container-fluid">
					<div class="form-group row">
						<div class="col-2">
							<label class="col-form-label">Access Right Level</label>
						</div>
						<div class="col-10">
							<input type="number" class="form-control" value="<?php echo $row['AR_Level'];?>" name="txtAccessRoghtLevel" min="0" step="1">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-2">
							<label class="col-form-label">Description</label>
						</div>
						<div class="col-10">
							<textarea class="form-control" name="txtAccessRightDescription" rows="4"><?php echo $row['AR_Description'];?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-2">
							<label class="col-form-label">Status</label>
						</div>
						<div class="col-10">
							<select class="form-control custom-select" name="txtARStatus">
								<option value="1" <?php echo ($row[ 'AR_Status']==1 ) ? "selected" : "" ; ?>>Active</option>
								<option value="2" <?php echo ($row[ 'AR_Status']==2 ) ? "selected" : "" ; ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
							<input type="button" class="btn btn-primary" name="btnBack" value="Back" onClick="location='Employee_ViewEditPosition.php'">
							<input type="button" class="btn btn-primary" name="btnUAccessRight" value="Update" onClick="UpdateAccessRight(<?php echo $row['AR_ID'];?>)">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
	}
}

//Update Access Right
if ( $_POST[ 'action' ] == 'updateAccessRight' ) {
	$arid = $_POST[ 'accessright_ID' ];
	$SearchSQL = "SELECT * FROM t_memc_kpcc_access_right WHERE AR_Level = '" . trim( $formdata[ 0 ][ 'value' ] ) . "' AND AR_ID != $arid";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( trim( $formdata[ 0 ][ 'value' ] ) == "" ) {
		echo "AR Null";
	} else if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "same";
	} else {
		$UpdateSQL = "UPDATE t_memc_kpcc_access_right SET AR_Level = '" . trim( $formdata[ 0 ][ 'value' ] ) . "',
            AR_Description = '" . ( trim( $formdata[ 1 ][ 'value' ] ) ) . "',
            AR_Status = '" . $formdata[ 2 ][ 'value' ] . "'
            WHERE AR_ID = $arid";
		$UpdateResult = mysqli_query( $conn, $UpdateSQL );
		if ( $UpdateResult ) {
			echo "success";
		} else {
			echo "fail";
		}
	}
}

//Search Add Employee
if ( $_POST[ 'action' ] == "searchEmployee" ) {
	$IsEmptyEmployeeDetailSQL = "SELECT * FROM t_memc_kpcc_employee_detail";
	$IsEmptyEmployeeDetailResult = mysqli_query( $conn, $IsEmptyEmployeeDetailSQL );
	if ( mysqli_num_rows( $IsEmptyEmployeeDetailResult ) <= 0 ) {
		$SearchSQL = "SELECT * FROM t_memc_staff, t_memc_department WHERE stf_name LIKE '%" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "%'
          AND t_memc_staff.stf_department_id = t_memc_department.dpt_id
          AND stf_user_status = 1";
	} else {
		$SearchSQL = "SELECT * FROM t_memc_staff, t_memc_department WHERE 
          stf_name LIKE '%" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "%'
          AND t_memc_staff.stf_department_id = t_memc_department.dpt_id 
          AND stf_employee_number NOT IN (SELECT Emp_ID FROM t_memc_kpcc_employee_detail WHERE EmpDetail_Status = 1)";
	}

	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "<table class=\"table table-hover table-bordered\">";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope=\"col\"></th>";
		echo "<th scope=\"col\">No.</th>";
		echo "<th scope=\"col\">Employee Number</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Employee Name</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Job Band</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ( $i = 0; $i < mysqli_num_rows( $SearchResult ); ++$i ) {
			$row = mysqli_fetch_array( $SearchResult );
			echo "<tr>";
			echo "<td><input type=\"checkbox\" value=\"" . $row[ 'stf_employee_number' ] . "\" name=\"txtEmployeePass[]\"></td>";
			echo "<td>" . ( $i + 1 ) . "</td>";
			echo "<td>" . $row[ 'stf_employee_number' ] . "</td>";
			echo "<td>" . $row[ 'stf_name' ] . "</td>";
			echo "<td>" . $row[ 'dpt_name' ] . "</td>";
			echo "<td>" . $row[ 'stf_grade' ] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo "fail";
	}
}

//Add Employee
if ( $_POST[ 'action' ] == "addEmployee" ) {
	$data = array();
	parse_str( $formdata, $data );
	if ( count( $data[ 'txtEmployeePass' ] ) <= 0 ) {
		echo "Nothing";
	} else {
		for ( $i = 0; $i < count( $data[ 'txtEmployeePass' ] ); $i++ ) {
			$CheckExistSQL = "SELECT * FROM t_memc_kpcc_employee_detail WHERE Emp_ID = '" . $data[ 'txtEmployeePass' ][ $i ] . "'";
			$CheckExistResult = mysqli_query( $conn, $CheckExistSQL );
			if ( mysqli_num_rows( $CheckExistResult ) > 0 ) {
				$UpdateSQL = "UPDATE t_memc_kpcc_employee_detail SET EmpDetail_Status = 1 WHERE Emp_ID = '" . $data[ 'txtEmployeePass' ][ $i ] . "'";
				$Result = mysqli_query( $conn, $UpdateSQL );
			} else {
				$GetInfoSQL = "SELECT * FROM t_memc_staff, t_memc_department WHERE stf_employee_number = '" . $data[ 'txtEmployeePass' ][ $i ] . "' 
                    AND stf_department_id = dpt_id";
				$GetInfoResult = mysqli_query( $conn, $GetInfoSQL );
				$getinforow = mysqli_fetch_array( $GetInfoResult );
				$InsertEmployeeSQL = "INSERT INTO t_memc_kpcc_employee_detail(EMP_D_ID, Emp_ID, Emp_Name, Emp_Department, Emp_JobBand, EmpDetail_Status, EmpAssign_Status) VALUES(
                    '" . $getinforow[ 'stf_department_id' ] . "',
                    '" . $getinforow[ 'stf_employee_number' ] . "',
                    '" . str_replace( "'", "\'", $getinforow[ 'stf_name' ] ) . "',
                    '" . $getinforow[ 'dpt_name' ] . "',
                    '" . $getinforow[ 'stf_grade' ] . "',
                    '1',
                    '2')";

				$Result = mysqli_query( $conn, $InsertEmployeeSQL );
			}
		}

		if ( $Result ) {
			echo "success";
		} else {
			echo "fail";
		}
	}
}

//Search Remove Employee
if ( $_POST[ 'action' ] == "searchRemoveEmployee" ) {
	$SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_staff, t_memc_department WHERE Emp_Name LIKE '%" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "%' 
        AND EmpDetail_Status = 1 AND stf_department_id = dpt_id AND Emp_ID = stf_employee_number";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "<table class=\"table table-hover table-bordered\">";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope=\"col\"></th>";
		echo "<th scope=\"col\">No.</th>";
		echo "<th scope=\"col\">Employee Number</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Employee Name</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Job Band</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ( $i = 0; $i < mysqli_num_rows( $SearchResult ); ++$i ) {
			$row = mysqli_fetch_array( $SearchResult );
			echo "<tr>";
			echo "<td><input type=\"checkbox\" value=\"" . $row[ 'EmpDetail_ID' ] . "\" name=\"txtEmployeePass[]\"></td>";
			echo "<td>" . ( $i + 1 ) . "</td>";
			echo "<td>" . $row[ 'stf_employee_number' ] . "</td>";
			echo "<td>" . $row[ 'Emp_Name' ] . "</td>";
			echo "<td>" . $row[ 'dpt_name' ] . "</td>";
			echo "<td>" . $row[ 'stf_grade' ] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo "fail";
	}
}

//Remove Employee
if ( $_POST[ 'action' ] == "removeEmployee" ) {
	$data = array();
	parse_str( $formdata, $data );
	if ( count( $data[ 'txtEmployeePass' ] ) <= 0 ) {
		echo "Nothing";
	} else {
		for ( $i = 0; $i < count( $data[ 'txtEmployeePass' ] ); $i++ ) {
			$UpdateEmployeeSQL = "UPDATE t_memc_kpcc_employee_detail SET EmpDetail_Status = 2 WHERE EmpDetail_ID = '" . $data[ 'txtEmployeePass' ][ $i ] . "'";
			$UpdateEmployeeResult = mysqli_query( $conn, $UpdateEmployeeSQL );
		}

		if ( $UpdateEmployeeResult ) {
			echo "success";
		} else {
			echo "fail";
		}
	}
}

//Seacrh Assign Position Employee
if ( $_POST[ 'action' ] == "searchAPEmployee" ) {
	$SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_staff, t_memc_department WHERE Emp_Name LIKE '%" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "%' 
        AND EmpDetail_Status = 1 
        AND EmpAssign_Status <> 1
        AND stf_employee_number = Emp_ID
        AND stf_department_id = dpt_id";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "<table class=\"table table-hover table-bordered\">";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope=\"col\"></th>";
		echo "<th scope=\"col\">No.</th>";
		echo "<th scope=\"col\">Employee Number</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Name</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Job Band</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ( $i = 0; $i < mysqli_num_rows( $SearchResult ); ++$i ) {
			$row = mysqli_fetch_array( $SearchResult );
			echo "<tr>";
			echo "<td><input type=\"checkbox\" value=\"" . $row[ 'stf_employee_number' ] . "\" name=\"chkEmployee[]\"></td>";
			echo "<td>" . ( $i + 1 ) . "</td>";
			echo "<td>" . $row[ 'stf_employee_number' ] . "</td>";
			echo "<td>" . $row[ 'stf_name' ] . "</td>";
			echo "<td>" . $row[ 'dpt_name' ] . "</td>";
			echo "<td>" . $row[ 'stf_grade' ] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo "fail";
	}
}

//Assign Position
if ( $_POST[ 'action' ] == "assignPosition" ) {
	$data = array();
	parse_str( $formdata, $data );
	$errorchecking = false;
	if ( count( $data[ 'chkEmployee' ] ) <= 0 ) {
		echo "No Employee";
	} else if ( $data[ 'txtAccessRight' ] == "" ) {
		echo "No AR";
	} else if ( $data[ 'txtReportingTo' ] == "" ) {
		echo "No RT";
	} else {
		for ( $i = 0; $i < count( $data[ 'chkEmployee' ] ); $i++ ) {
			if ( $data[ 'txtReportingTo' ] == $data[ 'chkEmployee' ][ $i ] ) {
				$errorchecking = true;
				break;
			}
		}

		if ( $errorchecking == false ) {
			for ( $i = 0; $i < count( $data[ 'chkEmployee' ] ); $i++ ) {
				$AssignPositionSQL = "INSERT INTO t_memc_kpcc_report_to(RT_Emp_ID, Report_To_Emp_ID) VALUES(
                        '" . $data[ 'chkEmployee' ][ $i ] . "',
                        '" . $data[ 'txtReportingTo' ] . "'
                        )";
				$AssignPositionResult = mysqli_query( $conn, $AssignPositionSQL );

				$UpdateAPSQL = "UPDATE t_memc_kpcc_employee_detail SET Emp_P_ID = '" . $data[ 'txtAccessRight' ] . "',
                    EmpAssign_Status = 1
                    WHERE Emp_ID = '" . $data[ 'chkEmployee' ][ $i ] . "'";
				$UpdateAPResult = mysqli_query( $conn, $UpdateAPSQL );
			}

			if ( $AssignPositionResult && $UpdateAPResult ) {
				echo "success";
			} else {
				echo "fail";
			}
		} else {
			echo "Same ID";
		}
	}

}

//Seacrh View/Edit Assign Position
if ( $_POST[ 'action' ] == "searchVEPEmployee" ) {
	$SearchSQL = "SELECT * FROM t_memc_kpcc_employee_detail, t_memc_kpcc_access_right, t_memc_kpcc_report_to, t_memc_staff, t_memc_department 
        WHERE Emp_Name LIKE '%" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "%' 
        AND EmpDetail_Status = 1 AND EmpAssign_Status = 1
        AND t_memc_kpcc_employee_detail.Emp_P_ID = t_memc_kpcc_access_right.AR_ID
        AND t_memc_kpcc_employee_detail.Emp_ID = t_memc_kpcc_report_to.RT_Emp_ID
        AND stf_employee_number = Emp_ID
        AND stf_department_id = dpt_id";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "<table class=\"table table-hover table-bordered\">";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope=\"col\"></th>";
		echo "<th scope=\"col\">No.</th>";
		echo "<th scope=\"col\">Employee Number</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Name</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Department</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Job Band</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Access Right</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Reporting-To</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ( $i = 0; $i < mysqli_num_rows( $SearchResult ); ++$i ) {
			$row = mysqli_fetch_array( $SearchResult );
			$SearchReportToNameSQL = "SELECT Emp_Name FROM t_memc_kpcc_employee_detail 
                        WHERE Emp_ID = '" . $row[ 'Report_To_Emp_ID' ] . "'";
			$SearchReportToNameResult = mysqli_query( $conn, $SearchReportToNameSQL );
			$fetchrow = mysqli_fetch_array( $SearchReportToNameResult );
			echo "<tr>";
			echo "<td><input type=\"checkbox\" value=\"" . $row[ 'EmpDetail_ID' ] . "\" name=\"chkEmployee[]\"></td>";
			echo "<td>" . ( $i + 1 ) . "</td>";
			echo "<td>" . $row[ 'Emp_ID' ] . "</td>";
			echo "<td>" . $row[ 'Emp_Name' ] . "</td>";
			echo "<td>" . $row[ 'dpt_name' ] . "</td>";
			echo "<td>" . $row[ 'stf_grade' ] . "</td>";
			echo "<td>" . "[" . $row[ 'AR_Level' ] . "] " . $row[ 'AR_Description' ] . "</td>";
			echo "<td>" . "[" . $row[ 'Report_To_Emp_ID' ] . "] " . $fetchrow[ 'Emp_Name' ] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo "fail";
	}
}

//Update Position
if ( $_POST[ 'action' ] == "updatePosition" ) {
	$data = array();
	parse_str( $formdata, $data );
	$errorchecking = false;

	if ( count( $data[ 'chkEmployee' ] ) <= 0 ) {
		echo "No Employee";
	} else if ( $data[ 'txtAccessRight' ] == "" ) {
		echo "No AR";
	} else if ( $data[ 'txtReportingTo' ] == "" ) {
		echo "No RT";
	} else {
		for ( $i = 0; $i < count( $data[ 'chkEmployee' ] ); $i++ ) {
			if ( $data[ 'txtReportingTo' ] == $data[ 'chkEmployee' ][ $i ] ) {
				$errorchecking = true;
				break;
			}
		}

		if ( $errorchecking == false ) {
			for ( $i = 0; $i < count( $data[ 'chkEmployee' ] ); $i++ ) {
				$UpdateAccessRightSQL = "UPDATE t_memc_kpcc_employee_detail SET Emp_P_ID = '" . $data[ 'txtAccessRight' ] . "'
                    WHERE Emp_ID = '" . $data[ 'chkEmployee' ][ $i ] . "'";
				$UpdateAccessRightResult = mysqli_query( $conn, $UpdateAccessRightSQL );

				$UpdateReportToSQL = "UPDATE t_memc_kpcc_report_to SET Report_To_Emp_ID = '" . $data[ 'txtReportingTo' ] . "'
                    WHERE RT_Emp_ID = '" . $data[ 'chkEmployee' ][ $i ] . "'";
				$UpdateReportToResult = mysqli_query( $conn, $UpdateReportToSQL );
			}

			if ( $UpdateAccessRightResult && $UpdateReportToResult ) {
				echo "success";
			} else {
				echo "fail";
			}
		} else {
			echo "Same ID";
		}
	}
}

if ( $_POST[ 'action' ] == "searchDepartment" ) {
	$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_Name LIKE '%" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "%'";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		echo "<table class=\"table table-hover table-bordered\">";
		echo "<thead";
		echo "<tr>";
		echo "<th scope=\"col\">No.</th>";
		echo "<th scope=\"col\">Department Name</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Department HOD Name</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Parent Department</th>";
		echo "<th scope=\"col\" style=\"vertical-align:middle\">Status</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ( $i = 0; $i < mysqli_num_rows( $SearchResult ); ++$i ) {
			$row = mysqli_fetch_array( $SearchResult );
			echo "<tr role=\"button\" onClick=\"editDepartment('" . $row[ 'D_ID' ] . "')\">";
			echo "<td>" . $row[ 'D_ID' ] . "</td>";
			echo "<td>" . $row[ 'D_Name' ] . "</td>";
			echo "<td>" . $row[ 'D_HODID' ] . "</td>";
			echo "<td>" . $row[ 'D_HODNode' ] . "</td>";
			echo "<td>" . $row[ 'D_Status' ] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo "fail";
	}
}

if ( $_POST[ 'action' ] == "editDepartment" ) {
	$did = $_POST[ 'D_ID' ];
	$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
	$SearchResult = mysqli_query( $conn, $SearchSQL );
	if ( mysqli_num_rows( $SearchResult ) > 0 ) {
		$row = mysqli_fetch_array( $SearchResult );
		?>
		<div class="container-fluid">
			<form method="" id="UpdateDepartmentForm">
				<ul class="list-group mt-2 mb-2">
					<li class="list-group-item active">
						<h5 class="m-0">Edit Department</h5>
					</li>
				</ul>
				<hr class="bdr-light">
				<div class="container-fluid" style="padding: 0px 50px 0px 100px;">
					<div class="form-group row">
						<div class="col-2">
							<label>Department Name</label>
						</div>
						<div class="col-10">
							<select class="custom-select" name="sltD">
								<option value=""></option>
								<?php
								$SCSQLL = "SELECT * FROM t_memc_department";
								//$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
								$SCResultt = mysqli_query( $conn, $SCSQLL );

								if ( mysqli_num_rows( $SCResultt ) > 0 ) {
									for ( $i = 0; $i < mysqli_num_rows( $SCResultt ); ++$i ) {
										$scroww = mysqli_fetch_array( $SCResultt );
										$s = explode( "-", $row[ 'D_DID' ] );
										//echo $s[0];
										//echo "<script>alert('.$s[0].');</script>";
										?>
								<option value="<?php echo $scroww['dpt_id'];?>"<?php echo ($scroww[ 'dpt_id']==$s[0]) ? "selected" : "" ;?>>
									<?php echo $scroww['dpt_id']."-".$scroww['dpt_name'];?>
								</option>
								<?php
								}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-2">
							<label>Department HOD Name</label>
						</div>
						<div class="col-10">
							<select class="custom-select" name="sltHOD">
								<option value=""></option>
								<?php
								$SCSQL = "SELECT * FROM t_memc_kpcc_employee_detail";
								//$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
								$SCResult = mysqli_query( $conn, $SCSQL );

								if ( mysqli_num_rows( $SCResult ) > 0 ) {
									for ( $i = 0; $i < mysqli_num_rows( $SCResult ); ++$i ) {
										$scrow = mysqli_fetch_array( $SCResult );
										?>
								<option value="<?php echo $scrow['Emp_ID'];?>" <?php echo ($scrow[ 'Emp_ID']==$row[ 'D_HODID']) ? "selected" :"" ;?>>
									<?php echo $scrow['Emp_ID']."-".$scrow['Emp_Name'];?>
								</option>
								<?php
								}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-2">
							<label>Parent Department</label>
						</div>
						<div class="col-10">
							<select class="custom-select" name="sltPD">
								<option value=""></option>
								<?php
								$SCSQLL = "SELECT * FROM t_memc_department";
								//$SearchSQL = "SELECT * FROM t_memc_kpcc_department WHERE D_ID = $did";
								$SCResultt = mysqli_query( $conn, $SCSQLL );

								if ( mysqli_num_rows( $SCResultt ) > 0 ) {
									for ( $i = 0; $i < mysqli_num_rows( $SCResultt ); ++$i ) {
										$scroww = mysqli_fetch_array( $SCResultt );
										$s = explode( "-", $row[ 'D_DPID' ] );
										//echo $s[0];
										//echo "<script>alert('.$s[0].');</script>";
										?>
								<option value="<?php echo $scroww['dpt_id'];?>"<?php echo ($scroww[ 'dpt_id']==$s[0]) ? "selected" : "" ;?>>
									<?php echo $scroww['dpt_id']."-".$scroww['dpt_name'];?>
								</option>
								<?php
								}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12" style="text-align: center;">
							<input type="button" class="btn btn-primary" name="btnBack" value="Back" onClick="location='Employee_ViewEditDepartment.php'">
							<input type="button" class="btn btn-primary" name="btnUDepartment" value="Update" onClick="UpdateDepartment(<?php echo $row['D_ID'];?>)">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
	}
}

if ( $_POST[ 'action' ] == 'updateDepartment' ) {
	$did = $_POST[ 'D_ID' ];
	$UpdateSQL = "UPDATE t_memc_kpcc_department SET D_DID = '" . strtoupper( trim( $formdata[ 0 ][ 'value' ] ) ) . "',
            D_HODID = '" . strtoupper( trim( $formdata[ 1 ][ 'value' ] ) ) . "',
			D_DPID = '" . strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) . "'
            WHERE D_ID = $did";
	$UpdateResult = mysqli_query( $conn, $UpdateSQL );
	if ( $UpdateResult ) {
		echo "success";
	} else {
		echo "fail";
	}
}

if ( $_POST[ 'action' ] == 'changeyear' ) {
	// Overall Chart - 11/5/2022
	//echo HAHA;
	//echo strtoupper(trim($formdata[0]['value']));
	$find = "SELECT * FROM t_memc_kpcc_employee_item, t_memc_kpcc_quarter, t_memc_kpcc_employee_detail, t_memc_department WHERE t_memc_kpcc_quarter.Q_ID = t_memc_kpcc_employee_item.Ei_Quarter_ID AND Q_Year = '" . trim( $formdata[ 0 ][ 'value' ] ) . "' AND Q_Name = '" . strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) . "' AND t_memc_kpcc_employee_item.Ei_EMP_ID = t_memc_kpcc_employee_detail.Emp_ID AND t_memc_kpcc_employee_detail.EMP_D_ID = t_memc_department.dpt_id AND t_memc_department.dpt_name = '" . strtoupper( trim( $formdata[ 1 ][ 'value' ] ) ) . "'";

	$result = mysqli_query( $conn, $find );
	if ( mysqli_num_rows( $result ) > 0 ) {
		$zero = 0;
		$one = 0;
		$two = 0;
		$three = 0;
		$four = 0;
		$five = 0;
		for ( $i = 0; $i < mysqli_num_rows( $result ); ++$i ) {
			$row = mysqli_fetch_array( $result );
			if ( $row[ 'Q_Name' ] == strtoupper( trim( $formdata[ 2 ][ 'value' ] ) ) ) {
				if ( $row[ 'Ei_Score' ] == 1 ) {
					$one += 1;
				} else if ( $row[ 'Ei_Score' ] == 2 ) {
					$two += 1;
				} else if ( $row[ 'Ei_Score' ] == 3 ) {
					$three += 1;
				} else if ( $row[ 'Ei_Score' ] == 4 ) {
					$four += 1;
				} else if ( $row[ 'Ei_Score' ] == 5 ) {
					$five += 1;
				} else {
					$zero += 1;
				}
			}
		}

	}
	echo "One:" . $one . "," . "Two:" . $two . "|" . "Three:" . $three . "-" . "Four:" . $four . "_" . "Five:" . $five . "^" . "Zero:" . $zero . "&";

	//		$find2 = "SELECT * FROM t_memc_kpcc_employee_item, t_memc_kpcc_quarter WHERE t_memc_kpcc_quarter.Q_ID = t_memc_kpcc_employee_item.Ei_Quarter_ID AND Q_Year = '".trim($formdata[0]['value'])."' AND Q_Name = 'Q2'";
	//
	//			$result2 = mysqli_query($conn, $find2);
	//			if(mysqli_num_rows($result2)>0)
	//			{
	//				$pass2 = 0;
	//				$fail2 = 0;
	//				for($i=0;$i<mysqli_num_rows($result2);++$i)
	//				{
	//					$row2 = mysqli_fetch_array($result2);
	//					if($row2['Q_Name'] == "Q2")
	//					{
	//						if($row2['Ei_Score'] >= $row2['Ei_Target_Score'])
	//						{
	//							$pass2 += 1;
	//						}
	//						else
	//						{
	//							$fail2 += 1;
	//						}
	//					}
	//				}
	//				
	//			}
	//		echo "Pass2:".$pass2."A"."Fail2:".$fail2."B";
	//echo "success";
?>


	<div class="row d-flex">
		<div class="col justify-content-end">
			<h3 style="text-align: left;">Marking Score</h3>
		</div>

	</div>
	<div class="row d-flex">
		<div class="col justify-content-end">
			<div id="chart"></div>
		</div>

	</div>

	<?php
}


//Staff Excel
if ( $_FILES[ "staffexcelname" ][ "name" ] != "" ) {
	$file = $_FILES[ "staffexcelname" ][ "tmp_name" ];
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
		if ( $totalcolumn == 14 ) {
			$addcc = "INSERT INTO t_memc_staff(stf_password, stf_name, stf_position_id, stf_department_id, stf_report_to_user_id, stf_type, stf_employee_number, stf_email, stf_user_status, stf_gender, stf_shift_id, stf_plant, stf_position_category, stf_grade) 
              VALUES('" . $str[ 0 ] . "',
              '" . $str[ 1 ] . "',
              '" . $str[ 2 ] . "',
              '" . $str[ 3 ] . "',
              '" . $str[ 4 ] . "',
              '" . $str[ 5 ] . "',
              '" . $str[ 6 ] . "',
              '" . $str[ 7 ] . "',
              '" . $str[ 8 ] . "',
              '" . $str[ 9 ] . "',
              '" . $str[ 10 ] . "',
              '" . $str[ 11 ] . "',
              '" . $str[ 12 ] . "',
              '" . $str[ 13 ] . "'
              )";
			$addccsql = mysqli_query( $conn, $addcc );
			if ( $addccsql ) {
				$success += 1;
			}
		}
	}
}

//Department Excel
if ( $_FILES[ "departmentexcelname" ][ "name" ] != "" ) {
	$file = $_FILES[ "departmentexcelname" ][ "tmp_name" ];
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
		if ( $totalcolumn == 2 ) {
			$addcc = "INSERT INTO t_memc_department(dpt_id, dpt_name) 
              VALUES('" . $str[ 0 ] . "',
              '" . $str[ 1 ] . "'
              )";
			$addccsql = mysqli_query( $conn, $addcc );
			if ( $addccsql ) {
				$success += 1;
			}
		}
	}
}

//Position Excel
if ( $_FILES[ "positionexcelname" ][ "name" ] != "" ) {
	$file = $_FILES[ "positionexcelname" ][ "tmp_name" ];
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
		if ( $totalcolumn == 2 ) {
			$addcc = "INSERT INTO t_memc_position(pos_id, pos_name) 
              VALUES('" . $str[ 0 ] . "',
              '" . $str[ 1 ] . "'
              )";
			$addccsql = mysqli_query( $conn, $addcc );
			if ( $addccsql ) {
				$success += 1;
			}
		}
	}
}
?>