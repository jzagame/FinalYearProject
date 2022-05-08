<html>

<head>
    <?php
    error_reporting(0);
    session_start();
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
    <div class="container-fluid mt-3">
        <div class="row">
            <?php
            include "../includes/Menubar.php";
            ?>
        </div>
    </div>
    <div class="container-fluid" id="body1">
        <div id="progress_Ass" style="width: 33%;display:none" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">33%</div>
        <div class="row justify-content-center" id="Assessment_content">

        </div>
        <div class="row m-0 mt-5" id="pagination_emp_container">
            <div class="col-12">
                <ul class="pagination" id="pagination_emp">

                </ul>
            </div>
        </div>
        <div class="row m-0 mt-5 mb-5" id="btn_add_container" style="display: none;">
            <div class="col-12" style="text-align: center;">
                <button type="button" id="btn_add" style="display:none" class="btn btn-primary btn-sm" style="width: 200px;">+ Add New Competencies</button>
            </div>
        </div>
        <div class="row m-0 mt-5 mb-5">
            <div class="col-5">
                <button type="button" id="btn_previous" style="display:none" class="btn btn-primary btn-sm" style="width: 100px;">Previous</button>
            </div>
            <div class="col-2">
                <button type="button" id="btn_submit" class="btn btn-primary btn-sm" style="width: 100px;display:none">Submit</button>
            </div>
            <div class="col-4">
                <button type="button" id="btn_next" class="btn btn-primary btn-sm float-right" style="width: 100px;">Next</button>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="ModalEmpView" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style=visibility:hidden>Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ViewAllCompetenciesEmp">

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" style="visibility: hidden;">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../../includes/assest/library/datatables.net/JS/Assessment_Assign.js"></script>
<script src="../../includes/assest/library/datatables.net/JS/Assessment_View_Employee.js"></script>

</html>