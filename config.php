<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

$db_host = "dbserver.engr.scu.edu";
$db_user = "kwayne";
$db_pw = "00000979812";
$db_name = "sdb_kwayne";

$conn = mysql_connect($db_host, $db_user, $db_pw, $db_name)
		or die("Error" . mysqli_error($conn));

$qry = "SHOW DATABASES";
$result = $conn->query($qry);

echo "Connected.  Dumping DB list:<br>\n";
while($row = mysqli_fetch_assoc($result)) {
        echo $row['Database'] . "<br>\n";
}       

mysqli_close($conn);

?>
