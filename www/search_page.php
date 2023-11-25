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
                <form action="search.php" method="post">
                  <?php
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  $conn = new mysqli('music', 'root', '', 'music');
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
                  
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
                  '<button  onclick="performSearch()" class="content-head__button" id ="button_search">
                    <img class="content-head__image update" src="" alt="ИконкаПоиска">
                  </button>';
                  ?>
                </form>
                </div>
                <div class="content-main">
                    <div class="content-music" id="searchResults">

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
</script>
<script>
    function performSearch() {
    var formData = new FormData();

    <?php
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_row($result)) {
        echo "var inputElement = document.getElementById('input".$row[0]."');\n";
        echo "formData.append('".$row[0]."', inputElement.value);\n";
        echo "
        if (inputElement.value === 'Поиск ".$row[1]."'){ 
            formData.set('".$row[0]."', '');
        }\n";
    }
    ?>
    console.log("Printing formData:");
    formData.forEach(function(value, key){
        console.log(key, value);
    });


    // Отправляем данные на сервер
    fetch('search.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        // Обработка данных, полученных с сервера
        displayResults(data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

</script>

<script>

    function displayResults(data) {
    var resultsContainer = document.getElementById('searchResults');

    // Очищаем контейнер перед вставкой новых результатов
    resultsContainer.innerHTML = '';

    if (data.success) {
        data.results.forEach(result => {
            // Создаем элементы для отображения результата
            var contentWrapper = document.createElement('div');
            contentWrapper.className = 'content-wrapper';

            var imageElement = document.createElement('img');
            imageElement.className = 'content-wrapper__image';
            imageElement.src = result.cover; // Замените на путь к изображению из данных

            var infoWrapper = document.createElement('div');
            infoWrapper.className = 'content-wrapper__info';

            var titleElement = document.createElement('h3');
            titleElement.className = 'content-wrapper__text';
            titleElement.textContent = result.name; // Замените на соответствующее поле из данных

            var listElement = document.createElement('ul');
            listElement.className = 'content-wrapper__list';

            // Создаем элементы списка для каждого поля
            var genreElement = createListItem('Жанр', result.genre); // Передайте поле из данных
            var artistElement = createListItem('Исполнитель', result.artist); // Передайте поле из данных
            var durationElement = createListItem('Продолжительность', result.duration); // Передайте поле из данных
            var presencevoiceElement = createListItem('Наличие голоса', result.presencevoice); // Передайте поле из данных
            var tonalityElement = createListItem('Тональность', result.tonality); // Передайте поле из данных
            var bpmElement = createListItem('BPM (Ударов в минуту)', result.bpm); // Передайте поле из данных
            var auditionsElement = createListItem('Количество прослушиваний', result.auditions); // Передайте поле из данных

            // Создаем кнопку
            var buttonElement = document.createElement('button');
            buttonElement.className = 'content-wrapper__buttons';
            buttonElement.textContent = 'Показатель все характеристики';

            // Добавляем созданные элементы в DOM
            resultsContainer.appendChild(contentWrapper);
            contentWrapper.appendChild(imageElement);
            contentWrapper.appendChild(infoWrapper);
            infoWrapper.appendChild(titleElement);
            infoWrapper.appendChild(listElement);
            listElement.appendChild(genreElement);
            listElement.appendChild(artistElement);
            listElement.appendChild(durationElement);
            listElement.appendChild(presencevoiceElement);
            listElement.appendChild(tonalityElement);
            listElement.appendChild(bpmElement);
            listElement.appendChild(auditionsElement);
            infoWrapper.appendChild(buttonElement);
        });
    } else {
        // Если поиск не успешен, отобразите соответствующее сообщение
        var noResultsMessage = document.createElement('p');
        noResultsMessage.textContent = 'Нет результатов поиска.';
        resultsContainer.appendChild(noResultsMessage);
    }
}

// Вспомогательная функция для создания элемента списка
function createListItem(label, value) {
    var listItem = document.createElement('li');
    listItem.className = 'content-wrapper__list-item';
    listItem.textContent = `${label}: ${value}`;
    return listItem;
}

</script>
</html>