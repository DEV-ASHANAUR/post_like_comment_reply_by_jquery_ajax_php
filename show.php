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
    // date_default_timezone_set('America/New_York');
 
    if($data->num_rows>0){
        while($post = $data->fetch_object()){
            $post_owner = $post->user_id;
            $post_photo = $post->p_image;
            $postid = $post->p_id;
            $likes = $post->p_likes;
            $comments_count = $post->comments;
            $dbtime = $post->created_at;	
    		$time= $obj->facebook_time_ago($dbtime);	
          $output = '<div class="pro p-2 mb-2">
                <div class="border p-1">
                    <div class="row">
                        <div class="col-md-10">';
                           
                            $owner = $obj->get_owner($post_owner);
                            if($owner->num_rows>0){
                                while($own = $owner->fetch_object()){
                                    $own->user_id;
                                    $photo = $own->user_photo;
                                
                            $output .='<table>
                                <tr>
                                    <td>
                                        <span><img class="rounded-circle ddd m-auto" src="';
                                        if(!empty($photo)){
                                            $output.='upload/'.$photo;
                                        }else{$output.="img/default.jpg";}$output.='" alt="photo" width="30px" height="30px"></span>
                                    </td>
                                    <td class="pl-2">
                                        <span>'.$own->user_name.'<br/></span>
                                        
                                        <span>'.$time.'</span>
                                    </td>
                                </tr>
                            </table>';
                            
                            }
                        }
                        $output.='</div>';
                       if($post_owner == $user_id){
                        $output.='<div class="col-md-2">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle content-none drop text-info pl-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>';
                        }
                    $output.='</div>
                </div>
                <div class="main-con p-1">
                    <div class="title">
                        <h4 class="text-left p-1">'.$post->p_title.'</h4>
                    </div>
                    <div class="image">
                        <img src="'; if(!empty($post_photo)){$output.='upload/'.$post_photo;}else{$output.='img/default.jpg';}$output.='" class="img-fluid" alt="">
                    </div>
                    <div class="post pt-3">
                        <p>'. $post->p_details.'</p>
                        <div class="row">
                            <div class="col-md-8 pl-4 pb-2 countt"><i class="fab fa-gratipay"></i><span class="pl-1">'.$likes.' others</span></div>
                            <div class="col-md-4 pl-5 pb-2">'.$comments_count.' Comments</div>
                        </div>
                    </div>
                    <div class="public">
                        <div class="row border-top border-bottom">';
                            
                            $check = $obj->check($postid,$user_id);
                            if($check->num_rows>0){
                                
                                  $output.='<div class="col-md-8 pl-4 pt-2"><a href="#" class="unlike" data-id="'.$postid.'"><i class="fab fa-gratipay"></i> Love</a></div>';
                                
                            }else{
                               
                                   $output.= '<div class="col-md-8 pl-4 pt-2"><a href="#" class="like" data-id="'.$postid.'"><i class="fab fa-gratipay"></i> Love</a></div>';
                                
                            }
                           
                           $output.='<div class="col-md-4 pl-5 pt-2"><label for="'.$postid.'"><i class="far fa-comment-alt"></i> Comment</label></div>
                        </div>
                    </div>
                    <div class="comment mt-2 mb-3">
                        <form method="post">
                            <input type="hidden" class="user" name="uid" value="'.$user_id.'">
                            <input type="hidden" class="postid" name="postid" value="'.$postid.'">
                            
                            <textarea id="'.$postid.'" class="form-control hit mb-3" data-txt_id="'.$postid.'" placeholder="comment.."></textarea>

                            
                            <a href="#" class="db mt-2" name="comment" data-co_id="'.$postid.'">Comment</a >
                        </form>
                    </div>';
                    $commentdata = $obj->show_comment($postid);
                    if($commentdata->num_rows>0){
                    $output.='<div class="showcoment">';
                        
                            while($comment_row = $commentdata->fetch_object()){
                                $c_id = $comment_row->c_id;
                                $comment_owner = $comment_row->c_user_id;
                                $com_val = $comment_row->c_comment;
                                $com_dbtime = $comment_row->created_at;
                                $com_time = $obj->facebook_time_ago($com_dbtime);
                                $ami = $obj->get_owner($comment_owner);
                                if($ami->num_rows>0){
                                    while($amar = $ami->fetch_object()){
                                      $amer_id = $amar->user_id;  
                                      $amer_photo = $amar->user_photo;
                                      $amer_name = $amar->user_name;

                                    $output.=

                                      '<div class="com_div"><img class="rounded-circle ddd m-auto" src="';
                                      if(!empty($amer_photo)){
                                          $output.='upload/'.$amer_photo;
                                      }else{$output.="img/default.jpg";}$output.='" alt="photo" width="30px" height="30px"><p class="mod_comment"><b class="into">'.$amer_name.'</b><br>'.$com_val .'</p></div>
                                      <div>
                                          <span class="dtime f-left"><small>'.$com_time.'</small></span>';
                                        if($user_id != $amer_id){
                                            
                                            $output.= '<span class="rep f-right"><small><a href="#" 
                                            class="rephit" data-comment_id="'.$c_id.'">Reply</a></small></span>';
                                          }
                                          $output.='<div class="'.$c_id.' reply mb-2">
                                          <form>
                                             <textarea id="'.$c_id.'" class="form-control mb-3" data-txt_id="'.$c_id.'" class="form-control mb-2">'.$amer_name.'</textarea>
 
                                             <a href="#" data-btn="'.$c_id.'" class="repbtn mt-2" name="comment">Reply</a >
                                            </form>
                                         </div>';
                                          
                                      $output.='</div>';
                                       $rep_data = $obj->get_reply($c_id);
                                       if($rep_data->num_rows>0){
                                            while($rep_row = $rep_data->fetch_object()){
                                                $reply_com_id = $rep_row->c_id;
                                                $reply_owner = $rep_row->c_user_id;
                                                $reply_com = $rep_row->c_comment;
                                                $reply_dbtime = $rep_row->created_at;
                                                $reply_time = $obj->facebook_time_ago($reply_dbtime);
                                                $me = $obj->get_owner($reply_owner);
                                                if($me->num_rows>0){
                                                    while($my = $me->fetch_object()){
                                                        $my_id = $my->user_id;
                                                        $my_photo = $my->user_photo;
                                                        $my_name = $my->user_name;
                                                    
                                                $output.='<div class="replyshow mt-2">
                                                <div class="com_div"><img class="rounded-circle ddd m-auto" src="';
                                                    if(!empty($my_photo)){
                                                        $output.='upload/'.$my_photo;
                                                    }else{$output.="img/default.jpg";}$output.='" alt="photo" width="30px" height="30px">
                                                
                                                    <p><b class="into">'.$my_name.'</b><br>'.$reply_com.'</p>
                                                    </div>
                                                    <div>
                                                        <span class="dtime f-left"><small>'.$reply_time.'</small></span>';
                                                        if($user_id != $my_id){
                                                        
                                                            $output.= '<span class="rep f-right"><small><a href="#" 
                                                            class="rephithit" data-repid="'.$reply_com_id.'">Reply</a></small></span>';
                                                        }
                                                        $output.='<div class="'.$reply_com_id.' reply">
                                                        <form>
                                                          <input type="hidden" class="comm_id" value="'.$c_id.'">
                                                           <textarea id="'.$reply_com_id.'" class="form-control mb-3" data-r_id="'.$reply_com_id.'" class="form-control mb-2">'.$my_name.'</textarea>
                                                        
                                                           <a href="#" data-rev_id="'.$reply_com_id.'" class="revpbtn mt-2" name="">Reply</a >
                                                          </form>
                                                       </div>';  
                                                   $output.= '</div>
                                                </div>';
                                    }
                                }

                                    }
                                }

                                      
                                    }
                                }
                               
                        

                        
                    }
                } 
                    $output.='</div>
                </div>		
            </div>';
            echo $output;
        }
							
        }
?>    