<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Css/stylesheet_index.css">

<style>
.slide {display:none;}
</style>

</head>
<body>

<a href="index.php" class="active"><img class="logo" src="images/Logo.PNG" height="150" width="150"></a>
<img  class="logo" src="images/photo_header.PNG" height="150" width="1100">

<div id="log-btn-div">
    <img src="images/user.png" height="20px" width="20px" style="margin-left:1200px;"><a href="login.php" class="active">Login</a> | <a href="register.php" class="active">Register</a>
</div>

<div class="header-part">
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="women.php"> Women </a>
  <a href="men.php">Men</a>
  <a href="accessory.php" >Accessories</a>
  <a href="Travel.php" >Travel</a>
  <a href="shopping_cart.php">Cart</a>
  <a href="#footer-part">Contact</a>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  </a>
</div>
</div>

<div class="center-text">
</div>

<div class="slideshow-photoes">
   <img id="photo" src="" alt="Image" height=380px" style="width:100%">
</div>

<div class="collection">
    <a href="women.php" class="active"> <img class="women" src="images/women.jpg"> </a>
    <a href="men.php" class="active"> <img class="men" src="images/men.jpg"> </a>
  <p class="quote" style="text-align:center;color:darksalmon;font-size:47;"> Your style is our duty ! </div>

</div>

<div class="new-coll">
  <div style="text-align:center;color:darksalmon;">NEW COLLECTION  NEW COLLECTION NEW COLLECTION   NEW COLLECTION    NEW COLLECTION >NEW COLLECTION  NEW COLLECTION NEW COLLECTION   </div>
      <img class="women" src="images/new1.jpg">
      <img class="men" src="images/new3.jpg">
        <img class="men" src="images/new2.jpg">
  <div style="text-align:center;color:darksalmon;">NEW COLLECTION  NEW COLLECTION NEW COLLECTION   NEW COLLECTION    NEW COLLECTION >NEW COLLECTION  NEW COLLECTION NEW COLLECTION   </div>
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



<script>
setInterval(chooseImg, 1700)
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

chooseImg();
function getRndInteger(min, max) {
          return Math.floor(Math.random() * (max - min) ) + min;
    }

    function chooseImg(){
      var images = ["images/slide1.jpg", "images/slide2.jpg","images/slide3.PNG"];
      var index = getRndInteger(0, 3);
      document.getElementById("photo").src = images[index];
    }
</script>

</body>
</html>
