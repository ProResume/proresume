<?php
<<<<<<< Updated upstream
 
$config['callback_url']         =   'https://proresume.github.io/proresume/'; //Your callback URL
 
$config['Client_ID']      =   '8649rkm4xa4lfa'; // Your LinkedIn Application Client ID
$config['Client_Secret']      =   'jxZbsXW1MPYHp87w';  // Your LinkedIn Application Client Secret
 
?>



=======
ini_set('display_errors','On');
error_reporting(E_ALL);

$dbh_host = "dbserver.engr.scu.edu";
$db_user = "kyrawayne";
$db_pw = "00000979812";
$db_name = "sdb_kwayne";

$conn = mysql_connect($dbh_host, $db_user, $db_pw, $db_name)
		or die("Error" . mysqli_error($conn));

$qry = "SHOW DATABASES";
$result = $conn->query($qry);

echo "Connected.  Dumping DB list:<br>\n";
while($row = mysqli_fetch_assoc($result)) {
        echo $row['Database'] . "<br>\n";
}       

mysqli_close($conn);

?>
>>>>>>> Stashed changes
