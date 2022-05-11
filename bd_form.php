<?php

$dbhost = "registration";
$dbname = "registration";
$username = "root";
$password = " ";

$conn = new PDO("root:host=$dbhost;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO registr (name, lastname, mail, password)
VALUES ('{$_POST['name']}, {$_POST['lastname']}, {$_POST['mail']}, {$_POST['password']}')";

$conn->exec($sql);
$conn = null;
?> 