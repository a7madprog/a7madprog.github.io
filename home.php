<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION['privilleged'])) {
    $image = $_POST['product_image'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];
    $name = $_POST['product_name'];
    $user = $_SESSION['privilleged'];

    $sql = "insert into `orders` ( product_image, product_price, product_quantity,product_name,username) values ('$image',$price,$quantity,'$name','$user')";
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
  <link rel="stylesheet" href="styles/home.css" />
  <link rel="stylesheet" href="styles/reset.css" />
  <link rel="stylesheet" href="styles/nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
    integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
      <img src="assets/images/mid-image.jpg" alt="image" />
    </div>
    <div id="aboutus">
      Welcome to Alraid Optical, your trusted vision partner since 1995.
      <br /><br />We offer a curated collection of stylish eyeglasses,
      trendsetting sunglasses, and precision-crafted contact lenses.
      <br /><br />
      Our experienced team provides thorough eye testing services using
      state-of-the-art technology. <br /><br />At Alraid Optical, your vision
      is our priority.
    </div>
    <div id="best-selling" "><p>Best Selling Items</p></div>
      <div class=" cards">
      <?php
      $sql = "select * from best_selling";
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_array($result)) {
          $id = $row['id'];
          $image = $row['image'];
          $price = $row['price'];
          $name = $row['product_name'];

          echo '
                      <div>
                      <div class="products-container">
                              <img class="img" src="' . $image . '" alt="" />
                              <p>RAY-BAN</p>
                              <span class="price">$' . $price . '.99</span><span class="sale"> $154.00</span>
                              <br />


                            <form method="post">
                                  <input type="hidden" name="product_image" value= ' . $image . '>
                                  <input type="hidden" name="product_price" value= ' . $price . '>
                                  <input type="hidden" name="product_name" value= ' . $name . '>
                                  <input type="hidden"  name="product_quantity" value=1 required>
                                  <input type="submit" name="add_to_cart" class="shop-now" value="Shop Now">
                              </form>
                            </div>
                            </div>
                            ';


        }
      } ?>
    </div>
    <!-- <div class="products-container">
        <img class="img" src="assets/images/img2.avif" alt="" />
        <p>RAY-BAN</p>
        <span class="price">$220.99</span><span class="sale"> $154.00</span>
        <br />
        <button class="shop-now">Shop Now</button>
      </div>
      <div class="products-container">
        <img class="img" src="assets/images/img3.avif" alt="" />
        <p>RAY-BAN</p>
        <span class="price">$220.99</span><span class="sale"> $154.00</span>
        <br />
        <button class="shop-now">Shop Now</button>
      </div>
      <div class="products-container">
        <img class="img" src="assets/images/img4.avif" alt="" />
        <p>RAY-BAN</p>
        <span class="price">$220.99</span><span class="sale"> $154.00</span>
        <br />
        <button class="shop-now">Shop Now</button>
      </div> -->

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