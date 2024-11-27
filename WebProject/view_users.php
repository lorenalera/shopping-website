<?php

include 'config.php';

session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
     header('location:login.php');

  if(isset($_POST['add_to_cart'])){
     $product_name = $_POST['prod_name'];
     $product_price = $_POST['prod_price'];
     $product_image = $_POST['prod_image'];
     $product_quantity = $_POST['prod_quantity'];


     $select_cart = mysqli_query($conn,"SELECT * FROM shopping_cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

     if(mysqli_num_rows($select_cart)>0){
        $message[] = "product already added to your personal cart";
     }
     else{
        mysqli_query($conn,"INSERT INTO shopping_cart(user_id,name,price,quantity,image) VALUES ('$user_id', '$product_name','$product_price','$product_quantity','$product_image')
          ") or die('query failed');
          $message[] = "product added to your personal cart";
     }
  };

  if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE shopping_cart SET quantity='$update_quantity' WHERE id='$update_id'") or die('query failed');
    $message[] = "cart quantity updated!";
  }

  if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM user_form WHERE id='$remove_id'" ) or die('query failed');
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
    <div class="view-products">
       <table>
          <thead>
            <th> USER ID </th>
            <th> Name </th>
            <th> Surname </th>
            <th> Email </th>
            <th> Password </th>
          </thead>
        <tbody>
<?php
          $query_users = mysqli_query($conn,"SELECT * FROM user_form") or die('query failed');
          if(mysqli_num_rows($query_users)>0){
              while($fetch_users = mysqli_fetch_assoc($query_users)){

  ?>
         <tr>
            <td> <?php echo $fetch_users['id']; ?> </td>
            <td> <?php echo $fetch_users['name']; ?> </td>
            <td> <?php echo $fetch_users['surname']; ?> </td>
            <td> <?php echo $fetch_users['email']; ?> </td>
            <td> <?php echo $fetch_users['password']; ?> </td>
            <td>
                <a href="view_users.php?remove=<?php echo $fetch_cart['id'];?>" class="delete-btn" onclick="return confirm('Do you want to remove the user?');"> Remove </a>
            </td>

         </tr>
<?php
     };
   }else{
      echo '<tr><td style="padding:20px; text-transform:capitalize" colspan="6"; text-align: center; > No users available</td></tr>';
   }
 ?>
       </tbody>
      </table>
    </div>
  </div>

</body>

</html>
