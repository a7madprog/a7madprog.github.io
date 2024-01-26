<?php
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["product_id"];
    $quantity = $_GET['product_quantity'];


    $sql = "update orders set product_quantity=$quantity where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('Location: cart.php');
    } else {
        die(mysqli_error($con));
    }
}

?>