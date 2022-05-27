<html>

<head>
    <?php
    error_reporting(0);
    session_start();
    ?>
    <title>
        View Employee Data
    </title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "../includes/Menubar.php";
            ?>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center" id="body1">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Enter Staff ID To Search ...." name="search_stf" id="search_stf">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary form-control" type="button" id="btn_search_emp" name="btn_search_emp">Search</button>
                </div>
                <div class="col-12">
                    <ul class="list-group mt-2 mb-2">
                        <li class="list-group-item active">
                            <h5 class="m-0">Staff</h5>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Staff ID</td>
                                    <td>Staff Name</td>
                                    <td>Department</td>
                                    <!-- <td>Position</td> -->
                                    <td>Email</td>
                                    <td>View</td>
                                </tr>
                            </thead>
                            <tbody id="Search_Employee_table">

                            </tbody>
                            <tr>
                                <td colspan="6">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination" id="pageNum">

                                        </ul>
                                    </nav>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
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
    <script src="../../includes/assest/library/datatables.net/JS/Assessment_View_Employee.js"></script>
</body>

</html>