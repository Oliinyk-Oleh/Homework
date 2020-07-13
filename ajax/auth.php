<?php

  $login =trim( filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim (filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  $error = '';

  if (strlen($login) <=3)
  $error = 'Введите логин';
  else if (strlen($pass) <=3)
  $error = 'Введите пароль';

  if($error !='') {
    echo $error;
    exit();
  }


  $hash="zsbfenjikmht";
  $pass =md5($pass . $hash);

require_once '../mysqlconnect.php';



$sql = 'SELECT `id` From `users`WHERE `login`=:login && `pass`=:pass';
$query = $pdo->prepare($sql);
$query->execute(['login'=>$login, 'pass'=>$pass]);

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id ==0)
   echo 'Такого пользователя не существует';
   else {
     setcookie('log',$login, time()+ 3600*24*30, "/");
     echo 'Готово';
   }


  ?>
