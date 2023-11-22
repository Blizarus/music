<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <a href="general_page.php">Музыкальный сервис</a>
  </header>
  <main class="main">
    <div class="entrance">
        <form action="new_client.php" method="post">
            <h1>Вход в учетную запись</h1>
            <p><a>Логин пользователя</a></p>
            <input type="text" value="Логин">
            <p><a>Пароль пользователя</a></p>
            <input type="text" value="Пароль">
            <p><button><img src="" alt="ИконкаВхода">Выполнить вход</button></p>
            <p><button onclick="#"><img src="" alt="ИконкаРегистрации">Зарегистрироваться</button></p>
        </form>
    </div>
  </main>
</body>