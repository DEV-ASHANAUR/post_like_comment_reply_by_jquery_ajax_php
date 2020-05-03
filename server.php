<?php
	session_start();
	include "message/Flash_data.php";
    include "function/main.php";
	$obj = new Main();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
    $user_id = $_SESSION['user'];
    //like process
    if(isset($_POST['liked'])){
        $postid = $_POST['postid'];
        $counn = $obj->countt($postid);
        $row = $counn->fetch_object();
        $n = $row->p_likes;

        $obj->update_like($n,$postid);
        $obj->insert_like($postid,$user_id);
    }
    //unlike process
    if(isset($_POST['unliked'])){
        $postid = $_POST['postid'];
        $counn = $obj->countt($postid);
        $row = $counn->fetch_object();
        $n = $row->p_likes;

        $obj->update_unlike($n,$postid);
        $obj->delete_like($postid,$user_id);
    } 




















?>