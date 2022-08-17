<?php 
session_start();
$activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
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
                <a href="warden.php" class="pull-left visible-md visible-lg">
                  <div id="logo-img"></div>
                </a>
                <div class="navbar-brand">
                  <a href="warden.php"><h1>Hostel Management System</h1></a>
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
                    <li class="<?= ($activePage == 'approve') ? 'active':''; ?>">
                      <a href="approve.php">
                        <span class="glyphicon glyphicon-inbox"></span><br class="hidden-xs">View</a>
                    </li>
                    <li class="<?= ($activePage == 'search') ? 'active':''; ?>">
                     <a href="search.php">
                       <span class="glyphicon glyphicon-search"></span><br class="hidden-xs">Search</a>
                    </li>
                    <li class="<?= ($activePage == 'wattendance') ? 'active':''; ?>">
                      <a href="w_attendance.php">
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