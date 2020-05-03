<?php
    class Flass_data
    {
        public static function show_error(){
            if(!isset($_SESSION['msg'])){
                return null;
            }
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
            return implode("<br>", $msg);
        }
        public static function inser_user($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['user_in'] = $msg;
        }
        public static function loging_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['log_error'] = $msg;
        }
        public static function update_pro($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pro_up_sus'] = $msg;
        }
        public static function update_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pro_up_error'] = $msg;
        }
        // public static function update($msg){
        //     if(!isset($_SESSION['msg'])){
        //         $_SESSION['msg'] = array(); 
        //     }
        //     $_SESSION['msg']['up'] = $msg;
        // }
        // public static function update_error($msg){
        //     if(!isset($_SESSION['msg'])){
        //         $_SESSION['msg'] = array(); 
        //     }
        //     $_SESSION['msg']['up_error'] = $msg;
        // }
        // public static function pass_msg($msg){
        //     if(!isset($_SESSION['msg'])){
        //         $_SESSION['msg'] = array(); 
        //     }
        //     $_SESSION['msg']['pas'] = $msg;
        // }
        // public static function sub_error($msg){
        //     if(!isset($_SESSION['msg'])){
        //         $_SESSION['msg'] = array(); 
        //     }
        //     $_SESSION['msg']['error'] = $msg;
        // }
    }



?>