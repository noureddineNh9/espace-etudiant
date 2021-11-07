<?php

    include "../../connection.php";

    $name = $_POST["name"];

   if(isset($_REQUEST)){

   // verification aucun Erro

    $sql = "INSERT INTO classroom(name) VALUES ('$name')";
  
    
    if(mysqli_query($conn,$sql)){
        $slq2  = "SELECT * FROM classroom WHERE name='$name' ";
        $result = mysqli_query($conn , $slq2);
        $classromms = mysqli_fetch_all($result,MYSQLI_ASSOC);
         
        $val = $classromms[0];

        $response = json_encode($val);
        echo $response;
     }
      else{
          echo 'error'. mysqli_error($conn);
      }
   }
   
