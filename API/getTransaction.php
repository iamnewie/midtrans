<?php
    require 'databaseConstants.php';

    header('Content-Type: application/json');

    $conn = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE_NAME);

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
            $query = "SELECT * FROM transaction WHERE user_id=$user_id";
            
            $result = $conn->query($query);
            $jsonObject = array();

            if($result->num_rows > 0){
                while($row = $result->fetch_object()){
                    array_push($jsonObject,$row);
                }
                echo json_encode($jsonObject);
            }
            else{
                echo json_encode($jsonObject);
            }
        }
        
    }

    $conn->close();

?>