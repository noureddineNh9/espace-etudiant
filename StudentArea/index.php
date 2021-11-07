<?php 
    session_start();
    include "../connection.php";

    if(isset($_SESSION['isAuth'])){
         echo 'Student Area';
    }else{
        header("Location: ../index.php");
    }

?>