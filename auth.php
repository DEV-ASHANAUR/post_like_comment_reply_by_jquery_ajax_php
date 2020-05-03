<?php
    session_start();
    include "message/Flash_data.php";
    include "function/main.php";
    $obj = new Main();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $data = $obj->retrive_user_auth($email);
        if($data->num_rows>0){
            while($row = $data->fetch_object()){
               echo $row->user_email;
               $id = $row->user_id;
               $db_pass = $row->user_password;
            }
        }else{
            Flass_data::loging_error("Your Email And Password Is Incorrect!!");
            header("location:index.php");
        }
        if($pass == $db_pass){
            $_SESSION['user'] = $id;
            header("location:profile.php");
        }else{
            Flass_data::loging_error("Your Email And Password Is Incorrect!");
            header("location:index.php");
        }


    }else{
        header("location:index.php");
    }







?>