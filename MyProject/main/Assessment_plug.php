<?php
include "../../includes/conn.php";
session_start();
error_reporting(0);
$next = $_POST['next'];
$previous = $_POST['previous'];
$action = $_POST['action'];
$search = $_POST['search'];
if ($next == "Comp_Card") { // Add competecies form content
    $num = $_SESSION['start'];
    if ($search != null) {
        $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension,t_memc_kpcc_quarter where 
        Ei_Im_ID = Im_ID and Im_Cd_ID = Cd_ID and Cd_Cc_ID = Cc_ID and Ei_ID = " . $search . " and Ei_Quarter_ID = Q_ID";
        $result = $conn->query($sql);
        $found = $result->fetch_assoc();
    }
?>
    <div id="card_<?php echo $num; ?>">
        <table class="table table-bordered" style="text-align: center;">
            <tr>
                <td colspan="8" style="text-align: left;"><?php if($search != null) { echo "Editing ". $found['Cd_Name'] . " In " . $found['Q_Year']. " - " . $found['Q_Name'];} else{ echo "New Competencies";} ?></td>
                <td colspan="1" style="text-align: right;"><span class="oi oi-x" id="removeCard_<?php echo $num; ?>" onclick="removeCard(<?php echo $num; ?>)" style="cursor: pointer;"></span></td>
            </tr>
            <tr>
                <td scope="col"><label for="MajorCompetencies<?php echo $num; ?>" class="col-form-label">Major</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-control" id="MajorCompetencies<?php echo $num; ?>" onchange="filterCompetencies('<?php echo $num; ?>')" required>
                        <option value="blank">choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_corecompetencies where Cc_status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Cc_ID'] == $row['Cc_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Cc_ID']; ?>"><?php echo $row['Cc_name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
                <td scope="col"><label for="Compt<?php echo $num; ?>>" class="col-form-label">Competencies:</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-control" id="Compt<?php echo $num; ?>" onchange="filterItems('<?php echo $num; ?>')">
                        <option value="blank">choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_competenciesdimension where Cd_status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Cd_ID'] == $row['Cd_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Cd_ID']; ?>"><?php echo $row['Cd_Name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
                <td scope="col"><label for="Itm<?php echo $num; ?>" class="col-form-label">Item</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-control" name="Itm[]" id="Itm<?php echo $num; ?>" onclick="ItemSelected('<?php echo $num; ?>')">
                        <option>choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_items where Im_Status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Im_ID'] == $row['Im_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Im_ID']; ?>"><?php echo $row['Im_Name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
            </tr>
            <tr>
                <td scope="col"><label for="target<?php echo $num; ?>" class="col-form-label">Target</label></td>
                <td scope="col" colspan="8">
                    <select class="custom-select form-control" name="target[]" id="target<?php echo $num; ?>" onchange="filterTarget('<?php echo $num; ?>')">

                    </select>
                </td>
            </tr>
            <tr>
                <td scope="col"><label for="Quarter<?php echo $num; ?>" class="col-form-label">Quarter</label></td>
                <td scope="col" colspan="2">
                    <select name="quarter[]" id="Quarter<?php echo $num; ?>" class="form-control custom-select" onchange="SelectQuarter('<?php echo $num; ?>')">
                        <option value="blank">choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_quarter";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Ei_Quarter_ID'] == $row['Q_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Q_ID']; ?>"><?php echo $row['Q_Name'] . " - " . $row['Q_Year']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td scope="col" style="width:10%;"><label for="Cat<?php echo $num; ?>" class="col-form-label">Category</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-control" id="Cat<?php echo $num; ?>" name="Cat[]" onchange="catSelected('<?php echo $num; ?>')">
                        <option <?php if ($found['Ei_Category'] == "sub") {
                                    echo "selected";
                                } ?> value="sub">Sub-Core Competencies</option>
                        <?php
                        // $_SESSION['core_count'] < 6 && $_POST['for'] != "max" && $_SESSION['initial_core'] != 5
                        if ($_SESSION['core_count'] < 5 && $_POST['for'] != "max") {
                        ?>
                            <option <?php if ($found['Ei_Category'] == "core") {
                                        echo "selected";
                                    } ?> value="core">Core Competencies</option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
                <td scope="col" style="width:10%;"><label for="score<?php echo $num; ?>" class="col-form-label">Score</label></td>
                <td scope="col" colspan="2">
                    <input type="text" class="form-control" id="score<?php echo $num; ?>" name="score[]">
                </td>
            </tr>
            <tr>
                <td scope="col">To-Do</td>
                <td scope="col" colspan="8"><textarea id="todo<?php echo $num; ?>" name="todo[]" class="form-control" style="width: 100%;height:300px;overflow-y:scroll" rows="30"><?php echo $found['Ei_ToDo_Desc'] ?></textarea></td>
            </tr>
        </table>
        <hr style="width: 70%;text-align:center;">
    </div>
    <?php
}
if ($action == "search_emp") { // table of employee after searching // done -2
    $sql = "select * from t_memc_kpcc_employee_detail,t_memc_kpcc_department,t_memc_kpcc_position where EMP_D_ID = '2' and 
                        Emp_P_ID = P_ID and EmpDetail_Status = 'A' and Emp_D_ID = D_ID and P_level < '5'";
    if ($_POST['PID'] != null && $_POST['PID'] != "blank") {
        $sql .= " and P_ID = '" . $_POST['PID'] . "'";
    }
    if ($_POST['EID'] != null) {
        $sql .= " and Emp_ID like '%" . $_POST['EID'] . "%'";
    }
    //need to change future , "5" to the user next level, exclude admin
    $result = $conn->query($sql);
    $_SESSION['emp_table_data'] = array();
    $_SESSION['page_number'] = 0;
    if (mysqli_num_rows($result) > 0) {
        if (fmod(mysqli_num_rows($result), 7) != 0) {
            $_SESSION['page_number'] = intval(mysqli_num_rows($result) / 7) + 1;
        } else {
            $_SESSION['page_number'] = intval(mysqli_num_rows($result) / 7);
        }
    }
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $_SESSION['emp_table_data'][$i] = $row;
        $i++;
    }
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['emp_table_data'] = "";
    }
}
if ($action == "genEmpPageBar") {
    for ($i = 0; $i < $_SESSION['page_number']; $i++) {
    ?>
        <li class="page-item" onclick="EmpNextPage('<?php echo $i + 1; ?>')"><a class="page-link" style="cursor:pointer"><?php echo $i + 1; ?></a></li>
        <?php
    }
}
if ($action == "generateEmpTbl") {
    for ($i = ($search * 7) - 7; $i < $search * 7; $i++) {
        $row = $_SESSION['emp_table_data'][$i];
        if ($row['Emp_ID'] != null) {
        ?>
            <tr>
                <td scope="col"><?php echo $i + 1 ?></td>
                <td scope="col"><?php echo $row['Emp_ID']; ?></td>
                <td scope="col"><?php echo $row['D_Name']; ?></td>
                <td scope="col"><?php echo $row['EmpDetail_Status'] ?></td>
                <td scope="col" style="text-align: center;"><input type="radio" name="Emp_IC" value="<?php echo $row['Emp_ID']; ?>" id="Emp_IC"></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="5" style="text-align: center;">-</td>
            </tr>
        <?php
        }
    }
}
if ($action == "filteritems") { //dropdown box of items in Add competencies, to filter items by select the competencies
    $i = 0;
    $sql = "select * from t_memc_kpcc_items where Im_Status = 'A'";
    if ($search != "blank" && $search != null) {
        $sql .= " and Im_Cd_ID = '" . $search . "'";
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <option <?php if ($i == 0) {
                    echo "selected";
                } ?> value="<?php echo $row['Im_ID']; ?>"><?php echo $row['Im_Name']; ?></option>
    <?php
        $i++;
    }
}
if ($action == "filterComp") {
    $i = 0;
    $sql = "select * from t_memc_kpcc_competenciesdimension where Cd_Status = 'A' and Cd_Cc_ID = '" . $search . "'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <option <?php if ($i == 0) {
                    echo "selected";
                } ?> value="<?php echo $row['Cd_ID']; ?>"><?php echo $row['Cd_Name']; ?></option>
    <?php
        $i++;
    }
}
if ($next == "33%" || $previous == "33%") {
    ?>
    <div class="col-12">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Search</h5>
            </li>
        </ul>
    </div>
    <div class="col-12">
        <form id="AssignAssessment">
            <div class="form-group row">
                <label for="employee_id" class="col-2 col-form-label">Employee ID : </label>
                <input type="text" class="col-10 form-control" id="employee_id" placeholder="Enter Employee ID to Search....">
            </div>
            <div class="form-group row justify-content-center">
                <button type="button" onclick="Search()" class="btn btn-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
    <div class="col-12 justify-content-center">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Staff</h5>
            </li>
        </ul>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td scope="col">No</td>
                    <td scope="col">ID</td>
                    <td scope="col">Department</td>
                    <td scope="col">Status</td>
                    <td scope="col" style="text-align: center;">Select</td>
                </tr>
            </thead>
            <tbody id="show_emp_detail">

            </tbody>
        </table>
    </div>
<?php
}
if ($next == "66%" || $previous == "66%") {
    $_SESSION['plus_one'] = false;
    $_SESSION['core_count'] = 0;
    $_SESSION['start'] = 1;
    $_SESSION['total'] = 1;
    $sql = "select DISTINCT Ei_Im_ID from t_memc_kpcc_employee_item,t_memc_kpcc_quarter where Ei_Quarter_ID = Q_ID and Q_Year = '" . date("Y") . "' and Ei_Emp_ID = '" . $_POST['empid'] . "' and Ei_Category = 'core'";
    $result = $conn->query($sql);
    $row = mysqli_num_rows($result);
    if ($row != 0) {
        $_SESSION['core_count'] = $row;
    }
    $_SESSION['initial_core'] = $row;
?>
    <div class="col-12">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Staff Information</h5>
            </li>
        </ul>
        <table class="table table-bordered">
            <tr>
                <td>Name : </td>
                <td>--------</td>
            </tr>
            <tr>
                <td><label for="emp_id" class="col-form-label">ID: </label></td>
                <td><input type="text" id="emp_id" disabled value="<?php echo $_POST['empid']; ?>" class="form-control"></td>
            </tr>
        </table>
    </div>
    <div class="col-12">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Competencies History</h5>
            </li>
        </ul>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td scope="col">Year/Quater</td>
                    <td scope="col" colspan="2">Major</td>
                    <td scope="col" colspan="2">Competencies</td>
                    <td scope="col" colspan="3">Item</td>
                    <td scope="col">Category</td>
                    <td scope="col">Score</td>
                    <td scope="col">Target</td>
                    <td scope="col">View</td>
                    <td scope="col">Copy</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension,t_memc_kpcc_employee_item,t_memc_kpcc_items,
                    t_memc_kpcc_quarter,t_memc_kpcc_items_lvl_desc where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID and Ei_Target_Score = Im_lvl_ID 
                    and Ei_EMP_ID = '" . $_POST['empid'] . "' and Cd_ID = Im_Cd_ID and Cc_ID = Cd_Cc_ID and Im_lvl_Im_ID = Im_ID  order by Q_Year Desc";
                $result = $conn->query($sql);
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                ?>
                    <tr>
                        <td style="text-align: center;" scope="col" colspan="12">No Data</td>
                    </tr>
                    <?php
                } else {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td scope="col"><?php echo $row['Q_Year'] . " / " . $row['Q_Name']; ?></td>
                            <td scope="col" colspan="2"><?php echo $row['Cc_name']; ?></td>
                            <td scope="col" colspan="2"><?php echo $row['Cd_Name']; ?></td>
                            <td scope="col" colspan="3"><?php echo $row['Im_Name']; ?></td>
                            <td scope="col"><?php echo $row['Ei_Category']; ?></td>
                            <td scope="col"><?php if ($row['Ei_Score'] == "-") {
                                                echo "--";
                                            } else {
                                                echo $row['Ei_Score'];
                                            } ?></td>
                            <td scope="col"><?php echo $row['Im_lvl_Name']; ?></td>
                            <td><span class="oi oi-eye"></span></td>
                            <td scope="col">
                                <span class="oi oi-copywriting" onclick="FillData('<?php echo $row['Ei_ID']; ?>','<?php echo $row['Ei_Category']; ?>')"></span>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Add Competencies</h5>
            </li>
        </ul>
        <form id="Form_Competencies">
            <div id="Competencies_Card">

            </div>
        </form>
    </div>
    <?php
}
if ($action == "addHistory") {
    if ($_SESSION['core_count'] == 5 && $_POST['cat'] == "core") {
        echo "full";
    } else if ($_SESSION['start'] == 1 && $_SESSION['plus_one'] == false) {
        // if ($_POST['cat'] == "core") {
        //     $_SESSION['core_count'] = $_SESSION['core_count'] +  1;
        // }
        $_SESSION['plus_one'] = true;
        echo "replace";
    } else {
        $_SESSION['start'] = $_SESSION['start'] + 1;
        $_SESSION['total'] =  $_SESSION['total'] + 1;
        // if ($_POST['cat'] == "core") {
        //     $_SESSION['core_count'] = $_SESSION['core_count'] +  1;
        // }
        echo "add";
        echo $_SESSION['total'];
    }
}
if ($action == "removeCard") {
    if ($_SESSION['total'] == 1) {
        echo "no";
    } else {
        $_SESSION['total'] -= 1;
        if ($search == "core") {
            $_SESSION['core_count'] -= 1;
        }
        echo "remove";
        if ($_SESSION['total'] == 1) {
            $_SESSION['plus_one'] = false;
        }
    }
}
if ($action == "AddButton") {
    echo $_SESSION['total'];
}
if ($action == "AddButton_1") {
    $_SESSION['start'] = $_SESSION['start'] + 1;
    $_SESSION['total'] = $_SESSION['total'] + 1;
}
if ($action == "categorySelected") {
    if ($search == "core") {
        echo $_SESSION['core_count'] += 1;
    } else {
        echo $_SESSION['core_count'] -= 1;
    }
}
if ($action == "targetItemDesc") {
    $sql = "select * from t_memc_kpcc_items_lvl_desc where Im_lvl_Im_ID = " . $search . " and Im_lvl_Status = 'A'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <option class="tooltip" data-toggle="tooltip" data-placement="bottom" value="<?php echo $row['Im_lvl_ID'] ?>" title=""><?php echo $row['Im_lvl_Name'] . " - ". $row['Im_lvl_Description'] .$row['Im_lvl_Description']; ?></option>
<?php
    }
}
if ($action == "checkExist") {
    $quarter = $_POST['qutr'];
    $category = $_POST['catgy'];
    $item = $_POST['itms'];
    $result = $conn->query("select * from t_memc_kpcc_quarter where Q_ID = " . $quarter . "");
    $year = $result->fetch_assoc();
    $sql = "select * from t_memc_kpcc_employee_item where Ei_EMP_ID = '" . $search . "' and Ei_Im_ID = " . $item . " and Ei_Quarter_ID in 
    (select Q_ID from t_memc_kpcc_quarter where Q_Year = '" . $year['Q_Year'] . "')";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        if ($row['Ei_Category'][0]  == "core") {
            $_SESSION['core_count'] = $_SESSION['core_count'] + 1;
        }
    }
    $_SESSION['start'] = $_SESSION['start'] + 1;
    $_SESSION['total'] = $_SESSION['total'] + 1;
}
?>