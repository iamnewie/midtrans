<?php
    require 'databaseConstants.php';

    header('Content-Type: application/json');

    $conn = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE_NAME);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['user_id'],$_POST['transaction_type_id'],$_POST['value'],$_POST['description'])){
            $user_id = $_POST['user_id'];
            $transaction_type_id = $_POST['transaction_type_id'];
            $value = $_POST['value'];
            $description = $_POST['description'];

            $query = "INSERT transaction(user_id,trans_type_id,trans_value,trans_description,trans_date) 
            VALUES($user_id,$transaction_type_id,$value,'$description',NOW())";

            if($conn->query($query)){
                $query = null;
                switch($transaction_type_id){
                    case 1: {
                        $query = "UPDATE user SET balance=(balance-$value) WHERE id=$user_id";
                        break;
                    }
                    case 2:{
                        $query = "UPDATE user SET balance=(balance+$value) WHERE id=$user_id";
                        break;
                    }
                }
                
                if($conn->query($query)){
                    $json = new stdClass();
                    $json->result="success";
                    $json->message="successfuly add new transaction";
                    echo json_encode($json);
                }
                else{
                    $json = new stdClass();
                    $json->result="failed";
                    $json->message=$conn->error;
                    echo json_encode($json);
                }

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