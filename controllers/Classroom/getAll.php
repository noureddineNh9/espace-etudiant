<?php
    include "../../connection.php";

    $sqls = 'SELECT * FROM classroom ';
    $result = mysqli_query($conn,$sqls);
        

    $return_arr = array();
    $classes = mysqli_fetch_all($result,MYSQLI_ASSOC);

    foreach ($classes as $classe){

        $id = $classe['id'];
        $name = $classe['name'];

        $return_arr[] = array("id" => $id,
                        "name" => $name);

    }

    // Encoding array in JSON format
    echo json_encode($return_arr);
?>



