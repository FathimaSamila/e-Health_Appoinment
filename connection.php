<?php

    $database= new mysqli("localhost","root","","ems");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>