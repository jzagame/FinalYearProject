<?php
session_start();
?>
<script src="../../includes/assest/JS/jquery3.5.1.slim.min.js"></script>
<script src="../../includes/assest/JS/bootstrap4.6.1.min.js"></script>
<script src="../../includes/assest/JS/popper1.6.1.min.js"></script>
<script src="../../includes/assest/JS/jquery3.6.0.min.js"></script>

<link rel="stylesheet" href="../../includes/assest/CSS/bootstrap4.6.1.css" />
<link href="css/Menuhover.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="../../includes/assest/CSS/open-iconic-master/font/css/open-iconic-bootstrap.css"/>
<link href="../../includes/assest/library/datatables.net/CSS/Menuhover.css" rel="stylesheet" media="all">
<nav class="navbar navbar-expand-lg navbar-light bg-ligh">

<a class="navbar-brand" href="index.php">LONGi</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav">
<!--		Employee-->
<div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
    <!--		Employee-->
    <div class="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Employee </a>
      <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
        <!-- <li class="dropdown-item"><a href="#">Some action</a></li>
                <li class="dropdown-item"><a href="#">Some other action</a></li>
                <li class="dropdown-divider"></li> -->
        <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Access right</a>
          <ul class="dropdown-menu">
            <li class="dropdown-item" role="button" onclick="location='Employee_CreatePosition.php'">Add</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_ViewEditPosition.php'">View/Edit</li>
          </ul>
        </li>
        <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Department</a>
          <ul class="dropdown-menu">
            <li class="dropdown-item" role="button" onclick="location='Employee_CreateDepartment.php'">Add</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_ViewEditDepartment.php'">View/Edit</li>
          </ul>
        </li>
        <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Employee</a>
          <ul class="dropdown-menu">
            <li class="dropdown-item" role="button" onclick="location='Employee_AddEmployee.php'">Add</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_RemoveEmployee.php'">Remove</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_AssignPosition.php'">Assign Access Right</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_ViewEditAssign.php'">View/Edit Access Right</li>
          </ul>
        </li>
        <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Profile</a>
          <ul class="dropdown-menu">
            <li class="dropdown-item" role="button" onclick="location='Employee_AddProfile.php'">Add</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_ViewEditProfile.php'">View/Edit</li>
          </ul>
        </li>
        <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Category</a>
          <ul class="dropdown-menu">
            <li class="dropdown-item" role="button" onclick="location='Employee_AddCategory.php'">Add</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_ViewEditCategory.php'">View/Edit</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_AddNewCategory.php'">Assign New Category</li>
            <li class="dropdown-item" role="button" onclick="location='Employee_EditCategory.php'">Edit Employee Category</li>
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
	  			                  <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Action plan type</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item" role="button" onclick="location='competencies_addpt.php'">Create plan type</li>
                    <li class="dropdown-item" role="button" onclick="location='competencies_searchpt.php'">View/Edit plan type</li>
                  </ul>
                </li>
      <li class="dropdown-submenu"> <a class="dropdown-item" tabindex="-1" href="#">Quarter</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item" role="button" onclick="location='competencies_addquarter.php'">Create quarter</li>
                    <li class="dropdown-item" role="button" onclick="location='competencies_searchquarter.php'">View/Edit quarter</li>
                  </ul>
                </li>
        <li class="dropdown-item" role="button" onclick="location='competencies_importexcel.php'">Import Excel (.csv)</li>
      </ul>
    </div>
    <!--		Employee Traning-->
    <div class="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="Assessment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Learning </a>
      <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="Assessment">
        <li class="dropdown-item" role="button" onclick="location='../main/Assessment_Assign.php'">Assign Items</li>
        <li class="dropdown-item" role="button" onclick="location='../main/Assessment_View_Employee.php'">View Items</li>
      </ul>
    </div>
    <!--		Additional-->
    <div class="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Additional </a>
      <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
        <li class="dropdown-item"><a href="ImportStaff.php">Import Staff</a></li>
        <li class="dropdown-item"><a href="ImportDepartment.php">Import Department</a></li>
        <li class="dropdown-item"><a href="ImportPosition.php">Import Position</a></li>
        <li class="dropdown-item"><a href="#">Some other action</a></li>
      </ul>
    </div>
  </ul>
</div>
</nav>
