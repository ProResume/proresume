<?php
require_once('config.php');
require_once('db.php');
 
if ($config['Client_ID'] === '8649rkm4xa4lfa' || $config['Client_Secret'] === 'jxZbsXW1MPYHp87w') {
 echo 'You need a API Key and Secret Key to test the sample code. Get one from <a href="https://www.linkedin.com/developer/apps/">https://www.linkedin.com/developer/apps/</a>';
 exit;
}

echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='.$config['Client_ID'].'&redirect_uri='.$config['callback_url'].'&state=98765EeFWf45A53sdfKef4233&scope=r_basicprofile r_emailaddress"><img src="./images/linkedin_connect_button.png" alt="Sign in with LinkedIn"/></a>';

<?php

if(isset($_GET['code'])) // get code after authorization
{
    $url = 'https://www.linkedin.com/uas/oauth2/accessToken'; 
    $param = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];
    $return = (json_decode(post_curl($url,$param),true)); // Request for access token
    if($return['error']) // if invalid output error
    {
       $content = 'Some error occured<br><br>'.$return['error_description'].'<br><br>Please Try again.';
    }
    else // token received successfully
    {
       $url = 'https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token='.$return['access_token'];
       $User = json_decode(post_curl($url)); // Request user information on received token
       
      // Insert Data in Database
       $query = "INSERT INTO `test`.`users` 
       (`Userid`, 
       `FirstName`, 
       `LastName`, 
       `Email`, 
       `City`,
       `State`,
       `Country`)
 
       VALUES
 
       ('$Userid', 
       '$FirstName', 
       '$LastName', 
       '$Email', 
       '$City',
       '$State', 
       '$Country'";
       mysqli_query($connection,$query);
    }
}

?>