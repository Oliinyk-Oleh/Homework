<?

  $id =$_POST['id'];

  require_once '../mysqlconnect.php';
  $sql='DELETE FROM `users` WHERE `id`=?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

?>
