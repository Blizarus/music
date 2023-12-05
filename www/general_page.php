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
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <a href="general_page.php">Музыкальный сервис</a>
  </header>
  <main class="main">
    <div class="container">
      <?php require_once('settings.php'); ?>
      <section class="content-news">
        <article class="news-block">
          <h2 class="content-wrapper_text">Новые композиции</h2>
          <p class="content-news_description">Подборка новых композиций в сервисе</p>
          <a href="#" class="news-block-news_link"><img src="image/link.svg" alt="ИконкаПерехода"></a>
        </article>
        <article class="news-block">
          <h2 class="content-wrapper_text">Топ прослушиваемых композиций</h2>
          <p class="content-news_description">Наиболее прослушиваемые композиции пользователями сервиса</p>
          <a href="#" class="news-block-news_link"><img src="image/link.svg" alt="ИконкаПерехода"></a>
        </article>
        <article class="news-block">
          <h2 class="content-wrapper_text">Для Вас </h2>
          <p class="content-news_description">Случайные музыкальные композиции, подобранные согласно вашим предпочтениям</p>
          <a href="#" class="news-block-news_link"><img src="image/link.svg" alt="ИконкаПерехода"></a>
        </article>
        <article class="news-block">
          <h2 class="content-wrapper_text">Новое для Вас</h2>
          <p class="content-news_description">Новые музыкальные композиции, подобранные согласно вашим предпочтениям</p>
          <a href="#" class="news-block-news_link"><img src="image/link.svg" alt="ИконкаПерехода"></a>
        </article>
      </section>
    </div>
  </main>
</body>
</html>