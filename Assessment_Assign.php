<html>

<head>
    <title>Assign Competencies</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            include "Menubar.php";
            ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="progress m-2">
                    <div id="progress_Ass" class="progress-bar" role="progressbar" style="width: 33%;visibility:hidden" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">33%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="Assessment_content">

    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-6">
                <button type="button" id="btn_previous" style="visibility:hidden" class="btn btn-primary btn-sm" style="width: 100px;">Previous</button>
            </div>
            <div class="col-3">
                <button type="button" id="btn_submit" class="btn btn-primary btn-sm" style="width: 100px;visibility:hidden">Submit</button>
            </div>
            <div class="col-3">
                <button type="button" id="btn_next" class="btn btn-primary btn-sm float-right" style="width: 100px;">Next</button>
            </div>
        </div>
    </div>
</body>

<script src="javascript/Assessment_Assign.js"></script>

</html>