<?php
$user = 'root';
$password = 'root';
$db = 'registration';
$host = 'localhost';
$port = 8889;
$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$mail=(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL));
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
 if(mb_strlen($login)<5||mb_strlen($login)>90)
 {
      echo "Invalid login length";
      exit();
 }else if(mb_strlen($mail)<3||mb_strlen($mail)>99){
      echo "Invalid mail length"; 
      exit();
 };

$pass=md5($pass."acdqwerty123");
$link->query("INSERT INTO users(login,pass,mail,regDate) VALUES ('$login','$pass','$mail',CURDATE())");
mysqli_close($link);
header('Location: /');
exit();
?>
