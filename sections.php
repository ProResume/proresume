<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    include 'config.php';
    $sql="SELECT FirstName FROM Users WHERE UserId='1'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    printf ("%s (%s)\n",$row["FirstName"]);

    mysqli_free_result($result);
?>

<h1 id="nameHeader">Kyra Wayne</h1>

<ol id="sections">
    <li class="sectionItem"></li>
</ol>


</body>
</html>