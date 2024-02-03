<?php
$con = new mysqli("localhost", "root", "", "optical");

// ^ Variable $con is used to store the database connection.

// new mysqli(): This is the constructor for the mysqli class which establishes the database connection.

// "localhost": The first parameter specifies the hostname where the database server is located.
// In this case, 'localhost' means the server is on the same machine as the PHP script.

// "root": The second parameter is the username used to access the MySQL database.
// 'root' is the default administrative account in MySQL.

// "": The third parameter is the password for the MySQL account.
// Here it is an empty string, indicating no password is set for the 'root' user.
// Note: In a production environment, always use a strong password.

// "optical": The fourth parameter is the name of the database that you're trying to connect to.
// Here, the database name is 'optical'.

// It's important to check if the connection was successful and handle any errors.
?>