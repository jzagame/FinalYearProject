<html>

<head>
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
        <div class="row  m-3">
            <?php
            include "Menubar.php";
            ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="progress m-3">
                    <div id="progress_Ass" class="progress-bar" role="progressbar" style="width: 33%;display:none" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">33%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="Assessment_content">

    </div>
    <div class="container mt-5" id="pagination_emp_container">
        <div class="row">
            <ul class="pagination" id="pagination_emp">

            </ul>
        </div>
    </div>
    <div class="container mt-5 mb-5" id="btn_add_container" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-5">

            </div>
            <div class="col-4">
                <button type="button" id="btn_add" style="display:none" class="btn btn-primary btn-sm" style="width: 200px;">+ Add New Competencies</button>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
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
</body>

<script src="javascript/Assessment_Assign.js"></script>

</html>