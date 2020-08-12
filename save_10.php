<?php
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "root");

$sql = "SELECT * FROM my_db WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);
if(!empty($task)) {
    $message = "Введенная запись уже присутствует в таблице.";
    $_SESSION['danger'] = $message;
    header("Location: /lesson_10.php");
    exit;
}

$sql = "INSERT INTO my_db (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

$message = "Введенная запись уже присутствует в таблице.";
    $_SESSION['success'] = $message;

header("Location: /lesson_10.php");