<html>

<head>
    <title>View & Amend</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row m-3">
            <?php
            include "menubar.php";
            ?>
        </div>
        <div class="row justify-content-center m-3">
            <div class="col-4 m-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search by employee id...." id="emp_search_key" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-2 m-3"><button class="form-control btn btn-primary" id="btn_tbl_emp_search" type="button">Search</button></div>
            <div class="col-12 m-1">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <td scope="col">No</td>
                            <td scope="col">Employee</td>
                            <td scope="col">Competencies</td>
                            <td scope="col">To-Do</td>
                            <td scope="col">Target</td>
                            <td scope="col">Quarter</td>
                            <td scope="col">Date</td>
                            <td scope="col">Status</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody id="View_Employee_Item">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="m-5">
                    <form id="Edit_Emp_Item"></form>
                </div>
                <div class="m-5" style="text-align:center">
                    <button type="button" class="btn btn-primary" id="btn_edit_assess">Save</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/Assessment_Assign.js"></script>
    <script src="js/Assessment_Edit.js"></script>
</body>

</html>