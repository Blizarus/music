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
    <section class="settings">
                <nav class="settings__nav">
                  <span class="settings__text">Основное</span>
                  <ul class="settings__list">
                      <li class="settings__list-item">
                        <img src="image/mainpage.svg" alt="ИконкаГлавная">
                        <a href="general_page.php" class="settings__link">Главная</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="image/ticket.svg" alt="ИконкаИсполнителей">
                        <a href="#" class="settings__link">Исполнители</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="image/computer.svg" alt="ИконкаЖанров">
                        <a href="#" class="settings__link">Жанры</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="image/playback.svg" alt="ИконкаКомпозиции">
                        <a href="#" class="settings__link">Все композиции</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="image/analize.svg" alt="ИконкаАнализа">
                        <a href="#" class="settings__link">Анализ композиции</a>
                      </li>
                      <li class="settings__list-item">
                        <img src="image/search.svg" alt="ИконкаПоиска">
                        <a href="search_page.php" class="settings__link">Поиск копозиции</a>
                      </li>
                  </ul>
                  <span class="settings__text">Настройки</span>
                  <ul class="settings__list">
                    <?php
                      if (!isset($_SESSION['login'])){
                        echo'
                        <li class="settings__list-item">
                          <img src="image/login.svg" alt="ИконкаПрофиля">
                          <a href="entrance.php" class="settings__link">Войти в профиль</a>
                        </li>

                        <li class="settings__list-item">
                          <img src="image/reg.svg" alt="ИконкаРегистрации">
                          <a href="registration.html" class="settings__link">Зарегистрироваться</a>
                        </li>
                        ';
                      }
                      else{
                        echo'
                        <li class="settings__list-item">
                          <img src="image/login.svg" alt="ИконкаПрофиля">
                          <a href="#" class="settings__link">Просмотр профиля</a>
                        </li>

                        <li class="settings__list-item">
                          <img src="image/settings.svg" alt="ИконкаИзмененияПрофиля">
                          <a href="#" class="settings__link">Настройки профиля</a>
                        </li>

                        <li class="settings__list-item">
                          <img src="image/exit.svg" alt="ИконкаВыхода">
                          <a href="logout.php" class="settings__link">Выйти из профиля</a>
                        </li>';
                      }
                    ?>
                      
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