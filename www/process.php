<?php
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

$conn = new mysqli('music', 'root', '', 'music');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из POST-запроса
$login = $_POST['login'];
$password = $_POST['password'];

// Поиск пользователя в базе данных

$sql = "select * from login_password where login = '$login' and password = sha1('$password')";
$result = $conn->query($sql);


if ($result->num_rows < 0) {
    echo json_encode(array('success' => false));

}
else{
    $_SESSION['login'] = $login;
    echo json_encode(['success' => true]);
}
$conn->close();
?>