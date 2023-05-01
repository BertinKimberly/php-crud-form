<?php
    include "connection.php";

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM users WHERE id=$id";
        $result=$conn->query($sql);
        if($result->num_rows > 0){
            $row=$result->fetch_assoc();
            $fname=$row['fname'];
            $lname=$row['lname'];
            $email=$row['email'];
            $password=$row['password'];
            $gender=$row['gender'];
        }
    }
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $gender=$_POST['gender'];
    
        // update query
        $sql="UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', gender='$gender' WHERE id=$id";
        if($conn->query($sql)){
            header("location: displayUsers.php");
            exit;
        }else{
            echo "Error updating user: " . $conn->error;
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Edit form</title>
</head>
<body>
<div class="container">
        <form method="post" action="#">
            <div class="m-3">
                <label class="form-label" for="fname" >First Name</label>
                <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $fname ?>">
                <br>
            </div>
            <div class="m-3">
            <label class="form-label" for="lname">Last Name</label>
            <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $lname ?>">
            <br>
            </div>
            <div class="m-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $email ?>">
            <br>
            </div>
            <div class="m-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" value="<?php echo $password ?>">
            <br>
            </div>
            <input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
            
            
            <div class="m-3">
            <label class="form-label" for="gender">Gender</label>
            <select name="gender" id="gender" class="form-select">
                <option value="Male" <?php if($gender == "Male"){echo "selected";}?>>Male</option>
                <option value="Female" <?php if($gender == "Female"){echo "selected";}?>>Female</option>
            </select>
            <br>
            </div>
            <div class="m-3">
            <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </div>
           
          
    </form>

    </div>
   

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</body>
</html>

   