<?php

$driver = 'mysql'; // тип базы данных, с которой мы будем работать 
$host = '127.0.0.1';// альтернатива '127.0.0.1' - адрес хоста, в нашем случае локального
$db_name = 'api'; // имя базы данных 
$db_user = 'root'; // имя пользователя для базы данных 
$db_password = ''; // пароль пользователя 
$charset = 'utf8'; // кодировка по умолчанию 
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; // массив с дополнительными настройками подключения. В данном примере мы установили отображение ошибок, связанных с базой данных, в виде исключений 

try {
    $dsn = "$driver:host=$host;dbname=$db_name;charset=$charset"; $pdo = new PDO($dsn, $db_user, $db_password, $options); // подставляем переменные для подключения к бд
}

catch(PDOException $e) {
    die('Error :' . $e->getMessage()); // выводим ошибку в подключении
};
