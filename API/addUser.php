<?php
    require 'databaseConstants.php';

    header('Content-Type: application/json');

    $conn = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE_NAME);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['name'],$_POST['balance'])){
            $name = $_POST['name'];
            $balance = $_POST['balance'];

            $query = "INSERT user(name,balance)
                VALUES('$name',$balance)";

            if($conn->query($query)){
                $json = new stdClass();
                $json->result="success";
                $json->message="successfuly add new user";
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