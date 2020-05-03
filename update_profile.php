<?php
    session_start();
	include "message/Flash_data.php";
    include "function/main.php";
    $obj = new Main();
    
    if(isset($_POST['submit'])){
        $id = $_POST['hid'];
        $name = $_POST['name'];
        $img = $_POST['picture'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $link = $_POST['link'];
        $add = $_POST['address'];
        $about = addslashes($_POST['about']);
    
        if(!empty($_FILES['file']["name"])){
            $file = $_FILES['file'];
            //  echo "<pre>";
            //  print_r($file);
            // echo "</pre>";
            $filename = $_FILES["file"]["name"];
            $filetmp = $_FILES["file"]["tmp_name"];
            $filetype = $_FILES["file"]["type"];
            $filesize = $_FILES["file"]["size"];
            $fileerror = $_FILES["file"]["error"];

            $fileext = explode('.', $filename);
            //print_r($fileext);
            $fileactualext = strtolower(end($fileext));
            //print_r($fileactualext);
            $allowed = array('jpg', 'jpeg','png');
            if(in_array($fileactualext,$allowed)){
                if($fileerror === 0){
                    if($filesize < 10000000){
                        $filenamenew = uniqid('',true).".".$fileactualext;
                        $filedestination = "upload/".$filenamenew;
                        if(move_uploaded_file($filetmp,$filedestination)){
                            if(isset($img)){
                                unlink('upload/'.$img);
                            }
                            $status = $obj->pro_update($id,$name,$filenamenew,$email,$birth,$link,$add,$about);
                            Flass_data::update_pro('Successfully updated!');
                            header("location:setting.php?id=".$id);
                        }
                        // move_uploaded_file($filetmp,$filedestination);
                        // header("location:index.php?successfull");
                    }else{
                        Flass_data::update_error("Your Photo is Too Big!");
                        header("location:setting.php?id=".$id);
                    }
                }else{
                    Flass_data::update_error("There was an error uploading your file!");
                    header("location:setting.php?id=".$id);
                }
            }else{
                Flass_data::update_error("You can't upload files of this type!");
                header("location:setting.php?id=".$id);
            }
        }else{
            $obj->pro_update($id,$name,$img,$email,$birth,$link,$add,$about);
            Flass_data::update_pro('Successfully updated!');
            header("location:setting.php?id=".$id);
        }
 
    }




?>