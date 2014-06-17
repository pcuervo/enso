<?php

	$nombre = $_POST['name'];
	$telefono = $_POST['phone'];
	$email = $_POST['email'];
	$ciudad = $_POST['city'];
	$consumo = $_POST['consumo'];

	//add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
	//wp_mail($to, $subject, $message, $headers );

	// FILE UPLOAD
	$uploaddir = '../../uploads/';
	//$uploaddir = 'http://ensoenergia.com/wp-content/uploads/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if((!empty($_FILES["userfile"])) && ($_FILES['uploaded_file']['error'] == 0)) {
		$filename = basename($_FILES['userfile']['name']);
		$ext = substr($filename, strrpos($filename, '.') + 1);
		if ((($ext == "jpg") && ($_FILES["userfile"]["type"] == "image/jpeg") || (($ext == "png") && ($_FILES["userfile"]["type"] == "image/png")) || (($ext == "pdf") && ($_FILES["userfile"]["type"] == "application/pdf"))) && 
		($_FILES["uploaded_file"]["size"] < 3500000)) {
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			  $error = 0;
			} 
		} else {
			$error = 2;
		}
	} else {
	  $error = 1;
	}

	//$to = 'contacto@ensoenergia.com';
	$to = 'contacto@ensoenergia.com';
	$subject = $nombre.' te ha contactado';
	$headers = 'From: '.$nombre.' <contacto@ensoenergia.com>' . "\r\n";
	$headers.= "MIME-Version: 1.0\r\n"; 
	$headers.= "Content-Type: text/html; charset=utf-8\r\n"; 
	$headers.= "X-Priority: 1\r\n"; 
	$message = '<html><body>';
	$message .= '<h1>Cálculo de ahorro</h1>';
	$message .= '<p>Nombre: '.$nombre.'</p>';
	$message .= '<p>Email: '. $email . '</p>';
	$message .= '<p>Teléfono: '. $telefono . '</p>';
	$message .= '<p>Ciudad: '. $ciudad . '</p>';
	$message .= '<p>Consumo: '. $consumo . '</p>';
	$message .= '<p>Archivo subido: <a href="http://ensoenergia.com/wp-content/uploads/'. basename($_FILES['userfile']['name']) . '">Ver archivo</a></p>';
	$message .= '</body></html>';
	
	mail($to, $subject, $message, $headers); 

	// Código errores
	// 1=no hay archivo; 2=imagen excede tamaño; 3=ya existe imagen con ese nombre
	header("Location: http://ensoenergia.com?er=".$error."#ahorro");


?> 