<?php

include 'config.php';

session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
     header('location:login.php');

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

  if(isset($_POST['add_to_cart'])){
     $product_name = $_POST['prod_name'];
     $product_price = $_POST['prod_price'];
     $product_image = $_POST['prod_image'];
     $product_quantity = $_POST['prod_quantity'];


     $select_cart = mysqli_query($conn,"SELECT sh.cart_id,sh.user_id,sh.p_id,sh.price, sh.quantity, sh.added_date FROM shopping_cart as sh, products as prod
                                        WHERE sh.p_id = prod.p_id AND prod.name = '$product_name' AND user_id = '$user_id'") or die('query failed');

     if(mysqli_num_rows($select_cart)>0){
        $message[] = "product already added to your personal cart";
     }
     else{
       $product_q =  mysqli_query($conn,"SELECT * FROM products WHERE name = '$product_name'") or die('query failed');
       $product_id = mysqli_fetch_object($product_q)->p_id;
       $product_image = mysqli_fetch_object($product_q)->image;
        mysqli_query($conn,"INSERT INTO shopping_cart(user_id,p_id,price,quantity) VALUES ('$user_id', '$product_id','$product_price','$product_quantity')
          ") or die('query failed');
          $message[] = "product added to your personal cart";
     }
  };

  if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE shopping_cart SET quantity='$update_quantity' WHERE cart_id='$update_id'") or die('query failed');
    $message[] = "cart quantity updated!";
  }

  if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM shopping_cart WHERE cart_id='$remove_id'" ) or die('query failed');
    header('location:index.php');
  }


  if(isset($_GET['delete_all'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM shopping_cart WHERE user_id='$user_id'" ) or die('query failed');
    header('location:index.php');
  }






?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Css/stylesheet_index.css">
<link rel="stylesheet" href="Css/style_cart.css">


</head>
<body>

<a href="index.php" class="active"><img class="logo" src="images/Logo.PNG" height="150" width="150"></a>
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

  <?php

      if(isset($message)){
        foreach($message as $message){
          echo '<div class="message" onclick="this.remove()">'.$message.'</div>';
        }
      }

    ?>

    <div class="container">
        <div class="user-profile">
          <?php
              $select_user = mysqli_query($conn,"SELECT * FROM user_form where id = '$user_id'") or die('query failed');
              if(mysqli_num_rows($select_user)>0){
                  $fetch_user = mysqli_fetch_assoc($select_user);
              };

          ?>
          <p> user name : <span> <?php echo $fetch_user['name']; ?> </span></p>
          <p> user surname : <span> <?php echo $fetch_user['surname']; ?> </span></p>
          <p> email : <span> <?php echo $fetch_user['email']; ?> </span></p>
          <a href="shopping_cart.php?logout=<?php echo $user_id; ?>" style="margin-left: 700px;" onclick="return confirm('are you sure you want to logout?');" class="delete-btn"> LOGOUT </a>
          <a href="update.php" style="float:right;"> UPDATE </a>
        </div>
    </div>

<div class="container">
    <div class="shopping-cart">
       <table>
          <thead>
            <th> Image </th>
            <th> Name </th>
            <th> Price </th>
            <th> Quantity </th>
            <th> Total Price </th>
            <th> Action  </th>
          </thead>
        <tbody>
<?php
  $overall_total = 0;
   $query_cart = mysqli_query($conn,"SELECT * FROM shopping_cart WHERE user_id='$user_id'") or die('query failed');
          if(mysqli_num_rows($query_cart)>0){
              while($fetch_cart = mysqli_fetch_assoc($query_cart)){
                $p_id = $fetch_cart['p_id'];
                $product_q =  mysqli_query($conn,"SELECT * FROM products WHERE P_id = '$p_id'") or die('query failed');
                $product_image = mysqli_fetch_object($product_q)->image;

  ?>
         <tr>
            <td><img src="images/<?php echo $product_image?>"  height="100"> </td>
            <td> <?php echo $p_id; ?> </td>
            <td> <?php echo $fetch_cart['price']; ?> </td>
            <td>
              <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                  <input type="number" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" value="update" name="update_cart" class="btn">
            </form>
            </td>
            <td>
               $<?php echo $sub_total = number_format($fetch_cart['price']) * number_format($fetch_cart['quantity']); ?>
            /-</td>
            <td>
                <a href="shopping_cart.php?remove=<?php echo $fetch_cart['cart_id'];?>" class="btn" onclick="return confirm('Do you want to remove the product?');"> Remove </a>
            </td>

         </tr>
<?php
  $overall_total = $overall_total +  $sub_total;
     };
   }else{
      echo '<tr><td style="padding:20px; text-transform:capitalize" colspan="6"; text-align: center; > No item in cart </td></tr>';
   }
 ?>
   <tr class="bottom">
      <td colspan="4"> Total: </td>
      <td> $<?php echo $overall_total; ?>/-</td>
      <td> <a href="shopping_cart.php?delete_all" class="delete-btn" onclick="return confirm('Do you want to remove all products?');" class="btn"> Delete all </a></td>
   </tr>
       </tbody>
      </table>
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
