<?php 
session_start(); 
include "..\login\dbconnection.php";
if(isset($_POST['accnum']) && isset($_POST['pin']) && isset($_POST['ac2']) && isset($_POST['amount']))
{
    $accno = $_POST['accnum'];
    $ac2=$_POST['ac2'];
    $pin = $_POST['pin'];
    $amt = $_POST['amount'];
    $sql = "SELECT * FROM users WHERE ACNUM='$accno' AND PIN='$pin'";
    $sqlx="SELECT * FROM users WHERE ACNUM='$ac2'";
        $result = mysqli_query($con,$sql);
        $result2 = mysqli_query($con,$sqlx);
        if (mysqli_num_rows($result) === 1 && mysqli_num_rows($result2) === 1) { 
            $sql2 = "SELECT BALANCE FROM users WHERE ACNUM='$accno'";
            $resultx = mysqli_query($con,$sql2);   
            $row = mysqli_fetch_array($resultx,MYSQLI_ASSOC); 
            if($row['BALANCE']>$amt)
            {
                
                $sql3 = "UPDATE users SET BALANCE=BALANCE-'$amt' where ACNUM ='$accno'"; 
                $sqly="UPDATE users SET BALANCE=BALANCE+'$amt' where ACNUM ='$ac2'";
                $result3 = mysqli_query($con,$sql3);
                $resulty=mysqli_query($con,$sqly);
                if ($result3) {
                    echo "<script type=\"text/javascript\">
                    alert(\"$amt transferred to account number : $ac2 successfully.\");
                    window.location = \"../login/home.html\"
                    </script>";
                }
            }
            else{
                // header("Location: transfer.html?error=Balance must be greater than transfer amount");
                echo "<script type=\"text/javascript\">
                alert(\"insufficient funds.\");
                window.location = \"../login/home.html\"
                </script>";
                exit();
            }
        }else{
            echo "<script type=\"text/javascript\">
            alert(\"invalid credentials.\");
            window.location = \"../login/home.html\"
            </script>";
            //header("Location: transfer.html?error=Incorect User name or pin");
            exit(); 
        }
}else{
    header("Location: transfer.html");
    exit(); 
}