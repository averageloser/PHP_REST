<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//////////////////Database resources/////////////////////
define("DB_NAME", "store");
define("DB_USER", "tom");
define("DB_PASS", "tom");
define("DB_HOST", "localhost");
define("DB_TABLE","items");
//////////////////end Database resources///////////


function __autoload($class_name) {
    $file = "$class_name"."."."php";
    
    if (file_exists($file)) {
        require_once($file);
    } else {
        echo("File does not exist");
    }
}
?>

