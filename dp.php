<?php
define('DB_SERVER', 'dbserver.engr.scu.edu'); // Database server
define('DB_USERNAME', 'kwayne'); // Database Username
define('DB_PASSWORD', '00000979812'); // Database Password
define('DB_DATABASE', 'sdb_kwayne'); // Database Name
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); // connecting with database
?>