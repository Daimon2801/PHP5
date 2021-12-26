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
if(isset($_POST["checkB"])){
$technologies = $_POST["checkB"];
foreach($technologies as $item) $link->query("UPDATE users SET `userStat`='unblock' WHERE `id`='$item' "); 
}; 
header('Location: /');            
?> 
