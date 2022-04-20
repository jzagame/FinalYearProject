<?php
include "database/conn.php";
error_reporting(0);
$number = $_POST['num'];
$next = $_POST['next'];
$action = $_POST['action'];
$search = $_POST['search'];
if ($next == "66%") { // Add competecies form content
?>
    <div id="card_<?php echo $number; ?>" class="row">
        <table class="table" style="text-align: center;">
            <tr>
                <td scope="col" style="width: 10%;"><label for="Compt>" class="col-form-label">Competencies:</label></td>
                <td scope="col">
                    <Select class="custom-select form-contorl" id="Compt" name="Compt" onchange="filterItems()">
                        <option value="blank" selected>choose...</option>
                        <?php
                        $sql = "select * from corecompetencies where Cc_status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['Cc_ID']; ?>"><?php echo $row['Cc_Name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
                <td scope="col" style="width:5%;"><label for="Cat" class="col-form-label">Category</label></td>
                <td scope="col">
                    <Select class="custom-select form-control" name="Cat" id="Cat">
                        <option selected>choose...</option>
                        <option value="core">Core Competencies</option>
                        <option value="sub">Sub-Core Competencies</option>
                    </Select>
                </td>
                <td scope="col" style="width:5%;"><label for="target" class="col-form-label">Target</label></td>
                <td scope="col" style="width:10%;"><input type="text" name="target" class="form-control" id="target" placeholder="Score.."></td>
            </tr>
            <tr>
                <td scope="col"><label for="Itm" class="col-form-label">Item</label></td>
                <td scope="col" colspan="5">
                    <Select class="custom-select form-control" name="Itm" id="Itm">
                        <option selected>choose...</option>
                        <?php
                        $sql = "select * from items where Im_Status = 'A'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['Im_ID']; ?>"><?php echo $row['Im_Name']; ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </td>
            </tr>
            <tr>
                <td scope="col">To-Do</td>
                <td scope="col" colspan="5"><textarea id="todo" name="todo" class="form-control" style="width: 100%;height:300px;overflow-y:scroll" rows="30"></textarea></td>
            </tr>
            <tr>
                <td scope="col"><label for="assess_start_date" class="col-form-label">Date:</label></td>
                <td scope="col">
                    <input type="date" id="assess_start_date" name="assess_start_date" class="form-control">
                </td>
                <td scope="col"><label for="assess_end_date" class="col-form-label">To</label></td>
                <td scope="col">
                    <input type="date" id="assess_end_date" name="assess_end_date" class="form-control">
                </td>
            </tr>
            <tr>
                <td scope="col"><label for="assess_start_time" class="col-form-label">Time:</label></td>
                <td scope="col" >
                    <input type="time" id="assess_start_time" name="assess_start_time" class="form-control">
                </td>
                <td scope="col"><label for="assess_end_time" class="col-form-label">To</label></td>
                <td scope="col" >
                    <input type="time" id="assess_end_time" name="assess_end_time"  class="form-control">
                </td>
            </tr>
        </table>
        <hr style="width: 70%;text-align:center;">
    </div>
    <?php
}
if ($action == "search_emp") { // table of employee after searching
    $sql = "select * from employee_detail,department,position where Emp_dept_id = '1' and 
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
    $sql = "select * from items where Im_Status = 'A'";
    if ($search != "blank" && $search != null) {
        $sql .= " and Im_Cc_ID = '" . $search . "'";
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <option value="<?php echo $row['Im_ID']; ?>"><?php echo $row['Im_Name']; ?></option>
<?php
    }
}
?>