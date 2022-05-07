<script src="../../includes/assest/JS/jquery3.5.1.slim.min.js"></script>
<script src="../../includes/assest/JS/bootstrap4.6.1.min.js"></script>
<script src="../../includes/assest/JS/popper1.6.1.min.js"></script>
<script src="../../includes/assest/JS/jquery3.6.0.min.js"></script>

<link rel="stylesheet" href="../../includes/assest/CSS/bootstrap4.6.1.css" />
<link href="../../includes/assest/library/datatables.net/CSS/Menuhover.css" rel="stylesheet" media="all">

<div class="container">
  <div class="row">
    <div class="justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-ligh"> <a class="navbar-brand" href="index.php">LONGi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <!--		Employee-->
            <div class="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Employee </a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-submenu">
                  <a class="dropdown-item" tabindex="-1" href="#">Position Category</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a tabindex="-1" href="Employee_CreatePosition.php">Create</a></li>
                    <li class="dropdown-item"><a href="Employee_ViewEditPosition.php">View/Edit</a></li>
                  </ul>
                </li>

                <li class="dropdown-submenu">
                  <a class="dropdown-item" tabindex="-1" href="#">Department</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a tabindex="-1" href="Employee_CreateDepartment.php">Add</a></li>
                    <li class="dropdown-item"><a href="Employee_ViewEditDepartment.php">View/Edit</a></li>
                  </ul>
                </li>

                <li class="dropdown-submenu">
                  <a class="dropdown-item" tabindex="-1" href="#">Employee</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a tabindex="-1" href="Employee_AddEmployee.php">Add</a></li>
                    <li class="dropdown-item"><a href="Employee_RemoveEmployee.php">Remove</a></li>
                    <li class="dropdown-item"><a href="Employee_AssignPosition.php">Assign Position</a></li>
                    <li class="dropdown-item"><a href="#">View/Edit Position</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <!--		Competencies-->
            <div class="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Competencies </a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1">Core Competencies</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item" role="button" onclick="location='competencies_addcore.php'">Create Core Competencies</li>
                    <li class="dropdown-item" role="button" onclick="location='competencies_searchcore.php'">View/Edit Core Competencies</a></li>
                  </ul>
                </li>
                <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Competencies Dimension</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item" role="button" onclick="location='competencies_addcd.php'">Create Competencies Dimension</li>
                    <li class="dropdown-item" role="button" onclick="location='competencies_searchcd.php'">View/Edit Competencies Dimension</li>
                  </ul>
                </li>
                <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Items</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item" role="button" onclick="location='competencies_additems.php'">Create Item</li>
                    <li class="dropdown-item" role="button" onclick="location='competencies_searchitems.php'">View/Edit Items</li>
                  </ul>
                </li>
                <li class="dropdown-item" role="button" onclick="location=''">Import Excel (.csv)</li>
              </ul>
            </div>
            <!--		Employee Traning-->
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Assessment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Learning
        </a>
        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="Assessment">
          <li class="dropdown-submenu">
            <a class="dropdown-item">Competencies</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a tabindex="-1" href="Assessment_Assign.php">Assign</a></li>
              <li class="dropdown-item"><a href="Assessment_amend.php">Amend</a></li>
            </ul>
          </li>
          <li class="dropdown-item"><a href="#">Grade</a></li>
        </ul>
      </div>
            <!--		Additional-->
            <div class="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Additional </a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-item" role="button" onclick="location=''">Some action</li>
                <li class="dropdown-item" role="button" onclick="location=''">Some other action</li>
                <li class="dropdown-item" role="button" onclick="location=''">Some other action</li>
                <li class="dropdown-item" role="button" onclick="location=''">Some other action</li>
              </ul>
            </div>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
