<?php
    class SecureInput{
        
        public static function secure_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;            
        }
        
        
    }
?>