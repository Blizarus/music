<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
  <header class="header">
    <a href="general_page.php">Музыкальный сервис</a>
  </header>
  <main class="main">
    <div class="container">
      <?php require_once('settings.php'); ?>
      <section class="content">
        <div class="content-head">
        </div>
        <div class="content-main">
        <p><button type="button"> <img src="" alt="ИконкаПлюса">Выбрать файлы</button></p>
        <p><button type="button"> <img src="" alt="ИконкаКрестика">Отменить</button></p>
        <a>Перетащите сюда файл музыки</a>
        <h3 class="content-wrapper__text">Название</h3>
        <input class="entrance-input" type="text" name="name_composition" id="composition">
        <h3 class="content-wrapper__text">Исполнитель</h3>
        <input class="entrance-input" type="text" name="name_artist" id="artist">
        <h3 class="content-wrapper__text">Жанр</h3>
        <input class="entrance-input" type="text" name="name_genre" id="genre">
        <h3 class="content-wrapper__text">Наличие голоса</h3>
        <p><select name="presencevoice">
        <option value="1">Инструментальная музыка</option>
        <option value="0" selected>Вокальная музыка</option> 
        </select> 
        <h3 class="content-wrapper__text">Тональность</h3>
        <h3 class="content-wrapper__text">BPM</h3>
        <input class="entrance-input" type="text" name="BPM" id="BPM">
        </div>
      </section>
    </div>
  </main>
</body>
</html>