<?php
  include_once 'header_warden.php';
  if(isset($_SESSION["userId"])){
    if($_SESSION["user"]!="warden"){
      header("Location: ./denial.php");
    }
}
else{
    header("Location: ./index.php");
  }
?>
    <div class="main-content">
        <div class="container">
            <h2>Defaulter List</h2>
            <!--Add of dynamic content-->
        </div>
        <div id="tiles" class="row">
            <div class="container">
                <div class="col-md-4 col-sm-12 col-xs-12">
                <a href="approve.php"><div id="approve-tile"><span>Approve Gate Pass</span></div></a>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                <a href="search.php"><div id="search-tile"><span>Student Details</span></div></a>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                <a href="w_attendance.php"><div id="attd-tile"><span>Attendance</span></div></a>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>