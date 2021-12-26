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
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass=md5($pass."acdqwerty123");
$result = $link->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass' ");
$user = $result->fetch_assoc();
if(count($user) == 0){
    echo "User not find";
    exit();
};

if($user['userStat']=='block')
{
    echo"User is blocked!";
    exit();
}
$id=$user['id'];
$link->query("UPDATE users SET `onlineDate`=CURDATE() WHERE `id`='$id' ");
$link->query("UPDATE users SET `status`='Online' WHERE `id`='$id' ");
setcookie('user',$user['id'],time()+3600*24,"/");
mysqli_close($link);
header('Location: /');
?>
