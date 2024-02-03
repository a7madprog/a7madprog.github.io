<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="alraed optical e comerse for selling eyeware products" />
  <meta name="keywords" content="sunglasses, rayban, eyeware" />
  <meta name="author" content="Author Name" />
  <title>Your Cart</title>
  <link rel="stylesheet" href="styles/reset.css" />
  <link rel="stylesheet" href="styles/nav.css" />
  <link rel="stylesheet" href="styles/cart.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <div class="your-cart-txt">
      <div>Your Cart</div>
    </div>
    <div id="center">
      <!-- to center the container -->
      <?php
      if (isset($_SESSION['privilleged'])) {
        $user = $_SESSION['privilleged'];
        $sql = "select * from orders where username='$user';";
        $result = mysqli_query($con, $sql);
        if ($result) {
          $total = 0;
          while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $product_name = $row['product_name'];
            $product_quantity = $row['product_quantity'];
            $image = $row['product_image'];
            $product_price = $row['product_price'] * $product_quantity;
            $total += $product_price;


            echo "
            <div class='product-container'>
        <div class='product-image'>
          <img src='$image'  />
        </div>
        <div class='product-name'>
          $product_name
        </div>
        <div class='product-price'>Price: $product_price$</div>

          <form action='update.php'>
                                <input type='number'  id = 'quantity' name='product_quantity' value= '$product_quantity'>
                                <input type='hidden' name='product_id' value= '$id'>
                                <button type='submit' class='btn btn-primary'> Update</button>
                                </form>

        <div class='delete'>
            <button class='btn btn-danger' ><a href='delete.php?id=$id'>Delete</a></button>
        </div>
      </div>
          ";
          }
          echo "<div id='total'>TOTAL: $total</div>";
        }
      } else {
      }
      ?>

      <div id='methods-txt'>Payment Methods</div>
      <div id="payments">
        <div id="credit">
          <div class="inputs">
            <label for="holder">CREDIT HOLDER</label>
            <input type="text" id="holder" />
          </div>
          <div class="inputs">
            <label for="card-num">CARD NUMBER</label>
            <input type="text" id="card-num" />
          </div>
          <div id="expire-cvv">
            <div class="inputs">
              <label for="expire">EXPIRE</label>
              <input type="text" id="expire" />
            </div>
            <div class="inputs">
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" />
            </div>
            <div class="inputs"><ion-icon name="card"></ion-icon></div>
          </div>
        </div>
        <div id="paypal">
          <div class="inputs">
            <label for="holder">PAYPAL HOLDER</label>
            <input type="text" id="holder" />
          </div>
          <div class="inputs">
            <label for="card-num">CARD NUMBER</label>
            <input type="text" id="card-num" />
          </div>
          <div id="expire-cvv">
            <div class="inputs">
              <label for="expire">EXPIRE</label>
              <input type="text" id="expire" />
            </div>
            <div class="inputs">
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" />
            </div>
            <div class="inputs"><ion-icon name="card"></ion-icon></div>
          </div>
        </div>
      </div>
  </main>
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-0">2020 @ copyright</p>
    </div>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>