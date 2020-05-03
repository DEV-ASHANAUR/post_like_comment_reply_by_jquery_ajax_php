<?php
    session_start();
    include "message/Flash_data.php";
    include "function/main.php";
    $obj = new Main();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $pass = $_POST['pass'];
        $status = $obj->insert_user($name,$email,$date,$pass);
        if($status == true){
            Flass_data::inser_user("Registation successfully Complete!");
            header("location:index.php");
        }else{
            echo "error";
        }
    }
















?>