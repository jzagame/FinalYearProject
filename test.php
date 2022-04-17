<?php
    error_reporting(0);
    $next = $_POST['next'];
    $previous = $_POST['previous'];
if ($next == "25%" || $previous == "25%") {
?>
    <div class="row justify-content-center">
        <form id="AssignAssessment" class="m-2 col" style="width:75%;">
            <div class="form-group row">
                <label for="Majorical" class="col-2 col-form-label">Major : </label>
                <select class="custom-select form-control col-10" id="Majorical">
                    <option selected>Choose...</option>
                    <option>Personal</option>
                    <option>Professional</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="Position" class="col-2 col-form-label">Position</label>
                <select class="custom-select form-control col-10" id="Position">
                    <option selected>Choose...</option>
                    <option>Position 1</option>
                    <option>Position 2</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="Emp_Name" class="col-2 col-form-label">Name : </label>
                <input type="text" class="col-10 form-control" placeholder="Enter Employee Name to Search....">
            </div>
            <div class="form-group row justify-content-center">
                <button type="submit" id="btn_search" class="btn btn-primary btn-sm">Search</button>
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
                            <td scope="col">Name</td>
                            <td scope="col">Total Core Competencies</td>
                            <td scope="col">Status</td>
                            <td scope="col" style="text-align: center;">Select</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                        ?>
                            <tr>
                                <td scope="col"><?php echo $i + 1; ?></td>
                                <td scope="col">test</td>
                                <td scope="col">test</td>
                                <td scope="col">test</td>
                                <td scope="col" style="text-align: center;"><input type="radio" name="Emp_IC" id="Emp_IC"></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-end">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<?php
}

if ($next == "50%") {
?>
    
<?php
}
?>