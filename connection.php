<?php

 $hostname="localhost";
 $username="root";
 $password="";
 $database="user_management";

 $conn= mysqli_connect($hostname,$username,$password,$database);
 if(! $conn){
    die("failled to connect to database" . mysqli_connect_error());
 }
 else{
   //  echo "connected to the database successfully <br><br>";
 }
?>