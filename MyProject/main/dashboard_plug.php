<?php
session_start();
error_reporting(0);
include("../../includes/conn.php");
$action = $_POST['action'];

if ($action == "PieChart_Data") { //find the completeness of the core competencies -- status 0 == complete in t_memc_kpcc_employee_item
    $type = $_POST['type']; // received type year | quarter
    $key = $_POST['key']; // if type is year (Exp:2022,2021) / type == quarter (Exp:Q_ID - 1,2,3,4)
    $category = $_POST['category'];
    $sql = "select COUNT(DISTINCT Ei_Im_ID) as total,Ei_EMP_ID from t_memc_kpcc_category,t_memc_kpcc_employee_category,t_memc_kpcc_quarter,t_memc_kpcc_employee_item where Q_ID = Ei_Quarter_ID and Ei_Category = 'core' 
    and Ei_Status = 0 and ec_employee_id = Ei_EMP_ID and c_id = " . $category . " and c_id = ec_category_id and Ei_Quarter_ID = Q_ID";
    if ($type == "All") {
        $sql .= " and Q_Year = '" . $key . "'";
    } else {
        $sql .= " and Q_ID = " . $key . "";
    }
    $sql .= " group by Ei_EMP_ID order by total asc";
    
    $result = $conn->query($sql);
    $temp = array();
    $empid = array();
    while ($data = $result->fetch_assoc()) {
        $temp[] = $data['total'];
        $empid[] = $data['Ei_EMP_ID'];
    }
    $sql = "select DISTINCT Ei_EMP_ID from t_memc_kpcc_category,t_memc_kpcc_employee_category,t_memc_kpcc_quarter,t_memc_kpcc_employee_item where 
    Ei_Status != 0 and ec_employee_id = Ei_EMP_ID and c_id = " . $category . " and c_id = ec_category_id and Ei_Quarter_ID = Q_ID";
    if ($type == "All") {
        $sql .= " and Q_Year = '" . $key . "'";
    } else {
        $sql .= " and Q_ID = " . $key . "";
    }
    for ($i = 0; $i < count($empid); $i++) {
        $sql .= " and Ei_Emp_ID != '" . $empid[$i] . "'";
    }
    $result = $conn->query($sql);
    while ($no_core_emp = $result->fetch_assoc()) {
        $temp[] = 0;
    }
    echo json_encode(array_count_values($temp));
}

if ($action == "dash_quarter_select_box") { //quarter(selection box) show on pie chart top right corner
    $year = $_POST['dash_year'];
    $result = $conn->query("select * from t_memc_kpcc_quarter where Q_Year = '" . $year . "' and Q_Status = 1 order by Q_Name desc");
?>
    <option value="All" selected>All</option>
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
        <option value="<?php echo $row['Q_ID'] ?>"><?php echo $row['Q_Name']; ?></option>
        <?php
    }
}
if ($action == "ShowPieChartDataInTableForm") {
    $totalcore = $_POST['totalcore'];
    $key = $_POST['key'];
    $category = $_POST['category'];
    $empid = array();
    $sql = "select COUNT(DISTINCT Ei_Im_ID) as total,Ei_EMP_ID from t_memc_kpcc_category,t_memc_kpcc_employee_category,t_memc_kpcc_quarter,t_memc_kpcc_employee_item 
    where Q_ID = Ei_Quarter_ID and Ei_Category = 'core' and ec_employee_id = Ei_EMP_ID and c_id = " . $category . " and c_id = ec_category_id";
    if ($_POST['type'] == "All") {
        $sql .= " and Q_Year = '" . $key . "'";
    } else {
        $sql .= " and Q_ID = " . $key . "";
    }
    if($totalcore != "All"){
        $sql .= " and Ei_Status = 0";
    }
    $sql .= " GROUP BY Ei_EMP_ID order by total asc";
    $result = $conn->query($sql);
    if ($totalcore == "All" || $totalcore == "0") {
        while ($temp = $result->fetch_assoc()) {
            $empid[] = $temp['Ei_EMP_ID'];
        }
    } else {
        while ($temp = $result->fetch_assoc()) {
            if ($temp['total'] == $totalcore) {
                $empid[] = $temp['Ei_EMP_ID'];
            }
        }
    }

    if ($totalcore == "0") {
        $sql = "select DISTINCT Ei_EMP_ID from t_memc_kpcc_employee_item,t_memc_kpcc_quarter,t_memc_kpcc_employee_category where Ei_Quarter_ID = Q_ID 
        and ec_category_id = " . $category . " and ec_employee_id = Ei_EMP_ID";
        if ($_POST['type'] == "All") {
            $sql .= " and Q_Year = '" . $key . "'";
        } else {
            $sql .= " and Q_ID = " . $key . "";
        }
        for ($i = 0; $i < count($empid); $i++) {
            $sql .= " and Ei_EMP_ID != '" . $empid[$i] . "'";
        }
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $r = $conn->query("select * from t_memc_kpcc_employee_detail,t_memc_staff,t_memc_position,t_memc_department 
            where Emp_ID = '" . $row['Ei_EMP_ID'] . "' and stf_employee_number = Emp_ID and stf_position_id = pos_id and stf_department_id = dpt_id");
            $s = $r->fetch_assoc();
            // echo "<pre>"; print_r($row); echo "</pre>";
        ?>
            <tr>
                <td><?php echo $s['stf_employee_number']; ?></td>
                <td colspan="4"><?php echo $s['stf_name']; ?></td>
                <td colspan="2"><?php echo $s['pos_name']; ?></td>
                <td><?php echo $s['stf_grade']; ?></td>
            </tr>
        <?php
        }
    }else {
        for ($i = 0; $i < count($empid); $i++) {
            $result = $conn->query("select * from t_memc_kpcc_employee_detail,t_memc_staff,t_memc_position,t_memc_department 
            where Emp_ID = '" . $empid[$i] . "' and stf_employee_number = Emp_ID and stf_position_id = pos_id and stf_department_id = dpt_id");
            $row = $result->fetch_assoc();
            // echo "<pre>"; print_r($row); echo "</pre>";
        ?>
            <tr>
                <td><?php echo $row['stf_employee_number']; ?></td>
                <td colspan="4"><?php echo $row['stf_name']; ?></td>
                <td colspan="2"><?php echo $row['pos_name']; ?></td>
                <td><?php echo $row['stf_grade']; ?></td>
            </tr>
<?php
        }
    }
}
?>