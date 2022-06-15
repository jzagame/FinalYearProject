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
                <!-- <td><?php echo $row[$i]['P_name']; ?></td> -->
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
if ($action == "ViewEmpData") {
    $sql = "select DISTINCT Q_Year from t_memc_kpcc_quarter order by Q_Year desc";
    $year_data = $conn->query($sql);
    $sql = "select * from t_memc_kpcc_employee_detail,t_memc_department where EMP_D_ID = dpt_id and Emp_ID = '" . $search . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="col-12">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Staff Information</h5>
            </li>
        </ul>
    </div>
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
                <td><?php echo $row['dpt_name'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-7">

    </div>
    <div class="col-1" style="text-align: right;">
        <select class="form-control" name="" id="year_select" onchange="ChangeYear('<?php echo $row['Emp_ID']; ?>')">
            <?php
            while ($temp = $year_data->fetch_assoc()) {
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
?>
    <div class="col-12 mt-3">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Core Competencies in <?php echo $year; ?></h5>
            </li>
        </ul>
    </div>
    <?php
    $sql = "select * from t_memc_kpcc_employee_item, t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension, t_memc_kpcc_quarter 
    where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID and Ei_EMP_ID = '" . $search . "' and Q_Year = '" . $year . "' and Im_Cd_ID = Cd_ID and  
    Cd_Cc_ID = Cc_ID and Ei_Category = 'core' group by Ei_Im_ID";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 0) {
    ?>
        <div class="col-12 mt-3">No Record Found</div>
    <?php
    }
    $i = 0;
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['Cc_name'] . "<br>" . $row['Cd_Name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['Im_Name']; ?></h6>
                    <p class="card-text"><?php echo "Category : " . $row['Ei_Category'] ?></p>
                    <p class="card-text" style="height: 100px;"><?php echo $row['Im_Definition'] ?></p>
                    <a href="#ModalEmpView_<?php echo $i; ?>" data-toggle="collapse" onclick="ViewAllCompetenciesEmp('<?php echo $search; ?>','<?php echo $year; ?>','<?php echo $row['Im_ID'] ?>','<?php echo $i; ?>')" aria-expanded="false" aria-controls="#ModalEmpView_<?php echo $i; ?>">View All</a>
                </div>
            </div>
        </div>
        <div class="collapse col-12 mt-3" id="ModalEmpView_<?php echo $i; ?>">
            <div class="card card-body">
                <div id="ViewAllCompetenciesEmp_<?php echo $i; ?>">

                </div>
            </div>
        </div>
    <?php
        $i++;
    }
    $sql = "select * from t_memc_kpcc_employee_item, t_memc_kpcc_items,t_memc_kpcc_corecompetencies,t_memc_kpcc_competenciesdimension, t_memc_kpcc_quarter 
    where Ei_Quarter_ID = Q_ID and Ei_Im_ID = Im_ID and Ei_EMP_ID = '" . $search . "' and Q_Year = '" . $year . "' and Im_Cd_ID = Cd_ID and  
    Cd_Cc_ID = Cc_ID and Ei_Category = 'sub' group by Ei_Im_ID";
    $result = $conn->query($sql);
    ?>
    <div class="col-12 mt-3">
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item active">
                <h5 class="m-0">Sub - Core Competencies in <?php echo $year; ?></h5>
            </li>
        </ul>
    </div>
    <?php
    if (mysqli_num_rows($result) == 0) {
    ?>
        <div class="col-12">No Record Found</div>
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
                    <a href="#ModalEmpView_<?php echo $i; ?>" data-toggle="collapse" onclick="ViewAllCompetenciesEmp('<?php echo $search; ?>','<?php echo $year; ?>','<?php echo $row['Im_ID'] ?>','<?php echo $i; ?>')" aria-expanded="false" aria-controls="#ModalEmpView_<?php echo $i; ?>">View All</a>
                </div>
            </div>
        </div>
        <div class="collapse col-12 mt-3" id="ModalEmpView_<?php echo $i; ?>">
            <div class="card card-body">
                <div id="ViewAllCompetenciesEmp_<?php echo $i; ?>">

                </div>
            </div>
        </div>
    <?php
        $i++;
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
        <?php 
            for($i=0;$i<count($temp);$i++){
        ?>
            <tr>
                <td style="width: 100px;background-color:cornflowerblue;">Quarter</td>
                <td style="background-color:cornflowerblue;"><?php echo $temp[$i]['Q_Year'] . " - " .  $temp[$i]['Q_Name']; ?></td>
            </tr>
            <tr>
                <td>Score | Target</td>
                <td><?php
                    if ($temp[$i]['Ei_Score'] == "-") {
                        echo " - ";
                    } else {
                        $sql = "select * from t_memc_kpcc_items_lvl_desc where Im_lvl_ID = " . $temp[$i]['Ei_Score'] . "";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        echo $row['Im_lvl_Name'];
                    }
                    echo  ' / ' . $temp[$i]['Im_lvl_Name']; ?></td>
            </tr>
            <tr>
                <td>Action Plan</td>
                <td>
                <div class="row">
                <?php
                $actionplan = $conn -> query("select * from t_memc_kpcc_actionplan where AP_Ei_ID = ".$temp[$i]['Ei_ID']."");
                $k = 0;
                while($temprow = $actionplan -> fetch_assoc()){
                ?>
                    <div class="col-8">
                        <?php echo $temprow['AP_Description']; ?>
                        asdasdsad
                    </div>
                    <div class="col-2">
                        <?php echo $temprow['AP_Date'];?>
                    </div>
                    <div class="col-2">
                        <?php 
                        if($temprow['AP_Status'] == 1){
                            echo "Open";
                        }else if ($temprow['AP_Status'] == 0){
                            echo "Closed";
                        }else{
                            echo "Cancel";
                        }
                        ?>
                    </div>
                    
                <?php
                    $k++;
                    if(mysqli_num_rows($actionplan) - $k != 0){
                    ?>
                        <hr style="width: 100%;">
                    <?php
                    }
                }
                ?>
                </div>
            </td>
            </tr>
        <?php
            }
        ?>
    </table>
<?php
}
?>