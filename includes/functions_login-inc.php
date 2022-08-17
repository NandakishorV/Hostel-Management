<?php

    function emptyInput($email,$pwd,$user){
        if(empty($email) || empty($pwd) || empty($user)){
            return true;
        }
        else{
            return false;
        }
    }
    function userExists($conn,$email){
        $sql = "SELECT * FROM users WHERE emailId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$email);
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
    function facultyExists($conn,$email){
        $sql = "SELECT * FROM faculty WHERE emailId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$email);
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
    function loginUser($conn,$email,$pwd,$user){
        $data=userExists($conn,$email);

        if($data===false){
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        $pwdChk=$data["pwd"];
        if($pwd!==$pwdChk){
            header("location: ../index.php?error=invalidPassword");
            exit();
        }
        else if($pwd===$pwdChk){
            session_start();
            $_SESSION["userId"]=$data["regNo"];
            $_SESSION["user"]="user";
            header("location: ../student.php");
            exit();
        }
    }
    function loginFaculty($conn,$email,$pwd,$user){
        $data=facultyExists($conn,$email);

        if($data===false){
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        $pwdChk=$data["pwd"];
        if($pwd!==$pwdChk){
            header("location: ../index.php?error=invalidPassword");
            exit();
        }
        else if($pwd===$pwdChk){
            session_start();
            $_SESSION["userId"]=$data["f_id"];
            $_SESSION["user"]="warden";
            header("location: ../warden.php");
            exit();
        }
    }
    
?>