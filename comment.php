<?php
	session_start();
	include "message/Flash_data.php";
    include "function/main.php";
	$obj = new Main();
	$data = $obj->show_post();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
    $user_id = $_SESSION['user'];

    if(isset($_POST['postid'])){
        $postid = $_POST['postid'];
        $userid = $_POST['userid'];
        $comment = addslashes($_POST['comment']);
        $counn = $obj->countt($postid);
        $row = $counn->fetch_object();
        $n = $row->comments;

        $obj->update_comment($n,$postid);
        $obj->add_comment($postid,$userid,$comment);
    }
    if(isset($_POST['rep_id'])){
        $rep_id = $_POST['rep_id'];
        //$userid = $_POST['userid'];
        $rep_text = addslashes($_POST['rep_text']);
        $data = $obj->retrive_post_id($rep_id);
        $com_row = $data->fetch_object();
        $postid = $com_row->c_post_id;
        $counn = $obj->countt($postid);
        $row = $counn->fetch_object();
        $n = $row->comments;

        $obj->update_comment($n,$postid);
        $obj->add_reply($rep_id,$user_id,$rep_text);
        echo '1';
    }









    
    ?>