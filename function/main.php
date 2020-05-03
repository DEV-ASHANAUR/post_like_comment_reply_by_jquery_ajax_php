<?php
    date_default_timezone_set('Asia/Dhaka');
    class Main{
        //connection property
        protected $host = 'localhost';
        protected $user = 'root';
        protected $pass = '';
        protected $db = 'ar_social_site';
        //query propery
        protected $con;
        protected $sql;
        protected $result;
        //database connection
        public function __construct()
        {
            if(!isset($this->con)){
                $this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
                if(!$this->con){
                    echo "connect Error".$this->con->connect_error;
                }
            }
            return $this->con;
        }
        //count like
        public function countt($postid){
            $postid = $postid;
            $this->sql = "SELECT * FROM `posts` WHERE `p_id` = '$postid'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            } 
        }
        public function update_like($n,$postid){
            $n = $n;
            $postid = $postid;
            $this->sql = "UPDATE `posts` SET `p_likes` = $n+1 WHERE p_id = $postid";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function update_unlike($n,$postid){
            $n = $n;
            $postid = $postid;
            $this->sql = "UPDATE `posts` SET `p_likes` = $n-1 WHERE p_id = $postid";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function insert_like($postid,$userid){
            $postid = $postid;
            $userid = $userid;
            $this->sql = "INSERT INTO `likes`( `user_id`, `post_id`) VALUES ('$userid','$postid')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_like($postid,$userid){
            $postid = $postid;
            $userid = $userid;
            $this->sql = "DELETE FROM `likes` WHERE user_id = '$userid' AND post_id = $postid";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //time function
        public function facebook_time_ago($timestamp)  
        {  
            $time_ago = strtotime($timestamp);  
            $current_time = time();  
            $time_difference = $current_time - $time_ago;  
            $seconds = $time_difference;  
            $minutes      = round($seconds / 60 );           // value 60 is seconds  
            $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
            $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
            $weeks          = round($seconds / 604800);          // 7*24*60*60;  
            $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
            $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
            if($seconds <= 60)  
            {  
                return "Just Now";  
            }  
            else if($minutes <=60)  
            {  
            if($minutes == 1)  
            {  
                return "1 minute ago";  
            }else   
            {  
                return "$minutes minutes ago";  
            }  
            }  
            else if($hours <=24)  
            {  
            if($hours==1)  
            {  
                return "an hour ago";  
            }else  
            {  
                return "$hours hrs ago";  
            }  
            }  
            else if($days <= 7)  
            {  
            if($days==1)  
            {  
                return "yesterday";  
            }
            else  
            {  
                return "$days days ago";  
            }  
            }  
            else if($weeks <= 4.3) //4.3 == 52/12  
            {  
            if($weeks==1)  
            {  
                return "a week ago";  
            }  
            else  
            {  
                return "$weeks weeks ago";  
            }  
            }  
            else if($months <=12)  
            {  
            if($months==1)  
            {  
                return "a month ago";  
            }  
            else  
            {  
                return "$months months ago";  
            }  
            }  
            else  
            {  
            if($years==1)  
            {  
                return "one year ago";  
            }  
            else  
            {  
                return "$years years ago";  
            }  
            }  
        }
        //insert user information 
        public function insert_user($name,$email,$date,$pass)
        {
            $name = $name;
            $email = $email;
            $date = $date;
            $pass = $pass;

            $this->sql = "INSERT INTO `user_table`(`user_name`, `user_email`, `user_password`,`user_birth`) VALUES ('$name','$email','$pass','$date')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function insert_post($filenamenew,$title,$detalis,$uid){
            $img = $filenamenew;
            $title = $title;
            $detalis = $detalis;
            $uid = $uid;

            $this->sql = "INSERT INTO `posts`(`p_title`,`p_details`,`p_image`,`user_id`) VALUES ('$title','$detalis','$img','$uid')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function add_comment($postid,$userid,$comment){
            $postid= $postid;
            $userid = $userid;
            $comment = $comment;
            $this->sql = "INSERT INTO `comments`(`c_comment`, `c_user_id`, `c_post_id`) VALUES ('$comment','$userid','$postid')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function update_comment($n,$postid){
            $n = $n;
            $postid = $postid;
            $this->sql = "UPDATE `posts` SET `comments` = $n+1 WHERE p_id = $postid";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_comment($postid)
        {
            $postid = $postid;
            $this->sql = "SELECT * FROM `comments` WHERE `c_post_id` = '$postid' ORDER BY `c_id` DESC;";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function add_reply($rep_id,$user_id,$rep_text)
        {
            $rep_id = $rep_id;
            $user_id = $user_id;
            $rep_text = $rep_text;
            $this->sql = "INSERT INTO `comments`(`c_comment`, `c_user_id`,`reply_id`) VALUES ('$rep_text','$user_id','$rep_id')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function get_reply($rep){
            $rep_id = $rep;
            $this->sql = "SELECT * FROM `comments` WHERE `reply_id` = '$rep_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo 'error'; 
            }
        }
        public function retrive_post_id($com_id)
        {
            $com_id = $com_id;
            $this->sql = "SELECT `c_post_id` FROM `comments` WHERE `c_id` = '$com_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_post()
        {
            $this->sql = "SELECT * FROM `posts` ORDER BY `p_id` DESC";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function get_owner($post_owner){
            $id = $post_owner;
            $this->sql = "SELECT * FROM `user_table` WHERE user_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function check($postid,$userid){
            $postid = $postid;
            $userid = $userid;
            $this->sql = "SELECT * FROM `likes` WHERE `post_id` = '$postid' AND `user_id` = '$userid'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function retrive_user_auth($email)
        {
            $email = $email;
            $this->sql = "SELECT * FROM `user_table` WHERE user_email = '$email'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //get user_information By session_id;
        public function get_user($user_id)
        {
            $user_id = $user_id;
            $this->sql = "SELECT * FROM `user_table` WHERE user_id = '$user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function pro_update($id,$name,$img,$email,$birth,$link,$add,$about)
        {
            $id = $id;
            $name = $name;
            $img = $img;
            $email = $email;
            $birth = $birth;
            $link = $link; 
            $add = $add;
            $about = $about; 
            $this->sql = "UPDATE `user_table` SET `user_name`='$name',`user_email`='$email',`user_photo`='$img',`user_about`='$about',`user_birth`='$birth',`user_link`='$link',`user_address`='$add' WHERE user_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //update all infomation
        // public function update($id,$st_name,$filenamenew,$date_birth,$f_name,$m_name,$village,$house_road_no,$post_office,$district,$upzila,$st_mobile,$gurdian_mobile,$email,$name_course,$technology,$session,$duration,$roll,$reg,$passing_year,$name_organization,$designation,$contact_number,$montly_salary)
        // {
        //     $id = $id;
        //     $st_name = $st_name;
        //     $filenamenew = $filenamenew;
        //     $date_birth = $date_birth;
        //     $f_name = $f_name;
        //     $m_name = $m_name;
        //     $village = $village;
        //     $house_road_no = $house_road_no;
        //     $post_office = $post_office;
        //     $district = $district;
        //     $upzila = $upzila;
        //     $st_mobile = $st_mobile;
        //     $gurdian_mobile = $gurdian_mobile;
        //     $email = $email;
        //     $name_course = $name_course;
        //     $technology = $technology;
        //     $session = $session;
        //     $duration = $duration;
        //     $roll = $roll;
        //     $reg = $reg;
        //     $passing_year = $passing_year;
        //     $name_organization = $name_organization;
        //     $designation = $designation;
        //     $contact_number = $contact_number;
        //     $montly_salary = $montly_salary;
        //     $this->sql = "UPDATE `st_information` SET `st_name`='$st_name',`photo`='$filenamenew',`date_birth`='$date_birth',`f_name`='$f_name',`m_name`='$m_name',`village`='$village',`house_road_no`='$house_road_no',`post_office`='$post_office',`district`='$district',`upzila`='$upzila',`st_mobile`='$st_mobile',`gurdian_mobile`='$gurdian_mobile',`email`='$email',`name_course`='$name_course',`technology`='$technology',`session`='$session',`duration`='$duration',`roll`='$roll',`reg`='$reg',`passing_year`='$passing_year',`name_organization`='$name_organization',`designation`='$designation',`contact_number`='$contact_number',`montly_salary`='$montly_salary' WHERE st_id ='$id'";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }
        // //search data from st_information table
        // public function search($id)
        // {
        //     $id = $id;
        //     $this->sql = "SELECT * FROM `st_information` WHERE st_id = '$id'";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return $this->result;
        //     }else{
        //         return false;
        //     }
        // }
        
        
        // //fetch upzila by district id
        // public function upzila($id)
        // {
        //     $id = $id;
        //     $this->sql = "SELECT * FROM `upazilas` WHERE district_id = '$id'";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return $this->result;
        //     }else{
        //         return false;
        //     }
        // }
        // //fetch data from st_imformation table for dashbord
        // public function short()
        // {
        //     $this->sql = "SELECT * FROM `st_information`";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return $this->result;
        //     }else{
        //         return false;
        //     }
        // }
        // //fetch all information from 3 table using inner join
        // public function show_All($id)
        // {
        //     $id = $id;
        //     $this->sql = "SELECT st.*,dis.dis_name,up.up_name
        //     FROM st_information as st INNER JOIN districts as dis 
        //     ON st.district = dis.id
        //     INNER JOIN upazilas as up ON
        //     st.upzila = up.id
        //     WHERE st.st_id = '$id'";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return $this->result;
        //     }else{
        //         return false;
        //     }
        // }
        // //delete data by id
        // public function delete($id)
        // {
        //     $id =$id;
        //     $this->sql = "DELETE FROM `st_information` WHERE st_id = '$id'";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }
        //destroy database connection 
        public function __destruct(){
            $this->con->close();
        }
    }
    //$obj = new Main();


?>