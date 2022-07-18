<?php
error_reporting(0);
session_start();
include "../../includes/conn.php";
$action = $_POST['action'];
$search = $_POST['search'];
if ($action == "SaveEmpTableData") {
    // when get into this page, get all the employee data within department and save into the session, after that go to the $action == ShowEmpTable
    $sql = "select * from t_memc_kpcc_employee_detail,t_memc_department,t_memc_staff where EMP_D_ID = dpt_id and stf_employee_number = Emp_ID";
    if ($search != null) {
        $sql .= " and Emp_ID like '%" . $search . "%'";
    }
    $result = $conn->query($sql);
    $_SESSION['page_number'] = 0;
    $_SESSION['emp_table_data'] = array();

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
}
if ($action == "ShowEmpTable") {
    $row = $_SESSION['emp_table_data'];
    for ($i = ($search * 7) - 7; $i < $search * 7; $i++) {
        if ($row[$i]['Emp_ID'] != null) {
?>
            <tr>
                <td><?php echo $row[$i]['Emp_ID']; ?></td>
                <td><?php echo $row[$i]['Emp_Name']; ?></td>
                <td><?php echo $row[$i]['dpt_name']; ?></td>
                <td>
                    <?php 
                        $group_talent = $conn->query("Select * from t_memc_kpcc_employee_category,t_memc_kpcc_category 
                        where ec_employee_id = '".$row[$i]['Emp_ID']."' and ec_category_id = c_id");
                        while($gt = $group_talent -> fetch_assoc()){
                            echo $gt['c_name'] . '<br/>';
                        }
                    ?>
                </td>
                <td><?php echo $row[$i]['stf_email']; ?></td>
                <td><button type="button" class="btn btn-primary form-control" onclick="SearchEmp('<?php echo $row[$i]['Emp_ID']; ?>')">View</button></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="6">---</td>
            </tr>
        <?php
        }
    }
}
if ($action == "generatePageNum") {
    if ($search * 5 - $_SESSION['page_number'] >= 5) {
        echo "no";
    } else {
        if ($search * 5 <= $_SESSION['page_number']) {
            $max = $search * 5;
        } else {
            $max = $_SESSION['page_number'];
        }
        ?>
        <li class="page-item"><a class="page-link" href="#" onclick="PreviousPage('<?php echo $search; ?>')">Previous</a></li>
        <?php
        for ($i = $search * 5 - 5; $i < $max; $i++) {
        ?>
            <li class="page-item"><a class="page-link" href="#" onclick="ChangePage(<?php echo $i + 1 ?>)"><?php echo $i + 1 ?></a></li>
        <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="#" onclick="NextPage('<?php echo $search; ?>')">Next</a></li>
    <?php
    }
}

?>