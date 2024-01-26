<?php
require("connection.php");

session_start();
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * from users where username='$username' and password='$password';";
  $cakeDetails = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($cakeDetails);
  if ($row) {
    $_SESSION['privilleged'] = $username;
    header("location:eyeGlasses.php");
  } else {
    echo "<script>alert('Invalid username or password');</script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="styles/reset.css" />
  <link rel="stylesheet" href="styles/login.css" />
  <link rel="stylesheet" href="styles/nav.css" />
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
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="eyeGlasses.php">Eyeglasses</a></li>
        <li><a class="active" href="login.php">Sign In</a></li>
        <li>
          <a href="cart.php"><ion-icon id="cart-icon" name="cart-outline"></ion-icon></a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <form action="" method="POST">
      <h3>LOGIN</h4>
        <div class="credentials">
          <input type="email" id="Email" name="username" placeholder="Email" required>
          <ion-icon name="mail" id="mail-icon"></ion-icon>
        </div>
        <div class="credentials">
          <input type="password" id="pass" name="password" placeholder="Password" required>
          <ion-icon name="lock-closed" id="lock-icon"></ion-icon>
        </div>
        <div id="remember-rejester"
          <div id="rejester"> Don't have an account?<a class="forgot-pass-txt" href="signup.php">Regester</a></div>
        </div>
        <button type="submit" name="login">Login</button>
        <!--social media buttons-->
        <div id="social-btns"><a href=""><ion-icon name="logo-facebook"></a><a href=""></ion-icon> <ion-icon
              name="logo-instagram">
            </ion-icon></a> <a href=""><ion-icon name="logo-github"></ion-icon></a>
          <a href=""><ion-icon name="logo-slack"></ion-icon></a>
        </div>

    </form>
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