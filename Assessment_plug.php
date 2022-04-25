<?php
include "database/conn.php";
session_start();
error_reporting(0);
$next = $_POST['next'];
$previous = $_POST['previous'];
$action = $_POST['action'];
$search = $_POST['search'];
if ($next == "Comp_Card") { // Add competecies form content
    if ($_SESSION['core_count'] < 6) {
        if ($_POST['act2'] != "replace") {
            $_SESSION['core_count'] = $_SESSION['core_count'] + 1;
        }
        if ($search != null) {
            $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_majorcompetencies where 
            Ei_Im_ID = Im_ID and Im_Cc_Id = Cc_ID and Cc_Mc_ID = Mc_ID and Ei_ID = " . $search . "";
            $result = $conn->query($sql);
            $found = $result->fetch_assoc();
        }
        $num = $_SESSION['core_count'];
?>
        <div id="card_<?php echo $num; ?>" class="row">
            <table class="table" style="text-align: center;">
                <tr>
                    <td scope="col" style="width:5%;"><label for="MajorCompetencies<?php echo $num; ?>" class="col-form-label">Major</label></td>
                    <td scope="col" colspan="2">
                        <Select class="custom-select form-control" id="MajorCompetencies<?php echo $num; ?>" onchange="filterCompetencies('<?php echo $num; ?>')" required>
                            <option value="blank">choose...</option>
                            <?php
                            $sql = "select * from t_memc_kpcc_majorcompetencies where Mc_status = 'A'";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option <?php if ($found['Mc_ID'] == $row['Mc_ID']) {
                                            echo "selected";
                                        } ?> value="<?php echo $row['Mc_ID']; ?>"><?php echo $row['Mc_name']; ?></option>
                            <?php
                            }
                            ?>
                        </Select>
                    </td>
                    <td scope="col" style="width: 10%;"><label for="Compt<?php echo $num; ?>>" class="col-form-label">Competencies:</label></td>
                    <td scope="col" colspan="2">
                        <Select class="custom-select form-contorl" id="Compt<?php echo $num; ?>" onchange="filterItems('<?php echo $num; ?>')">
                            <option value="blank">choose...</option>
                            <?php
                            $sql = "select * from t_memc_kpcc_corecompetencies where Cc_status = 'A'";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option <?php if ($found['Cc_ID'] == $row['Cc_ID']) {
                                            echo "selected";
                                        } ?> value="<?php echo $row['Cc_ID']; ?>"><?php echo $row['Cc_Name']; ?></option>
                            <?php
                            }
                            ?>
                        </Select>
                    </td>
                    <td scope="col"><label for="Quarter<?php echo $num; ?>" class="col-form-label">Quarter</label></td>
                    <td scope="col" colspan="2">
                        <select name="quarter" id="Qaruter<?php echo $num; ?>" class="form-control custom-select">
                            <option>choose...</option>
                            <?php
                            $sql = "select * from t_memc_kpcc_quarter where Q_Year = '" . date("Y") . "'";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['Q_ID'] ?>"><?php echo $row['Q_name'] . " - " . $row['Q_Year']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td scope="col"><label for="Itm<?php echo $num; ?>" class="col-form-label">Item</label></td>
                    <td scope="col" colspan="2">
                        <Select class="custom-select form-control" name="Itm" id="Itm<?php echo $num; ?>">
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
                    <td scope="col" style="width:10%;"><label for="Cat<?php echo $num; ?>" class="col-form-label">Category</label></td>
                    <td scope="col" colspan="2">
                        <Select class="custom-select form-control" id="Cat<?php echo $num; ?>" name="Cat">
                            <option selected>choose...</option>
                            <option value="core">Core Competencies</option>
                            <option value="sub">Sub-Core Competencies</option>
                        </Select>
                    </td>
                    <td scope="col" style="width:5%;"><label for="target<?php echo $num; ?>" class="col-form-label">Target</label></td>
                    <td scope="col"><input type="text" name="target" value="<?php echo $found['Ei_Target_Score'] ?>" class="form-control" id="target<?php echo $num; ?>" placeholder="Score.."></td>
                </tr>
                <tr>
                    <td scope="col">To-Do</td>
                    <td scope="col" colspan="7"><textarea id="todo<?php echo $num; ?>" name="todo" class="form-control" style="width: 100%;height:300px;overflow-y:scroll" rows="30"><?php echo $found['Ei_desp'] ?></textarea></td>
                </tr>
                <tr>
                    <td scope="col"><label for="assess_start_date<?php echo $num; ?>" class="col-form-label">Date:</label></td>
                    <td scope="col" colspan="3">
                        <input type="date" value="<?php echo $found['Ei_Date_Participate'] ?>" id="assess_start_date<?php echo $num; ?>" name="assess_start_date" class="form-control">
                    </td>
                    <td scope="col"><label for="assess_end_date<?php echo $num; ?>" class="col-form-label">To</label></td>
                    <td scope="col" colspan="3">
                        <input type="date" value="<?php echo $found['Ei_Date_End'] ?>" id="assess_end_date<?php echo $num; ?>" name="assess_end_date" class="form-control">
                    </td>
                </tr>
            </table>
            <hr style="width: 70%;text-align:center;">
        </div>
    <?php
    } else {
        echo "no";
    }
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
    $_SESSION['emp_detail'] = $conn->query();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td scope="col"><?php echo $i + 1; ?></td>
            <td scope="col"><?php echo $row['Emp_ID']; ?></td>
            <td scope="col"><?php echo $row['dept_name']; ?></td>
            <td scope="col"><?php echo $row['EmpDetail_Status'] ?></td>
            <td scope="col" style="text-align: center;"><input type="radio" name="Emp_IC" value="<?php echo $row['Emp_ID']; ?>" id="Emp_IC"></td>
        </tr>
    <?php
        $i++;
    }
}
if ($action == "filteritems") { //dropdown box of items in Add competencies, to filter items by select the competencies
    $i = 0;
    $sql = "select * from t_memc_kpcc_items where Im_Status = 'A'";
    if ($search != "blank" && $search != null) {
        $sql .= " and Im_Cc_ID = '" . $search . "'";
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
    $sql = "select * from t_memc_kpcc_corecompetencies where Cc_Status = 'A' and Cc_Mc_ID = '" . $search . "'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <option <?php if ($i == 0) {
                    echo "selected";
                } ?> value="<?php echo $row['Cc_ID']; ?>"><?php echo $row['Cc_Name']; ?></option>
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
            <div class="row justify-content-end">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
}
if ($next == "66%" || $previous == "66%") {
    $_SESSION['plus_one'] = false;
    $_SESSION['core_count'] = 0;
    $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_quarter where Ei_Quarter_ID = Q_ID and Q_Year = '2022' and Ei_Emp_ID = '" . $_POST['empid'] . "'";
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
                    <td scope="col">Competencies</td>
                    <td scope="col">Item</td>
                    <td scope="col">Score</td>
                    <td scope="col">Target</td>
                    <td scope="col">Year/Quater</td>
                    <td scope="col">Date</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_quarter where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID 
                    and Ei_Emp_ID = '" . $_POST['empid'] . "' order by Q_Year";
                $result = $conn->query($sql);
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                ?>
                    <tr>
                        <td style="text-align: center;" scope="col" colspan="7">No Data</td>
                    </tr>
                    <?php
                } else {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td scope="col"><?php echo $i + 1; ?></td>
                            <td scope="col"><?php echo $row['Im_Name']; ?></td>
                            <td scope="col"><?php if ($row['Ei_Score'] == null) {
                                                echo "--";
                                            } else {
                                                echo $row['Ei_Score'];
                                            } ?></td>
                            <td scope="col"><?php echo $row['Ei_Target_Score']; ?></td>
                            <td scope="col"><?php echo $row['Q_Year'] . " / " . $row['Q_name']; ?></td>
                            <td scope="col"><?php echo $row['Ei_Date_Participate'] . " to " . $row['Ei_Date_End'];; ?></td>
                            <td scope="col"><span class="oi oi-pencil" onclick="FillData('<?php echo $row['Ei_ID']; ?>')"></span></td>
                        </tr>
                <?php
                        $i++;
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
if ($action == "remove_card") {
    if ($_SESSION['core_count'] - 1 == $_SESSION['initial_core']) {
        echo "no";
    } else {
        echo $_SESSION['core_count'];
        $_SESSION['core_count'] = $_SESSION['core_count'] - 1;
    }
}
if ($action == "check_init_or_add") {
    if($_SESSION['initial_core'] == 4){
        $_SESSION['plus_one'] = false;
    }
    if ( $_SESSION['core_count'] == $_SESSION['initial_core'] + 1 && $_SESSION['plus_one'] == false) {
        $_SESSION['plus_one'] = true;
        echo "replace";
    }else if($_SESSION['plus_one'] == true && $_SESSION['core_count'] == 5){
        echo "max";
    } else {
        echo "add";
    }
}
if($action == "Check_Add"){
    if($_SESSION['core_count'] == 5){
        echo "max";
    }else{
        echo "ok";
    }
}
?>