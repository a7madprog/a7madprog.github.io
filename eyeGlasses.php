<?php
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION['privilleged'])) {

    $name = $_POST['product_name'];
    $image = $_POST['product_image'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];
    $user = $_SESSION['privilleged'];

    $sql = "insert into `orders` (product_name, product_image, product_price, product_quantity,username) values ('$name','$image',$price,$quantity,'$user')";
    $result = mysqli_query($con, $sql);
  } else {
    echo '<script>alert("Please sign in first")</script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="styles/eyeGlasses.css" />
  <link rel="stylesheet" href="styles/reset.css" />
  <link rel="stylesheet" href="styles/nav.css">
</head>

<body>
  <?php

  ?>
  <header>
    <nav>
      <input type="checkbox" id="check" />
      <label for="check" class="check-btn">
        <ion-icon name="menu-outline"></ion-icon>
      </label>
      <label id="logo"><ion-icon name="glasses-outline"></ion-icon></label>
      <?php
      if (isset($_SESSION['privilleged'])) {
        $user = $_SESSION['privilleged'];
        echo '
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a class="active" href="eyeGlasses.php">Eyeglasses</a></li>
        <li><a href="signout.php">Sign Out</a></li>
        <li>
          <a href="cart.php"><ion-icon id="cart-icon" name="cart-outline"></ion-icon></a>
        </li>
      </ul>
      ';
      } else {
        echo ' <ul>
        <li><a href="home.php">Home</a></li>
        <li><a class="active" href="eyeGlasses.php">Eyeglasses</a></li>
        <li><a href="login.php">Sign In</a></li>
        <li>
          <a href="cart.php"><ion-icon id="cart-icon" name="cart-outline"></ion-icon></a>
        </li>
      </ul>';
      }
      ?>
    </nav>
  </header>
  <main>
    <div id="mid-image">
      <img id="img" src="assets/images/sun-mid.jpg" alt="image" />
    </div>
    <div id="section">
      <p>Sunglasses section</p>
    </div>
    <div class="cards">
      <?php
      $sql = "select * from products";
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_array($result)) {
          $id = $row['id'];
          $name = $row['product_name'];
          // $desc = $row['product_desc'];
          $image = $row['product_image'];
          $price = $row['product_price'];


          echo '
                      <div>
                      <div class="products-container">
                              <img class="img" src="' . $image . '" alt="" />
                              <p>RAY-BAN</p>
                              <span class="price">$' . $price . '.99</span><span class="sale"> $154.00</span>
                              <br />


                              <form method="post">
                                  <input type="hidden" name="product_name" value= ' . $name . '>
                                  <input type="hidden" name="product_image" value= ' . $image . '>
                                  <input type="hidden" name="product_price" value= ' . $price . '>
                                  <input type="hidden"  name="product_quantity" value=1 required>
                                  <input type="submit" name="add_to_cart" class="shop-now" value="Shop Now">
                              </form>
                            </div>
                            </div>
                            ';


        }
      } ?>

    </div>



  </main>
  <footer class="bg-body-tertiary text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2020 Copyright:
    </div>
    <!-- Copyright -->
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>