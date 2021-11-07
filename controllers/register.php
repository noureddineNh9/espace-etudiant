<?php 
    session_start();
    include '../connection.php';

        if(isset($_REQUEST['email']) && isset($_REQUEST['password']) 
        && isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) ){

            //mysqli real escape prevent from sql injection which filter the user input
            $firstname=mysqli_real_escape_string($conn,$_REQUEST['firstname']);
            $lastname=mysqli_real_escape_string($conn,$_REQUEST['lastname']);
            $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
            $password=mysqli_real_escape_string($conn,$_REQUEST['password']);
            
            $result = mysqli_query($conn,"INSERT INTO user(firstname, lastname, email, password, role, is_active) 
                        VALUES('$firstname', '$lastname', '$email', '$password', 'STUDENT', 1)");
            
            if($result){
                $qr=mysqli_query($conn,"select * from user where email='$email'");

                if(mysqli_num_rows($qr)>0){
                    $data=mysqli_fetch_assoc($qr);
                    $_SESSION['isAuth']=true;
                    //$_SESSION['role']=$data['role'];
                }
                
                header("Location:../index.php");
                
            }else{
                header("Location:../RegisterPage.php?error=something wrong");		

            }

        }
        else{
            header("Location:../RegisterPage.php?error=wrong credentials");		
        }


?>