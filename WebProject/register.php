<?php

  include 'config.php';

  if(isset($_POST['submit'])){
     $fname = mysqli_real_escape_string($conn, $_POST['fname']);
     $lname = mysqli_real_escape_string($conn, $_POST['lname']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
     $cpass = mysqli_real_escape_string($conn,md5( $_POST['cpass']));

   if ($pass === $cpass) {
     $select = mysqli_query($conn,"SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' ") or die('query failed');
     if(mysqli_num_rows($select)>0){
        $message[] = 'user already exists!';
     }
     else{
         mysqli_query($conn,"INSERT INTO user_form (name,surname,email,password) VALUES('$fname','$lname','$email','$pass');") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
     }
  } else{
      $message[] = 'Password not matched. Please try again!';
  }
}


?>



<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="Css/style_register.css">

   <style>
        body {
          background-image: url('images/background_img.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;
        }

        label{
          width: 100px;
          display: inline-block;
          height: 25px;

        }

        .container{
          color: tomato;
        }

        #body-part{
          background-image: none;
          position: relative;
          color: black;
        }


        .container{
          margin-left: 500px;
          border: 1px solid;
          padding: 20px 80px;
          width: 600px;
          margin-top: 50px;
        }
        .message{
          position:sticky;
          top: 0; left: 0; right: 0;
          padding: 15px 10px;
          background-color: var(--white);
          text-align: center;
          z-index: 1;
          box-shadow: var(--box-shadow);
          font-size: 28px;
          cursor:pointer;
        }

        h2{
          margin-bottom: 25px;
          margin-left: 100px;
        }

        .btn{
          margin-left: 150px;
          background-color:darksalmon;
          padding: 13px 20px;
          color: white;
          border: none;
          text-decoration: none;
          text-align: center;
          font-size: 12px;
        }

        .btn:hover{
          background-color: lightgrey;
          cursor:pointer;
        }

</style>
</head>
<body>

<?php

    if(isset($message)){
      foreach($message as $message){
        echo '<div class="message" onclick="this.remove()">'.$message.'</div>';
      }
    }

  ?>

<div id="body-part">
<form action="" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b> Name </b></label>
    <input type="text" placeholder="Enter Name" name="fname" id="fname" required>

    <label for="lname"><b> Surname </b></label>
    <input type="text" placeholder="Enter Surname" name="lname" id="lname" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

    <label for="cpass"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpass" id="cpass" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

   <input type="submit" name="submit" class="btn" value="Register"/>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Login now</a>.</p>
  </div>
</form>
</div>

</body>
</html>
