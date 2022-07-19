<html>

<head>
    <?php
    error_reporting(0);
    session_start();
    
    ?>
    <title>Search Employee</title>
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
            ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center" id="Assessment_content">

        </div>
        <div class="row m-0 mt-5" id="pagination_emp_container">
            <div class="col-12">
                <ul class="pagination" id="pagination_emp">

                </ul>
            </div>
        </div>
    </div><br/><br/><br/><br/>


    <script src="../../includes/assest/library/datatables.net/JS/Assessment_Search_Add_Employee.js"></script>

</body>

</html>