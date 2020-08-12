<?php


$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "root");
$sql = "INSERT INTO my_db (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

header("Location: /lesson_9.php");