<?php 
    session_start();
    include '../connection.php';
    
    if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){

        //mysqli real escape prevent from sql injection which filter the user input
        $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
        $password=mysqli_real_escape_string($conn,$_REQUEST['password']);
        $qr=mysqli_query($conn,"select * from user where email='".$email."' and password='".$password."'");

        if(mysqli_num_rows($qr)>0){
            $data=mysqli_fetch_assoc($qr);
            $_SESSION['isAuth']=true;
            //$_SESSION['role']=$data['role'];
           
            header("Location:../index.php");
            

        }
        else{
            header("Location:../LoginPage.php?error=Invalid Login Details");		
        }
    }
    else{
        header("Location:../LoginPage.php?error=Please Enter Email and Password");
    }

?>