<?php
error_reporting(0);
include "database/conn.php";
$next = $_POST['next'];
$previous = $_POST['previous'];
if ($next == "33%" || $previous == "33%") {
?>
    <div class="row justify-content-center">
        <form id="AssignAssessment" class="m-2 col" style="width:75%;">
            <div class="form-group row">
                <label for="Position" class="col-2 col-form-label">Position</label>
                <select class="custom-select form-control col-10" id="Position">
                    <option value="blank" selected>Choose...</option>
                    <?php
                    $sql = "select * from position where P_level < '5' and P_Status = 'A'"; //need to change future , "5" to the user next level, exclude admin
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row['P_ID']; ?>"><?php echo $row['P_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group row">
                <label for="employee_id" class="col-2 col-form-label">Employee ID : </label>
                <input type="text" class="col-10 form-control" id="employee_id" placeholder="Enter Employee ID to Search....">
            </div>
            <div class="form-group row justify-content-center">
                <button type="button"  onclick="Search()" class="btn btn-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col">No</td>
                            <td scope="col">ID</td>
                            <td scope="col">Department</td>
                            <td scope="col">Status</td>
                            <td scope="col" style="text-align: center;">Select</td>
                        </tr>
                    </thead>
                    <tbody id="show_emp_detail">
                        
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-end">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
}

if ($next == "66%" || $previous == "66%") {
?>
    <div class="row">
        <table class="table">
            <tr>
                <td>Name : </td>
                <td>--------</td>
            </tr>
            <tr>
                <td><label for="emp_id" class="col-form-label">ID: </label></td>
                <td><input type="text" id="emp_id" disabled value="<?php echo $_POST['empid']; ?>" class="form-control"></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h3 class="mt-3"><b><u>Core Competencies History</u></b></h3>
        <table class="table">
            <thead>
                <tr>
                    <td scope="col">Competencies</td>
                    <td scope="col">Item</td>
                    <td scope="col">Score</td>
                    <td scope="col">Target</td>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < 5; $i++) {
                ?>
                    <tr>
                        <td scope="col">test</td>
                        <td scope="col">test</td>
                        <td scope="col">test</td>
                        <td scope="col">test</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h3 class="mt-3"><b><u>Add Competencies</u></b></h3><br>
        <div class="col-12">
            <form id="Competencies_Card"></form>
        </div>
    </div>
<?php
}
?>