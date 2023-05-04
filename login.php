<?php
    @include "connection.php";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $email=$_POST['email'];
        $password=Md5($_POST['password']);

        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result=$conn->query($sql);

        if(!$result){
            echo "Error:".$sql."<br>".$conn->error;
            exit();
        }else{
     if($result ->num_rows > 0){
        session_start();
        $_SESSION["email"]=$email;
        header("Location: displayUsers.php");
        exit();

     }
     else{
        echo "invalid credentials";
     }
    }
  }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>

    <div class="container">
      <h2>signup Form</h2>

      <form action="" method="POST">
        <fieldset>
          <legend>Personal information</legend>

          <div class="m-3">
            <label class="form-label"> Email </label>
            <input class="form-control" type="email" name="email" />
          </div>
          <div class="m-3">
            <label class="form-label"> Password </label>
            <input class="form-control" type="password" name="password" />
          </div>

          <button type="submit" name="submit" class="btn btn-primary">
            Submit
          </button>
        </fieldset>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
