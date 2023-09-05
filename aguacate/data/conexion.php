<?php

try {
   
    $base=new PDO('mysql:host=localhost; dbname=aguacate','root','');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
} catch (PDOException $th) {
    die('error :  '.$th->getMessage());
}
?>