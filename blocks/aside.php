<aside class="col-md-4">
  <div class="p-3 mb-3 bg-warning rounded">
    <h4>
      <b>Интересные факты</b>
    </h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam quis
       corrupti exercitationem doloribus vitae modi tempora quam sapiente
        voluptate nostrum. Voluptate quibusdam fuga quae nostrum temporibus
         sed ducimus molestiae, repellat.</p>
  </div>
  <div class="p-3 mb-3">
    <img class="img-thumbnail" src="https://itproger.com/img/news/1540628740.jpg">
  </div>
  <form action="" method="post">
      <li class=" list-group-item list-group-item-warning mb-3" id="empty">  Пока сообщенй нет</li>
        <ul class="list-group" id="message_list">
        </ul>
    <input type="message" name="message" id="message" class="form-control ">
    <div class="alert alert-danger mt-3" id="errorBlock"></div>

    <button type="button" id="message_send" class="btn btn-success mt-3">
      Отправить
    </button>
  </form>
</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

$('#message_send').click(function () {
  var message = $('#message').val();

  $.ajax({
    url: 'ajax/chat.php',
    type: 'POST',
    cache: false,
    data: {'message' : message},
    dataType: 'html',
    success: function(data) {
      if(data == 'Введите сообщение') {
        $('#errorBlock').show();
        $('#errorBlock').text(data);

      }

      else {
        $('#message').val('');
        $('#errorBlock').hide();

      }
    }
    });
    });




var interval = 1000;
function doAjax() {
    $.ajax({
            url: 'ajax/chat_refresh.php',
            dataType: 'html',
            success: function (data) {
              if(data != 'none') {
                $('#message_list').html(data);
                $('#empty').hide();

            }

            },
            complete: function (data) {
                    setTimeout(doAjax, interval);
            }

    });

}
setTimeout(doAjax, interval);



</script>
