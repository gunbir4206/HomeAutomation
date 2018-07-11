<?php

	require_once "/usr/share/php/Mail.php";
	$host = "ssl://smtp.gmail.com";
        $username = "autohome1515@gmail.com";
        $password = "Autohome123";
	$port = "465";
	$to = "kyle.ed.ross@gmail.com";

	$email_from = "autohome1515@gmail.com";
	$email_subject = "Subject line" ;
	$email_body = "Thank you for registering at demo site.</p>
	                        <p>To activate your account, please click on this link: <a href='http://100.8.176.108/activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			                        <p>Regards Site Admin</p>";
$email_address = "autohome1515@gmail.com";
	$content = "text/html; charset=utf-8";
	$mime = "1.0";

	$headers = array ('From' => $email_from,'To' => $to,
	       		'Subject' => $email_subject,
			'Reply-To' => $email_address,
			'MIME-Version' => $mime,
			'Content-type' => $content);
	$params = array  ('host' => $host,
		'port' => $port,
		'auth' => true,
		'username' => $username,
		'password' => $password);

	$smtp = Mail::factory ('smtp', $params);
	$mail = $smtp->send($to, $headers, $email_body);


	if (PEAR::isError($mail)) {echo("<p>" . $mail->getMessage() . "</p>");} else {echo("<p>Message sent successfully!</p>");							            }
									        ?>
