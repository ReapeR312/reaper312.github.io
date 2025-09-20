<?php
$token = "";
$chat_id = "";

if ($_POST['act'] == 'order') {
    $name = $_POST['name'];
	$phone = $_POST['phone'];
	$message = urlencode("Новая заявка:\nИмя: $name\nТелефон: $phone");

	$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);

	if ($response === false) {
		echo 'Ошибка: ' . curl_error($ch);
	} else if ($token == ""|| $chat_id == "") {
		echo "Проверьте данные (надо поправить php файл. Указать токен и id чата)";
	}else {
		$back = $_SERVER['HTTP_REFERER'] ?? '/'; 
        header("Location: $back");
        exit;
	}

	curl_close($ch);
}
?>
