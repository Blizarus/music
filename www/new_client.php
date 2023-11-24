<?php
session_start();

$conn = new mysqli('music', 'root', '', 'music');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из POST-запроса
$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$email = $_POST['email'];


// Поиск пользователя в базе данных
$sql1 = "select * from customers where email = '$email'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    echo json_encode(array('status' => 'exists'));
}
else{
    $sql = "select * from login_password where login = '$login' and password = sha1('$password')";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo json_encode(array('status' => 'change'));
    }
    else{
        $conn->query("INSERT INTO customers VALUES (NULL, '$name', '$lname', '$email', 'Russia', 0)");
        $conn->query("INSERT INTO login_password VALUES (NULL, '$login', SHA1('$password'))");
        $_SESSION['login'] = $login;
        echo json_encode(['status' => 'success']);
    }
}
$conn->close();
?>