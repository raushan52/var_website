
<?php
include 'config.php'; // store your configuration in a seperate file so 
                      // you only need to update it once when your environment changes

$errors = false;
$output = '';
$nl = '<br>'.PHP_EOL;
$redirect_url = 'after_form.html';

if (!$con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME)){
    $errors = true;
    $output .= "ERROR Can't connect to DB".$nl;
};   


if (!$errors){
   //should validate/clean $_POST before using in query 
   $name = $con->escape_string($_POST['your_name']);  
   $email = $con->escape_string($_POST['your_email']);
   $mobile = $con->escape_string($_POST['your_phone']);   
   $slogan = $con->escape_string($_POST['your_message']);
   $sql="INSERT INTO members 
            (sName, sCity, sMobile, sEmail, sSub, sSlogan)
         VALUES ('$name', '$city', '$mobile', '$email',
                '$sub','$slogan')";

   if (!$con->query($sql)){ //forgot a parenthesis here earlier
      $output .= 'ERROR: DB said: ('.$con->errno.') '.$con->error.$nl;
      $output .= 'Query was:'.$sql.$nl;
      $errors = true;
   }else{
     $output .= "1 record added".$nl;
   }
}

if (!$errors){
   //if there are no errors redirect to index.html;
   header('refresh: 2; URL='.$redirect_url);
   $output .= '...Redirecting...'.$nl;
}else{
   //show the errors and allow display a link to go back/try again
   $output .= '<a href="'.$redirect_url.'">Try again</a>'.$nl;
}
echo $output;
?>
