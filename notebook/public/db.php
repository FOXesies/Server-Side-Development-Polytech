<?php
$host = 'sql102.infinityfree.com';
$user = 'if0_41928189';
$pass = 'Kj316V5Kg0c';
$db_name = 'if0_41928189_notebook';

$conn = new mysqli($host, $user, $pass, $db_name);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$conn->set_charset("utf8");