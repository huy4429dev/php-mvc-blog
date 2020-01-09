<?php 
    class Input {
        
        public static function hasGet($name){
            return isset($_GET[$name]);
        }
    
        public static function get($name){
            return $_GET[$name];
        }
         
        
        public static function post($name){
            return $_POST[$name];
        }
        
        
    }