<?php
$number = $_POST['num'];
$next = $_POST['next'];
if ($next == "50%") {
?>
    <div id="card_<?php echo $number; ?>" class="row">
        <table class="table" style="text-align: center;">
            <tr>
                <td scope="col" style="width: 10%;"><label for="Com<?php echo $num; ?>" class="col-form-label">Competencies:</label></td>
                <td scope="col">
                    <Select class="custom-select form-contorl" id="Com<?php echo $num; ?>">
                        <option selected>choose...</option>
                        <option>Competencies 1</option>
                        <option>Competencies 2</option>
                    </Select>
                </td>
                <td scope="col" style="width:5%;"><label for="Cat<?php echo $num; ?>" class="col-form-label">Category</label></td>
                <td scope="col">
                    <Select class="custom-select form-control" id="Cat<?php echo $num; ?>">
                        <option selected>choose...</option>
                        <option>Core Competencies</option>
                        <option>Sub-Core Competencies</option>
                    </Select>
                </td>
                <td scope="col" style="width:5%;"><label for="l<?php echo $num; ?>" class="col-form-label">Target</label></td>
                <td scope="col" style="width:10%;"><input type="text" class="form-control" id="l<?php echo $num; ?>" placeholder="Score.."></td>
            </tr>
            <tr>
                <td scope="col"><label for="I<?php echo $num; ?>" class="col-form-label">Item</label></td>
                <td scope="col" colspan="5">
                    <Select class="custom-select form-control" id="I<?php echo $num; ?>">
                        <option selected>choose...</option>
                        <option>Item 1</option>
                        <option>Item 2</option>
                    </Select>
                </td>
            </tr>
            <tr>
                <td scope="col">To-Do</td>
                <td scope="col" colspan="5"><textarea name="" id="" style="width: 100%;height:300px;overflow-y:scroll" rows="30"></textarea></td>
            </tr>
        </table>
        <hr style="width: 70%;text-align:center;">
    </div>
<?php
}
?>