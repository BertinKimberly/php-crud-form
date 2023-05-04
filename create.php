<?php
include 'connection.php';

if(isset($_POST['submit'])){
   $firstname=$_POST['fname'];
   $lastname=$_POST['lname'];
   $email=$_POST['email'];
   $password=Md5($_POST['password']);
   $gender=$_POST['gender'];

   $sql= "INSERT INTO users(fname,lname,email,password,gender) VALUES ('$firstname','$lastname', '$email','$password','$gender')";

   $result=$conn->query($sql);

   if($result == true){
      echo 'user created successfully';
      header("location: displayUsers.php");
   }
   else{
    echo "Error:".$sql."<br>".$conn->error;
   }
}
?>