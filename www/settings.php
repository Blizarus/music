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
            <a href="artist_page.php" class="settings__link">Исполнители</a>
            </li>
            <li class="settings__list-item">
            <img src="image/computer.svg" alt="ИконкаЖанров">
            <a href="genre_page.php" class="settings__link">Жанры</a>
            </li>
            <li class="settings__list-item">
            <img src="image/playback.svg" alt="ИконкаКомпозиции">
            <a href="searchcriteria_page.php?criteria=composition" class="settings__link">Все композиции</a> 
            </li>
            <li class="settings__list-item">
            <img src="image/analize.svg" alt="ИконкаАнализа">
            <a href="#" class="settings__link">Анализ композиции</a>
            </li>
            <li class="settings__list-item">
            <img src="image/search.svg" alt="ИконкаПоиска">
            <a href="searchcriteria_page.php?criteria=name" class="settings__link">Поиск копозиции</a>
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
        <?php
        if ($_SESSION['right'] == 1){
            echo '
            <span class="settings__text">Администрирование</span>
            <ul class="settings__list">
            <li class="settings__list-item">
                <img src="" alt="ИконкаДобавления">
                <a href="addnewcompotision.php" class="settings__link">Добавление новой композиции</a>
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
            </ul>';
        }
        ?>
    </nav>
</section>