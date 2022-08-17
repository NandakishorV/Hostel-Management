<?php
    if(isset($_POST["approve"])){
        $selected=$_POST["selected"];
        $i = 0;
        require_once 'dbh-inc.php';
        while($i<sizeof($selected)){
            $sql = "UPDATE gatepass SET stat='APPROVED' WHERE g_id= ? ;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("location: ../approve.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt,"i",$selected[$i]);
            mysqli_stmt_execute($stmt);
            $i++;
        }
        header("location: ../approve.php");
    }
    else if(isset($_POST["deny"])){
        $selected=$_POST["selected"];
        $i = 0;
        require_once 'dbh-inc.php';
        while($i<sizeof($selected)){
            $sql = "UPDATE gatepass SET stat='DENIED' WHERE g_id= ? ;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("location: ../approve.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt,"i",$selected[$i]);
            mysqli_stmt_execute($stmt);
            $i++;
        }
        header("location: ../approve.php");
    }
?>