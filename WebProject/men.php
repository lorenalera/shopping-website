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


<center>  <h3 class="heading"> MEN BAGS </h3> </center>
<div class="container">

<div class="products">
   <div class="box-container">
     <?php
         $select_product = mysqli_query($conn,"SELECT * FROM products") or die('query failed');
         if(mysqli_num_rows($select_product)>0){
             while($fetch_product = mysqli_fetch_assoc($select_product)){
               if($fetch_product['category']=='men'){
 ?>

  <form method="post" class="box" action="shopping_cart.php">
      <a href="product_details.php?id=<?php echo $fetch_product['p_id'];?>" class="btn-primary" style="text-decoration:none; padding: 10px;"><img src="images/<?php echo $fetch_product['image'];?>"></a>
      <div class="name"><?php echo $fetch_product['name'];?></div>
      <div class="price">$ <?php echo $fetch_product['price'];?></div>
      <!--<?php

         if(strcmp($fetch_product['new'],'new'))
           echo '<div class="new">'.$fetch_product['new'].'</div>';
      ?>-->

      <input type="number" min="1" max="<?php echo $fetch_product['quantity'];?>" name="prod_quantity" value="1">
      <input type="hidden" name="prod_image" value="<?php echo $fetch_product['image'];?>">
        <input type="hidden" name="prod_name" value="<?php echo $fetch_product['name'];?>">
        <input type="hidden" name="prod_price" value="<?php echo $fetch_product['price'];?>">
        <input type="submit" value="add to cart" name="add_to_cart" class="btn" onclick="return confirm('<?php echo $product_name?>');"><br><br>
        <button><a href="product_details.php?id=<?php echo $fetch_product['p_id'];?>" class="btn-primary" style="text-decoration:none; padding: 10px;"> View Details </a></button>
  </form>
   <?php
   };
             };
         };
     ?>

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
