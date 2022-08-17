<?php
    function invalid_data($conn,$regno,$hostel_no,$room_no){
        $sql="SELECT * FROM roomdetails WHERE regno = ? AND hostelno = ? AND roomno = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../application.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"iii",$regno,$hostel_no,$room_no);
        mysqli_stmt_execute($stmt);

        $resultData=mysqli_stmt_get_result($stmt);

        if($rs=mysqli_fetch_assoc($resultData)){
            return $rs;
        }
        else{
            $result=false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
    function application_success($conn,$regno,$user_name,$hostel_no,$room_no,$from_date,$from_time,$to_date,$to_time,$reason){
        $stat="PENDING";
        $data=invalid_data($conn,$regno,$hostel_no,$room_no);
        if($data===false){
            header("location: ../application.php?error=invalidData");
            exit();
        }
        else{
            $sql="INSERT INTO gatepass(regno,name,hostel_no,room_no,from_date,from_time,to_date,to_time,reason,stat) VALUES(?,?,?,?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("location: ../application.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt,"isiissssss",$regno,$user_name,$hostel_no,$room_no,$from_date,$from_time,$to_date,$to_time,$reason,$stat);
            mysqli_stmt_execute($stmt);
            header("location: ../history.php");
            exit();
        }
    }

?>