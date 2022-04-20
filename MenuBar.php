<script src="Bootstrap4.6.1/jquery3.5.1.slim.min.js"></script>
<script src="Bootstrap4.6.1/bootstrap4.6.1.min.js"></script>
<script src="Bootstrap4.6.1/popper1.6.1.min.js"></script>
<script src="Bootstrap4.6.1/jquery3.6.0.min.js"></script>
<link rel="stylesheet" href="Bootstrap4.6.1/bootstrap4.6.1.css" />
<link href="css/Menuhover.css" rel="stylesheet" media="all">
<nav class="navbar navbar-expand-lg navbar-light bg-ligh">
  <a class="navbar-brand" href="MenuBar.php">LONGI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <!--		Employee-->
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Employee
        </a>
        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
          <li class="dropdown-item"><a href="#">Some action</a></li>
          <li class="dropdown-item"><a href="#">Some other action</a></li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-submenu">
            <a class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a tabindex="-1" href="#">Second level</a></li>
              <li class="dropdown-item"><a href="#">Second level</a></li>
              <li class="dropdown-item"><a href="#">Second level</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--		Competencies-->
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Competencies
        </a>
        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
          <li class="dropdown-submenu">
            <a class="dropdown-item" tabindex="-1" href="#">Major Competencies</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a tabindex="-1" href="#">Add Major Competencies</a></li>
              <li class="dropdown-item"><a href="#">Edit Major Competencies</a></li>
              <li class="dropdown-item"><a href="#">View Major Competencies</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu">
            <a class="dropdown-item" tabindex="-1" href="#">Core Competencies</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a tabindex="-1" href="#">Add Core Competencies</a></li>
              <li class="dropdown-item"><a href="#">Edit Core Competencies</a></li>
              <li class="dropdown-item"><a href="#">View Core Competencies</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu">
            <a class="dropdown-item" tabindex="-1" href="#">Core Competencies Items</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a tabindex="-1" href="#">Add Core Competencies Items</a></li>
              <li class="dropdown-item"><a href="#">Edit Core Competencies Items</a></li>
              <li class="dropdown-item"><a href="#">View Core Competencies Items</a></li>
            </ul>
          </li>
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
              <li class="dropdown-item"><a href="#">View</a></li>
            </ul>
          </li>
          <li class="dropdown-item"><a href="#">Grade</a></li>
          <li class="dropdown-item"><a href="#">Swap</a></li>
          <li class="dropdown-item"><a href="#">View</a></li>
        </ul>
      </div>
      <!--		Additional-->
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Additional
        </a>
        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
          <li class="dropdown-item"><a href="#">Some action</a></li>
          <li class="dropdown-item"><a href="#">Some other action</a></li>
          <li class="dropdown-item"><a href="#">Some other action</a></li>
          <li class="dropdown-item"><a href="#">Some other action</a></li>
        </ul>
      </div>
    </ul>
  </div>
</nav>