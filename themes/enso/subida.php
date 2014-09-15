<?php 
	use foundationphp\UploadFile;
	
	session_start();

	$nombre = $_POST['name'];
	$telefono = $_POST['phone'];
	$email = $_POST['email'];
	$ciudad = $_POST['city'];
	$consumo = $_POST['consumo'];
	$name = 'x';
	$isUploaded = false;

	$max = 1000 * 1024;
	$result = array();
	if (isset($_POST['upload'])) {

		require 'src/foundationphp/UploadFile.php';
		$destination = __DIR__ . '/uploaded/';

		//$destination = '../../uploads/';
		try {
			$upload = new UploadFile($destination);
			//$upload->allowAllTypes();
			$upload->setMaxSize($max);
			$upload->upload();
			$result = $upload->getMessages();
			$name = $upload->getName();
			$isUploaded = true;
		} catch (Exception $e) {
			$result[] = $e->getMessage();
		}

		$_SESSION['msg'] = $result;
		$_SESSION['uploaded'] = $isUploaded;
	}

	if($isUploaded) {
		//$to = 'contacto@ensoenergia.com';
		$to = 'miguel@pcuervo.com, contacto@ensoenergia.com, jaquez@wesawsatan.com';
		$subject = $nombre.' te ha contactado';
		//$headers = 'From: '.$nombre.' <contacto@ensoenergia.com>' . "\r\n";
		$headers = "From: ".$nombre." <".$email."> \r\n";
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
		$message .= '<p>Archivo subido: <a href="http://ensoenergia.com/wp-content/themes/enso/uploaded/'.$name.'">Ver archivo</a></p>';

		$message .= '</body></html>';
		
		mail($to, $subject, $message, $headers); 
	}
	
	
	header("Location: http://ensoenergia.com#ahorro");
	//header("Location: google.com");
?>