<?php
$errors = '';
$myemail = 'gerg2012@abv.bg';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Грешка: невалиден e-mail адрес";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Съобщение от $name";
$email_body = "Получихте съобщение от $name \n ".
"Email: $email\n\n $message";
$headers = "От: $email\n";
$headers .= "Reply-To: $email";
mail($to,$email_subject,$email_body,$headers);
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<p>Съобщението е изпратено<p>
</body>
</html>
