<?php
session_start();
include("connect.php");
if(($_POST['un']!="") and ($_POST['psd']!="")) {      
        $uname = $_POST['un'];    
        $pwd = $_POST['psd'];          
    } else {
        $_SESSION['empty'] = "Username and Password shouldn't be empty";
        header("location:login.php");  
    }  
    echo $qry = "select * from register where un = '$uname' and psd='$pwd'";
    $result = mysqli_query($connection,$qry);
    echo $num_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($num_rows == 0) {
        $_SESSION['invalid'] = "Invalid User";
        header("location:login.php");
    }else
    {
        if($row['role'] == "1") {          
            $_SESSION['fn']=$row['fn'];
            header("location:LogAdmin.php");
        }
        elseif($row['role'] == "2")
        {
            $qry1 = "select * from register where un = '".$_POST['un']."' and psd = '".$_POST['psd']."' ";
                $_SESSION['fn']=$row['fn'];
                $_SESSION['uid']=$row['uid'];
                 $_SESSION['mid']=$row['mid'];
                //   $_SESSION['phoneNumber']=$row['phoneNumber'];
                header("location:LogUsr.php");
            }
            else
            {
                echo "invalid";
            }
    }
    ?>
 
<!DOCTYPE html>
<html lang="en">
    <head>.
        <meta charset="utf-8" />
        <title>Validate</title>
    </head>
    <body>       
    </body>
</html>
