<?php<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$ip = getenv('REMOTE_ADDR');
$name = $_POST["name"];
$phone = htmlspecialchars($_POST["phone"]);
$hero =$_POST["hero"];
/* Устанавливаем e-mail адресата */
$myemail = "xlabuchik@gmail.com";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$name = check_input($_POST["name"], "Пожалуйста, введите Ваше имя!");
$phone = check_input($_POST["phone"], "Укажите, пожалуйста, номер Вашего телефона! (Нужен, для того чтобы мы могли связаться с Вами).");

/* Создаем новую переменную, присвоив ей значение */
$message_to_myemail = "Hello! <br>
хотят отдохнуть в: $hero <br>
захотел: $name <br>
сказал чтоб перезвонили ему: $phone <br>
IP-адрес:$ip <br>
End";
/* Отправляем сообщение, используя mail() функцию */
$from  =  "From: $yourname <$email> \r\n Reply-To: $email \r\n"
          ."Content-Type: text/html; charset=\"utf-8\"\r\n";
mail($myemail, $tema, $message_to_myemail, $from);

?>
<p>Ваше сообщение было успешно отправлено!</p>
<p>На <a href="index.html">Главную >>></a></p>
<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
<p>Пожалуйста, исправьте следующую ошибку:</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>