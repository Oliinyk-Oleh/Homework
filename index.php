<!DOCTYPE html>
<html lang="ru">
<head>
  <?
  $website_title= 'PHP Блог';
   require 'blocks/head.php'; ?>

</head>
<body>
  <? require 'blocks/header.php'; ?>

</div>
<main class="container mt-5">
  <div class="row">
    <div class="col-md-8 mb-3">
      <?
      require_once 'mysqlconnect.php';

      $sql='SELECT * FROM `articles` ORDER BY `date`DESC';
      $query=$pdo->query($sql);
      while($row=$query->fetch(PDO::FETCH_OBJ)){
        echo "<h2>$row->title</h2>
        <p>$row->intro</p>
        <p>$row->author</p>
        <a href='/news.php?id=$row->id' title'$row->title'>
        <button type='button' class='btn btn-warning mb-5'>Прочитать больше</button></a>";
      }
      ?>
    </div>
      <? require 'blocks/aside.php'; ?>

</main>
  <? require 'blocks/footer.php'; ?>
</body>
</html>
