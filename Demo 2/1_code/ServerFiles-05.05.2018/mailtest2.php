  <?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  require('./classes/phpmailer/phpmailer.php');
  $mail=new PHPMailer();
$mail->CharSet = 'UTF-8';

$body = 'This is the message';

$mail->IsSMTP();
$mail->Host       = 'ssl://smtp.gmail.com';

$mail->SMTPSecure = 'tls';
$mail->Port       = 465;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;

$mail->Username   = 'autohome1515@gmail.com';
$mail->Password   = 'Autohome123';

$mail->SetFrom('me.sender@gmail.com', $name);
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
$mail->Subject    = 'subject';
$mail->MsgHTML($body);

$mail->AddAddress('kyle.ed.ross@gmail.com' );

$mail->send();
echo "An Activation Code is sent!";

			?>
