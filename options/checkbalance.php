<?php 
session_start(); 
include "..\login\dbconnection.php";
if(isset($_POST['accnum']) && isset($_POST['pin']))
{
    $accno = $_POST['accnum'];
    $pin = $_POST['pin'];
    $sql = "SELECT * FROM users WHERE ACNUM='$accno' AND PIN='$pin'";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result) === 1) { 
            $sql2 = "SELECT BALANCE FROM users WHERE ACNUM='$accno'";
            $result2 = mysqli_query($con,$sql2);   
            $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
            $r1=$row['BALANCE'];     
            
                // if ($result2) {
                    echo "<script type=\"text/javascript\">
                    alert(\" balance in your account number $accno is $r1 .\");
                    window.location = \"../login/home.html\"
                    </script>";
                // }
    
        }else{
            // header("Location: withdraw1.html?error=Incorect User name or pin"); 
            echo "<script type=\"text/javascript\">
                    alert(\"invalid credentials .\");
                    window.location = \"../options/checkbalance.html\"
                    </script>";
            exit(); 
        }
}else{
    header("Location: checkbalance.html");
    exit(); 
}