<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['name'])) {$name = $_POST['name'];}else{
    echo 'Введите имя';
  }
  if (isset($_POST['phone'])) {$phone = $_POST['phone'];}else{
    echo 'Введите телефон';
  }  
  $to = "atokusheva79@mail.ru"; /*Укажите адрес, га который должно приходить письмо*/
  $sendfrom   = "danex.ltd"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
  $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
  $subject = "Заявка с сайта";
  $message = "Заявка с сайта <br>
 <b>Имя пославшего:</b> $name <br>
 <b>Телефон:</b> $phone";
  $send = mail ($to, $subject, $message, $headers);
  if ($send == 'true')
  {
    echo '<center>
            Спасибо за отправку вашего сообщения!
          </center>';
  }
  else
  {
    echo '<center>

            <b>Ошибка. Сообщение не отправлено!</b>

          </center>';
  }
} else {
  http_response_code(403);
  echo "Попробуйте еще раз";
}

?>