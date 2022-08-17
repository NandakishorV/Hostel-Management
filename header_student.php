<?php 
session_start();
$activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"> 
              <a href="student.php" class="pull-left visible-md visible-lg">
                <div id="logo-img"></div>
              </a>
              <div class="navbar-brand">
                <a href="student.php"><h1>Hostel Management System</h1></a>
              </div>
              <button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="collapsable-nav" class="collapse navbar-collapse">
                <ul id="nav-list" class="nav navbar-nav navbar-right">
                 <li class="<?= ($activePage == 'application') ? 'active':''; ?>">
                   <a href="application.php">
                     <span class="glyphicon glyphicon-envelope"></span><br class="hidden-xs">Apply</a>
                 </li>
                 <li class="<?= ($activePage == 'history') ? 'active':''; ?>">
                   <a href="history.php">
                     <span class="glyphicon glyphicon-list-alt"></span><br class="hidden-xs">View</a>
                 </li>
                 <li class="<?= ($activePage == 'attendance') ? 'active':''; ?>">
                   <a href="attendance.php">
                     <span class="glyphicon glyphicon-calendar"></span><br class="hidden-xs">Attendance</a>
                 </li>
                 <li>
                  <a href="includes/logout-inc.php">
                  <span class="glyphicon glyphicon-home"></span><br class="hidden-xs">logout</a>
              </li>
              <li>
                <?php
                  if(isset($_SESSION["userId"])){
                    echo "<p id='uid'>Hi, " . $_SESSION["userId"] . "</p>";
                  }
                ?>
              </li>
               </ul><!-- #nav-list -->
             </div><!-- .collapse .navbar-collapse -->
        </div>
    </nav>
  </header>