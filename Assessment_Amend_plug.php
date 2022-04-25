<?php
include "database/conn.php";
error_reporting(0);
$action = $_POST['action'];
$search = $_POST['search'];

if ($action == "show_emp_table") {
    $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_majorcompetencies,t_memc_kpcc_quarter where 
        Ei_Im_ID = Im_ID and Im_Cc_Id = Cc_ID and Cc_Mc_ID = Mc_ID and Q_ID = Ei_Quarter_ID Order By Q_name DESC";
    $result = $conn->query($sql);
    $i = 0;
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td scope="col"><?php echo $i + 1; ?></td>
            <td scope="col"><?php echo $row['Ei_Emp_ID']; ?></td>
            <td scope="col"><?php echo $row['Im_Name']; ?></td>
            <td scope="col"><?php echo $row['Ei_desp']; ?></td>
            <td scope="col"><?php echo $row['Ei_Target_Score']; ?></td>
            <td scope="col"><?php echo $row['Q_Year'] . " " . $row['Q_name']; ?></td>
            <td scope="col"><?php echo $row['Ei_Date_Participate'] . " to " . $row['Ei_Date_End'] ?></td>
            <td scope="col"><?php echo $row['Ei_Status']; ?></td>
            <td scope="col"><button class="oi oi-pencil" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="EditAssessment('<?php echo $row['Ei_ID']; ?>')"></button></td>
        </tr>
    <?php
        $i++;
    }
}
if ($action == "Edit_Emp_Item") {
    $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_majorcompetencies,t_memc_kpcc_quarter where 
        Ei_Im_ID = Im_ID and Im_Cc_Id = Cc_ID and Cc_Mc_ID = Mc_ID and Q_ID = Ei_Quarter_ID and Ei_ID = " . $search . "";
    $result = $conn->query($sql);
    $found = $result->fetch_assoc();
    $num = 1;
    ?>
    <table class="table">
        <tr>
            <td>Employee</td>
            <td><?php echo $found['Ei_Emp_ID']; ?><input type="text" name="emp_id" value="<?php echo $found['Ei_ID']; ?>" hidden></td>
        </tr>
        <tr>
            <td scope="col" style="width:5%;"><label for="MajorCompetencies<?php echo $num; ?>" class="col-form-label">Major</label></td>
            <td scope="col">
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
        </tr>
        <tr>
            <td scope="col" style="width: 10%;"><label for="Compt<?php echo $num; ?>>" class="col-form-label">Competencies:</label></td>
            <td scope="col">
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
        </tr>
        <tr>
            <td scope="col"><label for="Itm<?php echo $num; ?>" class="col-form-label">Item</label></td>
            <td scope="col">
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
        </tr>
        <tr>
            <td scope="col" style="width:5%;"><label for="target<?php echo $num; ?>" class="col-form-label">Target</label></td>
            <td scope="col"><input type="text" name="target" value="<?php echo $found['Ei_Target_Score'] ?>" class="form-control" id="target<?php echo $num; ?>" placeholder="Score.."></td>
        </tr>
        <tr>
            <td scope="col" style="width:5%;"><label for="Cat<?php echo $num; ?>" class="col-form-label">Category</label></td>
            <td scope="col">
                <Select class="custom-select form-control" id="Cat<?php echo $num; ?>" name="Cat">
                    <option selected>choose...</option>
                    <option value="core">Core Competencies</option>
                    <option value="sub">Sub-Core Competencies</option>
                </Select>
            </td>
        </tr>
        <tr>
            <td scope="col">To-Do</td>
            <td scope="col"><textarea id="todo<?php echo $num; ?>" name="todo" class="form-control" style="width: 100%;height:300px;overflow-y:scroll" rows="30"><?php echo $found['Ei_desp'] ?></textarea></td>
        </tr>
        <tr>
            <td scope="col"><label for="assess_start_date<?php echo $num; ?>" class="col-form-label">Date:</label></td>
            <td scope="col">
                <input type="date" value="<?php echo $found['Ei_Date_Participate'] ?>" id="assess_start_date<?php echo $num; ?>" name="assess_start_date" class="form-control">
            </td>
        </tr>
        <tr>
            <td scope="col"><label for="assess_end_date<?php echo $num; ?>" class="col-form-label">To</label></td>
            <td scope="col">
                <input type="date" value="<?php echo $found['Ei_Date_End'] ?>" id="assess_end_date<?php echo $num; ?>" name="assess_end_date" class="form-control">
            </td>
        </tr>
        <tr>
            <td scope="col"><label for="assess_status<?php echo $num; ?>" class="col-form-label">Status</label></td>
            <td scope="col">
                <Select class="custom-select form-control" id="assess_status<?php echo $num; ?>" name="assess_status">
                    <option selected>choose...</option>
                    <option <?php if ($found['Ei_Status'] == "Active") {
                                echo "selected";
                            } ?> value="Active">Active</option>
                    <option <?php if ($found['Ei_Status'] == "Deactive") {
                                echo "selected";
                            } ?> value="Deactive">Deactive</option>
                </Select>
            </td>
        </tr>

    </table>
<?php
}
?>