<?php
$token = "7849389193:AAGTWxSJrAoNORFzHNekodsC70XheR61Abc";
$chat_id = "541380619";

if ($_POST['act'] == 'order') {
    $name = $_POST['name'];
	$phone = $_POST['phone'];
	$message = urlencode("Новая заявка:\nИмя: $name\nТелефон: $phone");
	
	$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response) {
        echo "Заявка отправлена!";
    } else {
        echo "Ошибка при отправке";
    }
}
?>