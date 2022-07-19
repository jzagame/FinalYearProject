<html>

<head>
    <?php
    error_reporting(0);
    session_start();
    include "../../includes/conn.php";
    ?>
    <title>Assign Competencies</title>
    <style>
        table {
            table-layout: fixed;
            overflow-wrap: break-word;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "../includes/MenuBar.php";
            $result = $conn -> query("select * from t_memc_staff where stf_employee_number = '".$_GET['id']."'");
            $data = $result -> fetch_assoc();
            ?>
        </div>
    </div>
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center" id="Assessment_content">
            <div class="col-12">
                <ul class="list-group mt-2 mb-2">
                    <li class="list-group-item active">
                        <h5 class="m-0">Staff Information</h5>
                    </li>
                </ul>
                <table class="table table-bordered">
                    <tr>
                        <td>Name : </td>
                        <td><?php echo $data['stf_name'] ?></td>
                    </tr>
                    <tr>
                        <td><label for="emp_id" class="col-form-label">ID: </label></td>
                        <td><input type="text" id="emp_id" disabled value="<?php echo $_GET['id']; ?>" class="form-control"></td>
                    </tr>
                </table>
            </div>
            
        </div>
        <div class="row m-0 mt-5 mb-5" id="btn_add_container">
            <div class="col-12" style="text-align: center;">
                <button type="button" id="btn_add" class="btn btn-primary btn-sm" style="width: 200px;">+ Add New Competencies</button>
            </div>
        </div>
        <div class="row m-0 mt-5 mb-5">
            <div class="col-12" style="text-align: center;">
                <button type="button" id="btn_submit" class="btn btn-primary btn-sm" style="width: 100px;">Submit</button>
                <button type="button" id="btn_previous" class="btn btn-primary btn-sm" style="width: 100px;">Previous</button>
            </div>
        </div>
    </div>
</body>

<script src="../../includes/assest/library/datatables.net/JS/Assessment_Assign.js"></script>


</html>