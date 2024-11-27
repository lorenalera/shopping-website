<?php
  include 'config.php';


  $id = "";
  if(isset($_GET["id"])){
     $id = $_GET["id"];
  }

  $select_product = mysqli_query($conn,"SELECT * FROM products WHERE p_id=$id") or die('query failed');

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Css/stylesheet_index.css">
<link rel="stylesheet" href="Css/style_product_details.css">

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

<div class="center-text">
</div>

<div class="container">
  <h2> PRODUCT DETAILS </h2>

  <?php

  if(mysqli_num_rows($select_product)>0){
      while($fetch_product = mysqli_fetch_assoc($select_product)){

        ?>
    <center>
    <table>
      <tr>
        <td>
            <img src="images/<?php echo $fetch_product['image'];?>" style="margin:5%; width:100%; padding: 10px 50px;"/>
        </td>
        <td style="padding: 10px 100px; justify-content: center;">
          <div class="name"><h3>Product Name : <?php echo $fetch_product['name'];?></h3></div>
          <div class="price"><h4> Price: $<?php echo $fetch_product['price'];?></h3></div>
          <div class="color" style="margin-bottom:10px;"> Color: <?php echo $fetch_product['color'];?></div>
          <div class="design" style="margin-bottom:10px;">Design: <?php echo $fetch_product['design'];?></div>

        <?php
            $quantity = $fetch_product['quantity'];

        if($quantity==0){
            echo '<h4 style="color:grey;"> Out of stock </h4>';
        }
        else{
            echo '<h4 style="color:green;"> In stock </h4>';
            echo '<h4 style="color:black;"> Quantity:  </h4>';
        ?>
            <form method="post" class="box" action="">
                <input type="number" min="1" max="<?php echo $fetch_product['quantity'];?>" name="prod_quantity" value="1">
                <input type="hidden" name="prod_image" value="<?php echo $fetch_product['image'];?>">
                  <input type="hidden" name="prod_name" value="<?php echo $fetch_product['name'];?>">
                  <input type="hidden" name="prod_price" value="<?php echo $fetch_product['price'];?>"><br><br>
                  <input type="submit" value="add to cart" name="add_to_cart" class="btn"><br><br>

            </form>
          <?php
        }

      }

    }

   ?>

 </td>

</tr>

</table><br><br>
</center>





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
