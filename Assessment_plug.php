<?php
include "database/conn.php";
session_start();
error_reporting(0);
$next = $_POST['next'];
$previous = $_POST['previous'];
$action = $_POST['action'];
$search = $_POST['search'];
if ($next == "Comp_Card") { // Add competecies form content
    $num = $_SESSION['start'];
    if ($search != null) {
        $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension where 
        Ei_Im_ID = Im_ID and Im_Cd_ID = Cd_ID and Cd_Cc_ID = Cc_ID and Ei_ID = " . $search . "";
        $result = $conn->query($sql);
        $found = $result->fetch_assoc();
    }
?>
    <div id="card_<?php echo $num; ?>" class="row">
        <table class="table" style="text-align: center;">
            <tr style="text-align: right;">
                <td colspan="9"><span class="oi oi-x" id="removeCard_<?php echo $num; ?>" onclick="removeCard(<?php echo $num; ?>)" style="cursor: pointer;"></span></td>
            </tr>
            <tr>
                <td scope="col"><label for="MajorCompetencies<?php echo $num; ?>" class="col-form-label">Major</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-control" id="MajorCompetencies<?php echo $num; ?>" onchange="filterCompetencies('<?php echo $num; ?>')" required>
                        <option value="blank">choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_competenciesdimension where Mc_status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Cc_ID'] == $row['Cc_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Cc_ID']; ?>"><?php echo $row['Mc_name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
                <td scope="col"><label for="Compt<?php echo $num; ?>>" class="col-form-label">Competencies:</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-contorl" id="Compt<?php echo $num; ?>" onchange="filterItems('<?php echo $num; ?>')">
                        <option value="blank">choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_corecompetencies where Cc_status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Cd_ID'] == $row['Cd_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Cd_ID']; ?>"><?php echo $row['Cc_Name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
                <td scope="col"><label for="Itm<?php echo $num; ?>" class="col-form-label">Item</label></td>
                <td scope="col" colspan="2">
                    <Select class="custom-select form-control" name="Itm[]" id="Itm<?php echo $num; ?>">
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
                    <select name="target[]" id="target<?php echo $num; ?>">
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td scope="col"><label for="Quarter<?php echo $num; ?>" class="col-form-label">Quarter</label></td>
                <td scope="col" colspan="2">
                    <select name="quarter[]" id="Quarter<?php echo $num; ?>" class="form-control custom-select" onchange="SelectQuarter('<?php echo $num; ?>')">
                        <option>choose...</option>
                        <?php
                        $sql = "select * from t_memc_kpcc_quarter where Q_Year = '" . date("Y") . "'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option <?php if ($found['Ei_Quarter_ID'] == $row['Q_ID']) {
                                        echo "selected";
                                    } ?> value="<?php echo $row['Q_ID'] ?>"><?php echo $row['Q_name'] . " - " . $row['Q_Year']; ?></option>
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
                        if ($_SESSION['core_count'] < 6 && $_POST['for'] != "max" && $_SESSION['initial_core'] != 5) {
                        ?>
                            <option <?php if ($found['Ei_Category'] == "core") {
                                        echo "selected";
                                    } ?> value="core">Core Competencies</option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
            </tr>
            <tr>
                <td scope="col">To-Do</td>
                <td scope="col" colspan="8"><textarea id="todo<?php echo $num; ?>" name="todo[]" class="form-control" style="width: 100%;height:300px;overflow-y:scroll" rows="30"><?php echo $found['Ei_desp'] ?></textarea></td>
            </tr>
        </table>
        <hr style="width: 70%;text-align:center;">
    </div>
    <?php
}
if ($action == "search_emp") { // table of employee after searching
    $sql = "select * from t_memc_kpcc_employee_detail,t_memc_kpcc_department,t_memc_kpcc_position where Emp_dept_id = '1' and 
                        Emp_P_ID = P_ID and EmpDetail_Status = 'A' and Emp_dept_id = dept_id and P_level < '5'";
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
                } ?> value="<?php echo $row['Im_ID']; ?>"><?php echo "Pre-sale and after-sale tenical support capabilities in overseas Market"; ?></option>
    <?php
        $i++;
    }
}
if ($action == "filterComp") {
    $i = 0;
    $sql = "select * from t_memc_kpcc_corecompetencies where Cc_Status = 'A' and Cd_Cc_ID = '" . $search . "'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <option <?php if ($i == 0) {
                    echo "selected";
                } ?> value="<?php echo $row['Cd_ID']; ?>"><?php echo "Commercial Affairs / Buisness"; ?></option>
    <?php
        $i++;
    }
}
if ($next == "33%" || $previous == "33%") {
    ?>
    <div class="row justify-content-center">
        <form id="AssignAssessment" class="m-2 col" style="width:75%;">
            <div class="form-group row">
                <label for="Position" class="col-2 col-form-label">Position</label>
                <select class="custom-select form-control col-10" id="Position">
                    <option value="blank" selected>Choose...</option>
                    <?php
                    $sql = "select * from t_memc_kpcc_position where P_level < '5' and P_Status = 'A'"; //need to change future , "5" to the user next level, exclude admin
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row['P_ID']; ?>"><?php echo $row['P_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group row">
                <label for="employee_id" class="col-2 col-form-label">Employee ID : </label>
                <input type="text" class="col-10 form-control" id="employee_id" placeholder="Enter Employee ID to Search....">
            </div>
            <div class="form-group row justify-content-center">
                <button type="button" onclick="Search()" class="btn btn-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <table class="table">
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
        </div>
    </div>
<?php
}
if ($next == "66%" || $previous == "66%") {
    $_SESSION['plus_one'] = false;
    $_SESSION['core_count'] = 0;
    $_SESSION['start'] = 1;
    $_SESSION['total'] = 1;
    $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_quarter where Ei_Quarter_ID = Q_ID and Q_Year = '". date("Y") ."' and Ei_Emp_ID = '" . $_POST['empid'] . "' and Ei_Category = 'core'";
    $result = $conn->query($sql);
    $row = mysqli_num_rows($result);
    if ($row != 0) {
        $_SESSION['core_count'] = $row;
    }
    $_SESSION['initial_core'] = $row;
?>
    <div class="row">
        <table class="table">
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
    <div class="row">
        <h3 class="mt-3"><b><u>Core Competencies History</u></b></h3>
        <table class="table">
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
                $sql = "select * from t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension,t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_quarter where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID 
                    and Ei_Emp_ID = '" . $_POST['empid'] . "' and Ei_Category = 'core' and Cd_ID = Im_Cd_ID and Cc_ID = CCd_Cc_ID order by Q_Year";
                $result = $conn->query($sql);
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                ?>
                    <tr>
                        <td style="text-align: center;" scope="col" colspan="7">No Data</td>
                    </tr>
                    <?php
                } else {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td scope="col"><?php echo $row['Q_Year'] . " / " . $row['Q_name']; ?></td>
                            <td scope="col" colspan="2"><?php echo $row['Mc_name']; ?></td>
                            <td scope="col" colspan="2"><?php echo $row['Cc_Name']; ?></td>
                            <td scope="col" colspan="3"><?php echo "Pre-sale and after-sale tenical support capabilities in overseas Market"; ?></td>
                            <td scope="col"><?php echo $row['Ei_Category']; ?></td>
                            <td scope="col"><?php if ($row['Ei_Score'] == null) {
                                                echo "--";
                                            } else {
                                                echo $row['Ei_Score'];
                                            } ?></td>
                            <td scope="col"><?php echo $row['Ei_Target_Score']; ?></td>\
                            <td><span class="oi oi-eye"></span></td>
                            <td scope="col">
                                <span class="oi oi-copywriting" onclick="FillData('<?php echo $row['Ei_ID']; ?>')"></span>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h3 class="mt-3"><b><u>Add Competencies</u></b></h3><br>
        <div class="col-12">
            <form id="Form_Competencies">
                <div id="Competencies_Card">

                </div>
            </form>
        </div>
    </div>
    <?php
}
if ($action == "addHistory") {
    if ($_SESSION['core_count'] == 5) {
        echo "full";
    } else if ($_SESSION['start'] == 1 && $_SESSION['plus_one'] == false) {
        $_SESSION['core_count'] = $_SESSION['core_count'] +  1;
        $_SESSION['plus_one'] = true;
        echo "replace";
    } else {
        $_SESSION['start'] = $_SESSION['start'] + 1;
        $_SESSION['total'] =  $_SESSION['total'] + 1;
        $_SESSION['core_count'] = $_SESSION['core_count'] +  1;
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
    $_SESSION['start'] = $_SESSION['start'] + 1;
    $_SESSION['total'] = $_SESSION['total'] + 1;
    if ($_SESSION['core_count'] == 5) {
        echo "max";
    } else {
        echo "add";
    }
}
if ($action == "categorySelected") {
    if ($search == "core") {
        $_SESSION['core_count'] += 1;
    } else {
        $_SESSION['core_count'] -= 1;
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
        if (count($row) != 0) {
        ?>
            <tr>
                <td scope="col"><?php echo $i + 1 ?></td>
                <td scope="col"><?php echo $row['Emp_ID']; ?></td>
                <td scope="col"><?php echo $row['dept_name']; ?></td>
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
?>