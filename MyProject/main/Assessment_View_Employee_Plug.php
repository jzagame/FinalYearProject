<?php
error_reporting(0);
session_start();
include "../../includes/conn.php";
$action = $_POST['action'];
$search = $_POST['search'];
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
        <div class="col-12 mt-3" style="text-align: center;">No Record Found</div>
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
                    <a id="btnExpandHide_<?php echo $i; ?>" href="#ModalEmpView_<?php echo $i; ?>" data-toggle="collapse" onclick="ViewAllCompetenciesEmp('<?php echo $search; ?>','<?php echo $year; ?>','<?php echo $row['Im_ID'] ?>','<?php echo $i; ?>')" aria-expanded="false" aria-controls="#ModalEmpView_<?php echo $i; ?>">Expand</a>
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
        <div class="col-12 mt-3" style="text-align: center;">No Record Found</div>
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
                    <a id="btnExpandHide_<?php echo $i; ?>" href="#ModalEmpView_<?php echo $i; ?>" data-toggle="collapse" onclick="ViewAllCompetenciesEmp('<?php echo $search; ?>','<?php echo $year; ?>','<?php echo $row['Im_ID'] ?>','<?php echo $i; ?>')" aria-expanded="false" aria-controls="#ModalEmpView_<?php echo $i; ?>">Expand</a>
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
        for ($i = 0; $i < count($temp); $i++) {
        ?>
            <tr>
                <td style="width: 100px;background-color:cornflowerblue;">Quarter</td>
                <td style="background-color:cornflowerblue;"><?php echo $temp[$i]['Q_Year'] . " - " .  $temp[$i]['Q_Name']; ?></td>
            </tr>
            <tr>
                <td>Target</td>
                <td><?php echo $temp[$i]['Im_lvl_Name']; ?></td>
            </tr>
            <tr>
                <td>Score</td>
                <td><?php
                    if ($temp[$i]['Ei_Score'] == "-") {
                        echo " - ";
                    } else {
                        $sql = "select * from t_memc_kpcc_items_lvl_desc where Im_lvl_ID = " . $temp[$i]['Ei_Score'] . "";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        echo $row['Im_lvl_Name'];
                    }
                     ?></td>
            </tr>
            <tr>
                <td>Action Plan</td>
                <td>
                    <div class="row">
                        <?php
                        $actionplan = $conn->query("select * from t_memc_kpcc_actionplan where AP_Ei_ID = " . $temp[$i]['Ei_ID'] . "");
                        $k = 0;
                        while ($temprow = $actionplan->fetch_assoc()) {
                        ?>
                            <div class="col-8">
                                <?php echo $temprow['AP_Description']; ?>
                            </div>
                            <div class="col-2">
                                <?php echo $temprow['AP_Date']; ?>
                            </div>
                            <div class="col-2">
                                <?php
                                if ($temprow['AP_Status'] == 1) {
                                    echo "Open";
                                } else if ($temprow['AP_Status'] == 0) {
                                    echo "Closed";
                                } else {
                                    echo "Cancel";
                                }
                                ?>
                            </div>

                            <?php
                            $k++;
                            if (mysqli_num_rows($actionplan) - $k != 0) {
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
if($action == "ReportQuarterSelect"){
    $year = date('Y');
    if($_POST['year_select'] != ""){
        $year = $_POST['year_select'];
    }
    $result = $conn->query("select * from t_memc_kpcc_quarter where Q_Year = '".$year."'");
    while($temp = $result -> fetch_assoc()){
    ?>
        <option value="<?php echo $temp['Q_ID']; ?>"><?php echo $temp['Q_Name'] ?></option>
    <?php
    }
}
if ($action == "testpdf") {
    $_SESSION['text'] = $_POST['text'];
}
