<?php
error_reporting(0);
session_start();
include "database/conn.php";
$action = $_POST['action'];
$search = $_POST['search'];
if ($action == "SaveEmpTableData") {
    // when get into this page, get all the employee data within department and save into the session, after that go to the $action == ShowEmpTable
    $sql = "select * from t_memc_kpcc_employee_detail,t_memc_kpcc_department,t_memc_kpcc_position where EMP_D_ID = D_ID and Emp_P_ID = P_ID";
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
                <td><?php echo $row[$i]['D_Name']; ?></td>
                <td><?php echo $row[$i]['P_name']; ?></td>
                <td><?php echo $row[$i]['Emp_Email']; ?></td>
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
if ($action == "ViewEmpData") {
    $sql = "select DISTINCT Q_Year from t_memc_kpcc_quarter order by Q_Year desc";
    $year_data = $conn -> query($sql);
    $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_employee_detail,t_memc_kpcc_department,t_memc_kpcc_position where 
    Ei_EMP_ID = Emp_ID  and EMP_D_ID = D_ID and Emp_ID = '" . $search . "' and Emp_P_ID = P_ID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="col-4">
        <table class="table">
            <tr>
                <td>Name : </td>
                <td><?php echo $row['Emp_Name']; ?></td>
            </tr>
            <tr>
                <td>ID : </td>
                <td><?php echo $row['Emp_ID'] ?></td>
            </tr>
            <tr>
                <td>Department : </td>
                <td><?php echo $row['D_Name'] ?></td>
            </tr>
            <tr>
                <td>Position : </td>
                <td><?php echo $row['P_name'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-7">

    </div>
    <div class="col-1" style="text-align: right;">
        <select class="form-control" name="" id="year_select" onchange="ChangeYear('<?php echo $row['Emp_ID']; ?>')">
    <?php 
        while($temp = $year_data -> fetch_assoc()){
    ?>
        <option value="<?php echo $temp['Q_Year']; ?>"><?php echo $temp['Q_Year']; ?></option>
    <?php
        }
    ?>
        </select>
    </div>
    <div class="col-12">
        <div class="row mt-3" id="CompetenciesList">

        </div>
    </div>
    <?php
}
if ($action == "CompetenciesList") {
    if ($_POST['y'] == null) {
        $year = date("Y");
    } else {
        $year = $_POST['y'];
    }
    $sql = "select * from t_memc_kpcc_employee_item, t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension, t_memc_kpcc_quarter 
    where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID and Ei_EMP_ID = '" . $search . "' and Q_Year = '" . $year . "' and Im_Cd_ID = Cd_ID and  
    Cd_Cc_ID = Cc_ID and Ei_Category = 'core' group by Ei_Im_ID";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 0) {
    ?>
        <div class="col-12 mt-3">No Core Competencies Found</div>
    <?php
    } else {
    ?>
        <div class="col-12 mt-3">
            <hr style="width: 80%;">
            <h4>Core Competencies in <?php echo $year; ?></h4>
        </div>
    <?php
    }
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['Cc_name'] . "<br>" . $row['Cd_Name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['Im_Name']; ?></h6>
                    <p class="card-text"><?php echo "Category : " . $row['Ei_Category'] ?></p>
                    <p class="card-text" style="height: 100px;"><?php echo $row['Im_Definition'] ?></p>
                    <a href="#" onclick="ViewAllCompetenciesEmp('<?php echo $search; ?>','<?php echo $year; ?>','<?php echo $row['Im_ID'] ?>')" class="card-link" data-toggle="modal" data-target="#ModalEmpView">View All</a>
                </div>
            </div>
        </div>
    <?php
    }
    $sql = "select * from t_memc_kpcc_employee_item, t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension, t_memc_kpcc_quarter 
    where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID and Ei_EMP_ID = '" . $search . "' and Q_Year = '" . $year . "' and Im_Cd_ID = Cd_ID and  
    Cd_Cc_ID = Cc_ID and Ei_Category = 'sub' group by Ei_Im_ID";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 0) {
    ?>
        <div class="col-12">No Sub Core Competencies Found</div>
    <?php
    } else {
    ?>
        <div class="col-12 mt-3">
            <hr style="width: 80%;">
            <h4>Sub - Core Competencies in <?php echo $year; ?></h4>
        </div>
    <?php
    }
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['Cc_name'] . "<br>" . $row['Cd_Name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['Im_Name']; ?></h6>
                    <p class="card-text"><?php echo "Category : " . $row['Ei_Category'] ?></p>
                    <p class="card-text" style="height: 100px;"><?php echo $row['Im_Definition'] ?></p>
                    <a href="#" onclick="ViewAllCompetenciesEmp('<?php echo $search; ?>','<?php echo $year; ?>','<?php echo $row['Im_ID'] ?>')" class="card-link" data-toggle="modal" data-target="#ModalEmpView">View All</a>
                </div>
            </div>
        </div>
    <?php
    }
}
if ($action == "ViewAllCompetenciesEmp") {
    $year = $_POST['y'];
    $itemID = $_POST['ITMID'];
    $sql = "select * from t_memc_kpcc_employee_item,t_memc_kpcc_items_lvl_desc, t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension, t_memc_kpcc_quarter 
    where Ei_Quarter_ID = Q_ID and Im_lvl_ID = EI_Target_Score and Ei_Im_ID = Im_ID and Ei_EMP_ID = '" . $search . "' and Q_Year = '" . $year . "' and Im_Cd_ID = Cd_ID and  
    Cd_Cc_ID = Cc_ID and Ei_Im_ID = " . $itemID . " order by Q_Name";
    $result = $conn->query($sql);
    $temp = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $temp[$i] = $row;
        $i++;
    }
    ?>
    <table class="table" border="1">
        <tr>
            <td>Quarter</td>
            <?php
            for ($i = 0; $i < count($temp); $i++) {
            ?>
                <td><?php echo $temp[$i]['Q_Year'] . " - ".  $temp[$i]['Q_Name']; ?></td>
            <?php
            }
            ?>
        </tr>
        <tr>
            <td>To-Do</td>
            <?php
            for ($i = 0; $i < count($temp); $i++) {
            ?>
                <td><?php echo $temp[$i]['Ei_ToDo_Desc']; ?></td>
            <?php
            }
            ?>
        </tr>
        <tr>
            <td>Score</td>
            <?php
            for ($i = 0; $i < count($temp); $i++) {
            ?>
                <td><?php
                    if ($temp[$i]['Ei_Score'] == null) {
                        echo " pending ";
                    } else {
                        echo $temp[$i]['Ei_Score'];
                    }
                    echo  ' / ' . $temp[$i]['Im_lvl_Name'] . " ---- (Score / Target)"; ?></td>
            <?php
            }
            ?>
        </tr>
    </table>
<?php
}
?>