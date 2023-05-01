<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
      include 'connection.php';
    ?>


  <a href="signup.html" class="btn btn-primary m-5">  Add user </a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">User id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
         <!-- php codes -->
       
         <?php
    $sql="SELECT * FROM `users`";
    $result=$conn->query($sql);

    if($result){
        while($row=$result->fetch_assoc()){
            $id=$row['id'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $email=$row['email'];
            $password=$row['password'];
            $gender=$row['gender'];

            echo '
            <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$fname.'</td>
                <td>'.$lname.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td>'.$gender.'</td>
                <td>
                    <a href="editUser.php?id='.$id.'" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deleteUser.php?id='.$id.'" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>';
        }
    }
?>

</table>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>