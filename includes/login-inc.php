<?php

    if(isset($_POST["Login"])){
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $user = $_POST["user"];

        require_once 'dbh-inc.php';
        require_once 'functions_login-inc.php';

        if(emptyInput($email,$pwd,$user)!==false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($user==="student"){
            loginUser($conn,$email,$pwd,$user);
        }
        else if($user==="warden"){
            loginFaculty($conn,$email,$pwd,$user);
        }
    }
    else{
        header("location: ../index.php");
    }
?>