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
                        <img src="image/search_page.svg" alt="ИконкаПоиска">
                        <a href="#" class="settings__link">Поиск копозиции</a>
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
            <section class="content">
                <div class="content-head">
                <form action="results.php" method="post">
                  <?php
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  $conn = new mysqli('music', 'root', '', 'music');
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
                  
                  // Получение данных из POST-запроса
                  $login = $_POST['login'];
                  $password = $_POST['password'];
                  
                  // Поиск пользователя в базе данных
                  
                  $sql = "select * from criteria";
                  $result = $conn->query($sql);
                  while ($row = mysqli_fetch_row($result))
                  {
                    // echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                    echo '<p><button type="button" onclick="hideButtonAndShowInput(this.id)" id ="button'.$row[0].'"> <img src="" alt="ИконкаДобавления" >Поиск '.$row[1].'</button></p>';
                  }

                 
                  mysqli_data_seek($result, 0);

                  while ($row = mysqli_fetch_row($result))
                  {
                    echo 
                    '<input class="content-head__input" type="text" id ="input'.$row[0].'" style="display: none" value="Поиск '.$row[1].'">
                    <button type="button" onclick="hideInputAndShowButton(this.id)" class="content-head__button" id ="button_hide'.$row[0].'" style="display: none" >
                      <img class="content-head__image" src="image/close.svg" alt="ИконкаКрестика">
                    </button>';
                    
                  }
                  echo 
                  '<button class="content-head__button" id ="button_search">
                    <img class="content-head__image update" src="" alt="ИконкаПоиска">
                  </button>';
                  ?>
                </form>
                </div>
                <div class="content-main">
                    <div class="content-music">
                        <div class="content-wrapper">
                            <img class="content-wrapper__image" src="" alt="">
                            <div class="content-wrapper__info">
                                <h3 class="content-wrapper__text">Ace Of Base</h3>
                                <ul class="content-wrapper__list">
                                    <li class="content-wrapper__list-item">
                                        Жанр: Поп
                                    </li>
                                    <li class="content-wrapper__list-item">
                                        Год основания: 1990
                                    </li>
                                    <li class="content-wrapper__list-item">
                                        Число прослушиваний: 0
                                    </li>
                                </ul>
                                <button class="content-wrapper__buttons">Показатель все характеристики</button>
                            </div>
                        </div>
                        <div class="content-wrapper">
                            <img class="content-wrapper__image" src="image/anikv.jpeg" alt="">
                            <div class="content-wrapper__info">
                                <h3 class="content-wrapper__text">Anikv</h3>
                                <ul class="content-wrapper__list">
                                    <li class="content-wrapper__list-item">
                                        Жанр: RnB
                                    </li>
                                    <li class="content-wrapper__list-item">
                                        Год основания: 2018
                                    </li>
                                    <li class="content-wrapper__list-item">
                                        Число прослушиваний: 1
                                    </li>
                                </ul>
                                <button class="content-wrapper__buttons">Показатель все характеристики</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
  </main>
</body>

<script>
 function hideButtonAndShowInput(buttonId) {
        // Получаем элемент кнопки по её id
        var button = document.getElementById(buttonId);

        // Получаем соответствующий элемент input по id
        var input = document.getElementById('input' + buttonId.slice(-1));
        var button_hide = document.getElementById('button_hide' + buttonId.slice(-1));

        // Проверяем, существуют ли такая кнопка и соответствующий input
        if (button && input) {
            // Скрываем кнопку
            button.style.display = 'none';

            // Показываем соответствующий input
            input.style.display = 'block';
            button_hide.style.display = 'block';

        }
    }
    function hideInputAndShowButton(buttonId) {
        // Получаем элемент кнопки по её id
        var button_hide = document.getElementById(buttonId);

        // Получаем соответствующий элемент input по id
        var input = document.getElementById('input' + buttonId.slice(-1));

        
        var button = document.getElementById('button' + buttonId.slice(-1));


        // Проверяем, существуют ли такая кнопка и соответствующий input
        if (button && input) {
            // Скрываем кнопку
            button_hide.style.display = 'none';
            input.style.display = 'none';

            // Показываем соответствующий input
            button.style.display = 'block';

        }
    }
    function performSearch() {
      var searchData = {};

      // Получаем значения всех input
      <?php
      mysqli_data_seek($result, 0);
      while ($row = mysqli_fetch_row($result)) {
          echo "var inputElement = document.getElementById('input".$row[0]."');\n";
          echo "searchData['".$row[0]."'] = inputElement.value;\n";
          echo "
          if (inputElement.value === 'Поиск ".$row[1]."'){ 
            searchData['".$row[0]."'] = ''; 
          }\n";
      }
      ?>

      // Отправляем данные на сервер
      fetch('search.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify(searchData),
      })
      .then(response => response.json())
      .then(data => {
          // Обработка данных, полученных с сервера
          console.log(data);
      })
      .catch((error) => {
          console.error('Error:', error);
      });
    }
</script>
</html>