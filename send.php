<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

# проверка, что ошибки нет
if (!error_get_last()) {

  // Переменные, которые отправляет пользователь
  $select = $_POST['select'];
  $email = $_POST['email'];
  $text = $_POST['text'];



  // Формирование самого письма
  $title = "Новое обращение с сайта";
  $body = "
    <h2>Обратная связь с сайта</h2>
    <b>Тема:</b> $select<br>
    <b>Почта:</b> $email<br><br>
    <b>Сообщение:</b><br>$text
    ";

  // Настройки PHPMailer
  $mail = new PHPMailer\PHPMailer\PHPMailer();

  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth = true;
  //$mail->SMTPDebug = 2;
  $mail->Debugoutput = function ($str, $level) {
    $GLOBALS['data']['debug'][] = $str; };

  // Настройки вашей почты
  $mail->Host = 'smtp.mail.ru'; // SMTP сервера вашей почты
  $mail->Username = 'vasil1987-ivan@mail.ru'; // Логин на почте
  $mail->Password = 'H7J1mep7Vx3JQhB4nCgh'; // Пароль на почте
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('vasil1987-ivan@mail.ru', 'Petrova'); // Адрес самой почты и имя отправителя

  // Получатель письма
  $mail->addAddress('dev.burmi@gmail.com');
  // $mail->addAddress('artemferzauli@gmail.com');
  // Ещё один, если нужен

  // Прикрипление файлов к письму
  if (!empty($file['name'][0])) {
    for ($i = 0; $i < count($file['tmp_name']); $i++) {
      if ($file['error'][$i] === 0)
        $mail->addAttachment($file['tmp_name'][$i], $file['name'][$i]);
    }
  }
  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  // Проверяем отправленность сообщения
  if ($mail->send()) {

    header('location: thank-you.html');
    $data['result'] = "success";
    $data['info'] = "Сообщение успешно отправлено, мы свяжемся с вами в ближайшее время!";
  } else {
    $data['result'] = "error";
    $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
    $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
  }

} else {
  $data['result'] = "error";
  $data['info'] = "В коде присутствует ошибка";
  $data['desc'] = error_get_last();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);

?>
