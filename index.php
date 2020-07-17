<?php
	header('Content-Type: application/json;charset=utf-8');
	require_once 'Mail.php';

	const MAIL_FROM             = 'Name mail from <nick@mail.com>';
	const SMTP_SERVER_HOST      = 'smtp.office365.com'; // or whatever server SMTP
	const SMTP_SERVER_USER      = 'nick@mail.com';
	const SMTP_SERVER_PASSWORD  = '';

	$post_values 				= json_decode(file_get_contents('php://input'), true);

	if(!isset($post_values['to'])){
		echo return_json(2, "'To' input can't be empty");
		exit();
	}else{
		$mail_to = '';
		foreach($post_values['to'] AS $key => $mail){
			$mail_to .= $mail["name"] . ' <' . $mail["email"] . '> ';
			if($key == 0){
				$mail_to .= ', ';
			}
		}
	}

	$mail_subject				= 'No subject';
	$mail_subject				= '=?UTF-8?B?' . base64_encode($post_values['subject']) . '?=';

	$mail_message			    = ' ';
	$mail_message			    = $post_values['message'];

	$headers = array(
		'From'		=> MAIL_FROM,
		'To'		=> $mail_to,
		'Subject'	=> $mail_subject,
		'Content-Type' => "text/html; charset=UTF-8"
	);

	$smtp = Mail::factory(
		'smtp',
   		array(
			'host'		=> SMTP_SERVER_HOST,
	 		'auth'		=> true,
	 		'username'	=> SMTP_SERVER_USER,
			'password'	=> SMTP_SERVER_PASSWORD
		)
	);

	$mail = $smtp -> send($mail_to, $headers, $mail_message);

	if(PEAR::isError($mail)){
		echo return_json(0, $mail -> getMessage());
	}else{
		echo return_json(1, 'Message successfully sent!');
	}

	function return_json($status = 4, $response = "Internal message error"){
		return json_encode(
			array(
				'status'	=> $status,
				'response' 	=> $response,
			)
		);
	}
 ?>