<?php
 namespace App\Libraries;
/**
 * This class deals with password managment
 */
 class Password {

   /**
    * This function returns hashed password
    *
    * @param string $password
    * @return void
    */
    public static function hash(string $password)
    {
      return password_hash($password, PASSWORD_BCRYPT);
    }
 }