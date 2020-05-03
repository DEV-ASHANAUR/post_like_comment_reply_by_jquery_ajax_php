<?php
    session_start();
	include "message/Flash_data.php";
    include "function/main.php";
    $obj = new Main();
    
        
        //$status = $obj->insert_post($title);
        //echo "yes"; 
        if(!empty($_FILES['file']["name"])){
                $file = $_FILES['file'];
                $title = $_POST['title'];
                $detalis = addslashes($_POST['detalis']);
                $uid = $_POST['uid'];
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
                $allowed = array('jpg','jpeg','png');
                if(in_array($fileactualext,$allowed)){
                    if($fileerror === 0){
                        if($filesize < 10000000){
                            $filenamenew = uniqid('',true).".".$fileactualext;
                            $filedestination = "upload/".$filenamenew;
                            if(move_uploaded_file($filetmp,$filedestination)){
                                $status = $obj->insert_post($filenamenew,$title,$detalis,$uid);
                                //Flass_data::insert_pro('Successfully Added!');
                                //header("location:add_product.php");
                                echo "Successfully Done!";
                            }
                            // move_uploaded_file($filetmp,$filedestination);
                            // header("location:index.php?successfull");
                        }else{
                            echo "Your Photo is Too Big!";
                            //Flass_data::insert_pro_error("Your Photo is Too Big!");
                            //header("location:add_product.php");
                        }
                    }else{
                        echo "There was an error uploading your file!";
                        //Flass_data::insert_pro_error("There was an error uploading your file!");
                        //header("location:add_product.php");
                    }
                }else{
                    echo "You can't upload files of this type!";
                    //Flass_data::insert_pro_error("You can't upload files of this type!");
                    //header("location:add_product.php");
                }
            }else{
                echo "Please Select an Image";
            }
       
    
     

















?>