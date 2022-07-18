<html>

<head>
    <?php
    error_reporting(0);
    session_start();
    include "../../includes/conn.php";
    ?>
    <title>View Staff</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "../includes/MenuBar.php";
            $id = $_GET['id'];
            ?>
        </div>
        <div class="container-fluid">
            <div class="row justify-contain-center">
                <?php
                $sql = "select DISTINCT Q_Year from t_memc_kpcc_quarter order by Q_Year desc";
                $year_data = $conn->query($sql);
                $sql = "select * from t_memc_staff,t_memc_department where stf_department_id = dpt_id and stf_employee_number = '" . $id . "'";
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
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td> : </td>
                            <td><?php echo $row['stf_name']; ?></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td> : </td>
                            <td id="emp_id"><?php echo $row['stf_employee_number'] ?></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td> : </td>
                            <td><?php echo $row['dpt_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Group of Talent</td>
                            <td> : </td>
                            <td>
                                <?php 
                                    $group_talent = $conn->query("Select * from t_memc_kpcc_employee_category,t_memc_kpcc_category 
                                    where ec_employee_id = '".$id."' and ec_category_id = c_id");
                                    while($gt = $group_talent -> fetch_assoc()){
                                        echo $gt['c_name'] . '<br/>';
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-5">
                    <table class="table">
                        <tr>
                            <td>Personal Grade</td>
                            <td> : </td>
                            <td><?php echo $row['stf_grade']; ?></td>
                        </tr>
                        <tr>
                            <td>Mentor</td>
                            <td> : </td>
                            <td>
                                <?php 
                                    $temp_r = $conn -> query("select * from t_memc_staff where stf_employee_number in (select Report_To_Emp_ID from t_memc_kpcc_report_to 
                                    where RT_Emp_ID = '".$row['stf_employee_number']."')");
                                    
                                    $temp_d = $temp_r -> fetch_assoc();
                                    if(mysqli_num_rows($temp_d) > 0){
                                        echo $temp_d['stf_name'];
                                    }else{
                                        echo "---";
                                    }
                                    
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-1" style="text-align: right;">
                    <select class="form-control" name="" id="year_select" onchange="ChangeYear('<?php echo $row['stf_employee_number']; ?>')">
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
                <div class="col-12">
                    <ul class="list-group mt-4 mb-2">
                        <li class="list-group-item active">
                            <h5 class="m-0">Quarter Report</h5>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <table class="mt-3 table table-bordered" style="width: 100%;" >
                        <tr>
                            <td style="width: 30%;"><b>Quarter</b></td>
                            <td>
                                <select name="report_quarter" id="report_quarter" class="form-control">
                                    
                                </select></td>
                        </tr>
                        <tr>
                            <td><b>个人培养发展定期回顾与反馈表<br/>Report IDP Regular review and feedback form</b></td>
                            <td><button type="button" class="btn btn-primary" style="width: 100px;" onclick="KeyInQuarterReport('<?php echo $id; ?>')">Add</button></td>
                        </tr>
                        <tr>
                            <td><b>报告样本 <br/>Report Demo</b></td>
                            <td><button type="button" class="btn btn-primary" style="width: 100px;" onclick="PrintPdf('<?php echo $id; ?>')">View</button></td>
                        </tr>
                        <tr>
                            <td><b>存档<br/>Save</b></td>
                            <td><button type="button" class="btn btn-primary" style="width: 100px;"  onclick="SavePdf('<?php echo $id; ?>')" disabled>Save</button></td>
                        </tr>
                    </table>
                </div>
                
            </div>
        </div>
    </div><br /><br /><br /><br /><br /><br /><br /><br />
</body>

<script src="../../includes/assest/library/datatables.net/JS/Assessment_View_Employee.js"></script>

</html>