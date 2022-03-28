<?php
$driver = 'mysql'; // тип базы данных, с которой мы будем работать 
$host = '127.0.0.1';// альтернатива '127.0.0.1' - адрес хоста, в нашем случае локального
$db_name = 'products'; // имя базы данных 
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


$sql = "select product.product_id, product_description.name, country_description.country_name 
from product
INNER JOIN product_description ON product.product_id = product_description.product_id
INNER JOIN country ON product.country_id = country.country_id
INNER JOIN country_description ON country.country_id = country_description.country_id 
where product.status = 1 
and product.product_id > 5 && product.product_id < 11 
and product_description.language_id = 1
ORDER BY product.product_id ASC"; // формируем запрос для бд

$statement = $pdo->prepare($sql); // передаем значения в pdo
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<pre><?
var_dump($result); 
?>
</pre>