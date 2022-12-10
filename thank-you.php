<?php
require "Db_config.php";
//    Insert inquiry

    $name = trim( $_POST['name']);
    $email= trim( $_POST['email'] );
    $message =  trim($_POST['subject']);

    db_query("INSERT INTO inquiry(name,email,detail) values('$name','$email','$message');",'inquiry','INSERT');

