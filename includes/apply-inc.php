<?php
    if(isset($_POST["apply"])){
        $regno=$_POST["regno"];
        $user_name = $_POST["user_name"];
        $hostel_no = $_POST["hostel_no"];
        $room_no = $_POST["room_no"];
        $from_date = $_POST["from_date"];
        $from_time = $_POST["from_time"];
        $to_date = $_POST["to_date"];
        $to_time = $_POST["to_time"];
        $reason = $_POST["reason"];

        require_once 'dbh-inc.php';
        require_once 'functions_apply-inc.php';

        if(date("Y-m-d")>$from_date || date("Y-m-d")>$to_date || $from_date>$to_date){
            header("location: ../application.php?error=incorrectDate");
            exit();
        }
        else{
            application_success($conn,$regno,$user_name,$hostel_no,$room_no,$from_date,$from_time,$to_date,$to_time,$reason);
        }
    }
    else{
        header("location: ../application.php");
            exit();
    }
?>