<?php


  require_once '../mysqlconnect.php';



  $message =trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));


  $error = '';

  if($message == '')
    $error = 'Введите сообщение';
  if($error !='') {
    echo $error;
    exit();
  }

$sql = 'INSERT INTO chat(message) VALUES(?)';
$query = $pdo->prepare($sql);
$query->execute([$message]);


  ?>
