<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
include_once (ROOT."/connectData.php");

$name = $_POST['name'];
$email = $_POST['email'];
$mark = $_POST['mark'];
$text = $_POST['text'];
$time = date('l jS \of F Y h:i:s A');

$sql = "INSERT INTO `comments` (`name`, `email`, `mark`, `time`, `text`) VALUES ('$name', '$email', '$mark', '$time', '$text')";
$statement = $pdo->prepare($sql);
$statement->execute();
$success = "Данные отправились";
echo $success;
header('Location: /');
