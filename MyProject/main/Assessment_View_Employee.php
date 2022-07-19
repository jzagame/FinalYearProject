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
            include "../includes/MenuBar.php";

            ?>
        </div>
        <div class="container-fluid" id="iwantprint">
            <div class="row justify-content-center" id="body1">
                <div class="col-5 mt-3">
                    <input type="text" class="form-control" placeholder="Enter Staff ID To Search ...." name="search_stf" id="search_stf">
                </div>
                <div class="col-2 mt-3">
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Staff ID</td>
                                    <td>Staff Name</td>
                                    <td>Department</td>
                                    <td>Group of Talent</td>
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
    <!-- <div class="collapse" id="ModalEmpView">
        <div class="card card-body">
            <div id="ViewAllCompetenciesEmp">

            </div>
        </div>
    </div> -->
    <div class="container-fluid mt-5" style="height: 50px;">

    </div>
    <script src="../../includes/assest/library/datatables.net/JS/Assessment_Search_Employee.js"></script>
</body>

</html>