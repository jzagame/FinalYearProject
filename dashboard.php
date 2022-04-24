<!doctype html>
<?php 
    session_start();
    error_reporting(0);
    include ("database/database.php");
	include("MenuBar.php");
?>

<html>
<head>
<meta charset="utf-8">
    <title>KKPC</title>

</head>
<?php 
	
?>
<body>
	<div class="row">
                    <div class="col-12">
                        <div class="card ml-5">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Score</h4>
									<div class="ml-auto">
                                        <div class="dropdown sub-dropdown">

                                            <form>
  <select id="cars" name="cars">
    <option value="volvo">Mr Lawrence</option>
    <option value="saab">Mr Chin</option>
    <option value="fiat">Mr Wong</option>
    <option value="audi">Mr Ling</option>
  </select>
</form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Emp Name</th>
      <th scope="col" style="vertical-align:middle">Emp ID</th>
      <th scope="col" style="vertical-align:middle">Detail of Core</th>
	  <th scope="col">Annual Target</th>
		<th scope="col">Q1 Score</th>
		<th scope="col">Annual Target</th>
		<th scope="col">Q2 Score</th>
		<th scope="col">Annual Target</th>
		<th scope="col">Q3 Score</th>
		<th scope="col">Annual Target</th>
		<th scope="col">Q4 Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Alex Ngie Guan Ming</td>
      <td>102765738</td>
      <td>Core Competencies</td>
		<td style="text-align:center">5</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">4</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">3</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">2</td>
		<td style="text-align:center">1</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Ivan Ling Hou Heng</td>
      <td>102765369</td>	
      <td>Core Competencies</td>
		<td style="text-align:center">5</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">4</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">3</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">2</td>
		<td style="text-align:center">1</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lu Si Wei</td>
      <td>102765369</td>	
      <td>Core Competencies</td>
		<td style="text-align:center">5</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">4</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">3</td>
		<td style="text-align:center">1</td>
		<td style="text-align:center">2</td>
		<td style="text-align:center">1</td>
    </tr>
  </tbody>
</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  </div>
</body>
</html>