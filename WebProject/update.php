<?php

include 'config.php';

session_start();

$user_id = $_SESSION['id'];

if (!isset($_SESSION['id'])){
    header("location:index.php");
}

if (isset($_POST['submit'])) {
      $fname = mysqli_real_escape_string($conn, $_POST['fname']);
      $lname = mysqli_real_escape_string($conn, $_POST['lname']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
      $cpass = mysqli_real_escape_string($conn, md5($_POST['cpass']));

    echo $pass;

    if ($pass === $cpass) {
        $update_query = "UPDATE user_form SET name='$fname',surname='$lname', email='$email', password='$pass' WHERE id='$user_id'";
        $result = mysqli_query($conn, $update_query);
        if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
        }
        else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}

?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Css/style_register.css">
    <title> Update profile </title>
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
     <h1>UPDATE PROFILE</h1>
     <p>Please fill in this form to update your account!</p>
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
    <input type="submit" name="submit" class="btn" value="Update Profile"/>
   </div>

   <div class="container signin">
     <p>Already have an account? <a href="login.php">Login now</a>.</p>
   </div>
 </form>
 </div>

 </body>
 </html>















</body>

 </html>
