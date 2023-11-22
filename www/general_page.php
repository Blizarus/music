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
    <div class="container">
    <section class="settings">
                <nav class="settings__nav">
                  <span class="settings__text">Основное</span>
                  <ul class="settings__list">
                      <li class="settings__list-item">
                        <img src="" alt="ИконкаГлавная">
                        <a href="#" class="settings__link">Главная</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="" alt="ИконкаИсполнителей">
                        <a href="#" class="settings__link">Исполнители</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="" alt="ИконкаЖанров">
                        <a href="#" class="settings__link">Жанры</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="" alt="ИконкаКомпозиции">
                        <a href="#" class="settings__link">Все композиции</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="" alt="ИконкаАнализа">
                        <a href="#" class="settings__link">Анализ композиции</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="" alt="ИконкаПоиска">
                        <a href="#" class="settings__link">Поиск копозиции</a>
                      </li>
                  </ul>
                  <span class="settings__text">Настройки</span>
                  <ul class="settings__list">
                    <li class="settings__list-item">
                      <img src="" alt="ИконкаПрофиля">
                      <a href="entrance.php" class="settings__link">Войти в профиль</a>
                    </li>
                    <!-- <li class="settings__list-item">
                      <img src="" alt="ИконкаПрофиля">
                      <a href="#" class="settings__link">Просмотр профиля</a>
                    </li>
                    <li class="settings__list-item">
                      <img src="" alt="ИконкаИзмененияПрофиля">
                      <a href="#" class="settings__link">Настройки профиля</a>
                    </li> -->
                  </ul>
                  <!-- <span class="settings__text">Администрирование</span>
                  <ul class="settings__list">
                    <li class="settings__list-item">
                      <img src="" alt="ИконкаДобавления">
                      <a href="#" class="settings__link">Добавление новой композиции</a>
                    </li>
                    <li class="settings__list-item">
                      <img src="" alt="ИконкаИзменения">
                      <a href="#" class="settings__link">Изменение композиции</a>
                    </li>
                    <li class="settings__list-item">
                      <img src="" alt="ИконкаСтатистики">
                      <a href="#" class="settings__link">Статистика пользователей</a>
                    </li>
                    <li class="settings__list-item">
                      <img src="" alt="ИконкаПользователей">
                      <a href="#" class="settings__link">Изменение данных пользователей</a>
                    </li>
                  </ul> -->
                </nav>
            </section>
            <section class="content">
              <div class="content-main">
                <div class="content-news">
                  <article class="news-block">
                    <h2 class="news_heading">Новые композиции</h2>
                    <p class="news_description">Подборка новых композиций в сервисе</p>
                    <a href="#" class="news__link"><img src="" alt="ИконкаПерехода"></a>
                  </article>
                  <article class="news-block">
                    <h2 class="news_heading">Топ прослушиваемых композиций</h2>
                    <p class="news_description">Наиболее прослушиваемые композиции пользователями сервиса</p>
                    <a href="#" class="news__link"><img src="" alt="ИконкаПерехода"></a>
                  </article>
                  <article class="news-block">
                    <h2 class="news_heading">Для Вас </h2>
                    <p class="news_description">Случайные музыкальные композиции, подобранные согласно вашим предпочтениям</p>
                    <a href="#" class="news__link"><img src="" alt="ИконкаПерехода"></a>
                  </article>
                  <article class="news-block">
                    <h2 class="news_heading">Новое для Вас</h2>
                    <p class="news_description">Новые музыкальные композиции, подобранные согласно вашим предпочтениям</p>
                    <a href="#" class="news__link"><img src="" alt="ИконкаПерехода"></a>
                  </article>
                </div>
              </div>
            </section>
    </div>
  </main>
</body>
</html>