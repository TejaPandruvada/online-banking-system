<?php 
session_start(); 
include "..\login\dbconnection.php";
if(isset($_POST['accnum']) && isset($_POST['pin']) && isset($_POST['amount']))
{
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $accno = validate($_POST['accnum']);
    $pin = validate($_POST['pin']);
    $amt = validate($_POST['amount']);
    $sql = "SELECT * FROM users WHERE ACNUM='$accno' AND PIN='$pin'";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result) === 1) { 
                // $r1=$row['BALANCE'];
                $sql3 = "UPDATE `users` SET `BALANCE`=BALANCE+'$amt' where `ACNUM` ='$accno'"; 
                // UPDATE `users` SET `BALANCE`='[value-5]' WHERE `ACNUM`=''
                $result3 = mysqli_query($con,$sql3);
                 if ($result3) {
                    
                    echo "<script type=\"text/javascript\">
                    alert(\"deposit successful.\");
                    window.location = \"../login/home.html\"
                    </script>";
                }
            }
            
        else{
            // header("Location: deposit.html?error=Incorect User name or pin"); 
            echo "<script type=\"text/javascript\">
                    alert(\"invalid credentials .\");
                    window.location = \"../options/deposit.html\"
                    </script>";
            exit(); 
        }
}else{
    header("Location: deposit.html");
    exit(); 
}