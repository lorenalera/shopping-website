<?php

include 'config.php';




?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Css/stylesheet_index.css">
<link rel="stylesheet" href="Css/style_women.css">

<style>
.slide {display:none;}
</style>

</head>
<body>

<img class="logo" src="images/Logo.PNG" height="150" width="150">
<img  class="logo" src="images/photo_header.PNG" height="150" width="1100">

<div class="header-part">
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="women.php"> Women </a>
  <a href="men.php">Men</a>
  <a href="accessory.php" >Accessories</a>
  <a href="travel.php" >Travel</a>
  <a href="shopping_cart.php">Cart</a>
  <a href="#footer-part">Contact</a>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  </a>
</div>
</div>


<center><h2 class="heading" style="color:darksalmon;"> WELCOME ADMIN </h2> </center>
<div class="container">

<div class="products">
   <div class="box-container">
      <table>
          <th> <a href="view_users.php"> <img src="images/user_logo.png" height="220" style="padding:25px;"> </a> </th>
          <th> <a href="view_products.php"><img src="images/bag_icon.png" height="200" style="padding:25px;"> </a> </th>
          <th> <a href="update.php"><img src="images/settings_icon.png" height="200" style="padding:25px;"> </a></th>

      </table>
   </div>
</div>
</div>

<div id="footer-part">
  <div class="social-media">
           <a href="https://www.facebook.com/encyclopediacom"><img src="images/facebook.png" ></a> <a href="https://www.instagram.com/accounts/login/?next=/encyclopediacom/"><img src="images/insta.png" ></a> <a href="https://twitter.com/encyclopediacom"><img src="images/twitter.png" ></a>
           </div>
           <div class="page-info" style="color:darksalmon;">
               © 2022 Bag.com | All rights reserved.<br><br>
             <a class="email" href="mailto:ameta20@epoka.edu.al">Email</a>
           </div>
</div>




</body>
</html>
