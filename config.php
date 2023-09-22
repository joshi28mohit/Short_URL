<?php

    try
    {
        $host = "localhost";
        $dbname = "short_urls";
        $user = "root";
        $pass = "";

        $conn = new PDO ("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   //PDO - PHP Data Objects  -> It is used to access databases in Php
    } catch(PDOException $e)  {

        echo "error is: " . $e->getMessage();
        // echo "error is: " . $e->getLine();  -> It tells about the line where the error is there
        // echo "error is: " . $e->getFile();  -> Tells the file where error is there 
 }

?>