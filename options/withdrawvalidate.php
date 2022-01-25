<?php 
session_start(); 
include "..\login\dbconnection.php";
if(isset($_POST['accnum']) && isset($_POST['pin']) && isset($_POST['amount']))
{
    // function validate($data){
    //    $data = trim($data);
    //    $data = stripslashes($data);
    //    $data = htmlspecialchars($data);
    //    return $data;
    // }
    $accno = $_POST['accnum'];
    $pin = $_POST['pin'];
    $amt = $_POST['amount'];
    $sql = "SELECT * FROM users WHERE ACNUM='$accno' AND PIN='$pin'";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result) === 1) { 
            $sql2 = "SELECT BALANCE FROM users WHERE ACNUM='$accno'";
            $result2 = mysqli_query($con,$sql2);   
            $row = mysqli_fetch_array($result2,MYSQLI_ASSOC); 
            if($row['BALANCE']>$amt)
            {
                
                $sql3 = "UPDATE users SET BALANCE=BALANCE-'$amt' where ACNUM ='$accno'"; 
                
                $result3 = mysqli_query($con,$sql3);
                
                if ($result3) {
                    echo "<script type=\"text/javascript\">
                    alert(\"withdraw successful.\");
                    window.location = \"../login/home.html\"
                    </script>";
                }
            }
            else{
                // header("Location: withdraw1.html?error=Balance must be greater than withdrawl amount"); 
                echo "<script type=\"text/javascript\">
                    alert(\"insufficient funds .\");
                    window.location = \"../options/withdraw1.html\"
                    </script>";
                exit();
            }
        }else{
            // header("Location: withdraw1.html?error=Incorect User name or pin"); 
            echo "<script type=\"text/javascript\">
                    alert(\"invalid credentials .\");
                    window.location = \"../options/withdraw1.html\"
                    </script>";
            exit(); 
        }
}else{
    header("Location: withdraw1.html");
    exit(); 
}