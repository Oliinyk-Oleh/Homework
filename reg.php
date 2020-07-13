<!DOCTYPE html>
<html lang="ru">
<head>
  <?
  $website_title= 'Регистрация на сайте';
   require 'blocks/head.php'; ?>


</head>
<body>
  <? require 'blocks/header.php'; ?>

</div>
<main class="container mt-5">
  <div class="row">
    <div class="col-md-8 mb-3">
    <h4>Форма регистрации</h4>
    <form action="" method="post">
      <label for="username">Ваше имя</label>
      <input type="text" name="username" id="username" class="form-control">

      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" class="form-control">

      <label for="login">Логин</label>
      <input type="text" name="login" id="login" class="form-control">

      <label for="pass">Пароль</label>
      <input type="password" name="pass" id="pass" class="form-control">

      <div class="alert alert-danger mt-3" id="errorBlock"></div>

      <button type="button" id="reg_user" class="btn btn-success mt-5">
        Зарегистрироваться
      </button>
    </form>
    </div>
      <? require 'blocks/aside.php'; ?>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  $('#reg_user').click(function () {
    var name = $('#username').val();
    var email = $('#email').val();
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
      url: 'ajax/reg.php',
      type: 'POST',
      cache: false,
      data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
      dataType: 'html',
      success: function(data) {
        if(data == 'Готово') {
          $('#reg_user').text('Все готово');
          $('#errorBlock').hide();
        }
        else {
          $('#errorBlock').show();
          $('#errorBlock').text(data);
        }
      }
    });
  });
</script>
<? require 'blocks/footer.php'; ?>
</body>
</html>
