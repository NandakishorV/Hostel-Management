<?php
  include_once 'header_student.php';
  if(isset($_SESSION["userId"])){
    if($_SESSION["user"]!="user"){
      header("Location: ./denial.php");
    }
}
else{
  header("Location: ./index.php");
}
?>

  <div id="main-content" class="container">
    <div id="tiles" class="row">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <a href="application.php"><div id="appl-tile"><span>Apply Gate Pass</span></div></a>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <a href="history.php"><div id="hist-tile"><span>Gate Pass Details</span></div></a>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <a href="attendance.php"><div id="attd-tile"><span>Attendance</span></div></a>
      </div>
    </div>
  </div>

  </body>
</html>
