<html>

<head>
    <title>Assign Competencies</title>
</head>

<body>
    <?php
    include "Menubar.php";
    ?>
    <div class="progress m-2">
        <div id="progress_Ass" class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>
    <div class="container" id="Assessment_content">
        
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <button type="button" id="btn_previous" style="visibility:hidden" class="btn btn-primary btn-sm">Previous</button>
            </div>
            <div class="col-6">
                <button type="button" id="btn_next" class="btn btn-primary btn-sm float-right">Next</button>
            </div>
        </div>
    </div>
</body>

<script src="javascript/Assessment_Assign.js"></script>

</html>