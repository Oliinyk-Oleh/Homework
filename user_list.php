<!DOCTYPE html>
<html lang="ru">
<head>
  <?
  $website_title= 'Список пользователей';
   require 'blocks/head.php'; ?>
</head>
<body>
  <? require 'blocks/header.php'; ?>
</div>
<main class="container mt-5">
  <div class="row">
    <div class="col-md-8 mb-3">
    <h4>Список пользователей</h4>
    <ul class="list-group" id="list">

  </ul>
    </div>
      <? require 'blocks/aside.php'; ?>

</main>
  <? require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>

    $(document).ready(function () {

      $.ajax({
        url: 'ajax/user_list.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function(data) {
          if(data != 'none') {
            $('#list').html(data);
          }

        }
      });
    });

    function deleteUser(id) {
      $.ajax({
        url: 'ajax/del_user.php',
        type: 'POST',
        cache: false,
        data: {'id' : id},
        dataType: 'html',
        success: function() {
      }
    });
}

  </script>
</body>
</html>
