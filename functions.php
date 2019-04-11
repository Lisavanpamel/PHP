<?php
    // sessie opstarten
    session_start();
   
    function isPasswordStrongEnough($password) {
        if( strlen($password) < 8 ){
            return false;
        }
 
        return true;
    }
 
    function isEqual($item1, $item2) {
        if($item1 != $item2){
            return false;
        }
        return true;
    }
 
    function canRegister($email, $password){
      
        if( !isPasswordStrongEnough($password) ){
            return false;
        }
 
        if(empty($email)){
            return false;
        }
 
        return true;
    }
?>