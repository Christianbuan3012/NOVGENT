<?php
//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'NovGenT');
//Define database variables
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'inqwo1L9nV');
define('DB_PASSWORD', 'zwfBXn1xhE');
define('DB_NAME', 'inqwo1L9nV');

// Create connection to localhost
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($connection === false) {
    die("Failed to connect: " . mysqli_connect_error());
}

?>