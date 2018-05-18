<?php
    require 'databaseConstants.php';

    header('Content-Type: application/json');

    $conn = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE_NAME);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['user_id'],$_POST['name'])){
            $user_id = $_POST['user_id'];
            $name = $_POST['name'];
    
            $query = "UPDATE user SET name='$name' WHERE id=$user_id";
    
            if($conn->query($query)){
                $json = new stdClass();
                $json->result="success";
                $json->message="successfuly updated user's name";
                echo json_encode($json);
            }
            else{
                $json = new stdClass();
                $json->result="failed";
                $json->message=$conn->error;
                echo json_encode($json);
            }
        }
       
    }

    $conn->close();

?>