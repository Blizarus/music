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
            <?php require_once('settings.php');
            $conn = new mysqli('music', 'root', '', 'music');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $criteria = $_GET['criteria'];
            $id = $_GET['id'];
            if ($criteria === 'genre')
                $Query = $conn->query("select name from genre where genreid = " . $id);
            else if ($criteria === 'artist')
                $Query = $conn->query("select name from artist where artistid = " . $id);
            else if ($criteria === 'name' || $criteria === 'composition')
                $Query = $conn->query("select name from composition where compositionid = " . $id);
            $Data = mysqli_fetch_row($Query);
            ?>
            <section class="content">
                <div class="content-head">
                    <form id="searchForm"
                        action="searchcriteria_page.php?id=<?php echo urlencode($id); ?>&criteria=<?php echo urlencode($criteria); ?>"
                        method="post" class="content-head__buttons-row">
                        <?php
                        echo '<h3 class="content-wrapper__text">' . $Data[0] . '</h3>';

                        $sql = "select * from criteria";
                        $result = $conn->query($sql);

                        while ($row = mysqli_fetch_row($result)) {
                            if ($row[2] == $criteria){
                                $sql = "select name from ".$criteria." where ".$criteria."id = ".$id."";
                                //echo $sql;
                                $value = mysqli_fetch_row($conn->query($sql));
                                //echo $value[0];
                                 echo '<input class="content-head__input" type="text" id ="input' . $row[0] . '" style="display: none" placeholder="Поиск ' . $row[1] . '" name = "input' . $row[0] . '" value='.$value[0].'>'; 
                            }
                            else{
                                echo '<button type="button" class="content-search__button" onclick="hideButtonAndShowInput(this.id)" id ="button' . $row[0] . '"> <img src="image/plus.svg" alt="ИконкаДобавления" >Поиск ' . $row[1] . '</button> ';
                                echo '<input class="content-head__input" type="text" id ="input' . $row[0] . '" style="display: none" placeholder="Поиск ' . $row[1] . '" name = "input' . $row[0] . '">';             
                            }
                            echo
                            '
                            <button type="button" onclick="hideInputAndShowButton(this.id)" class="content-head__button" id ="button_hide' . $row[0] . '" style="display: none" >
                            <img class="content-head__image" src="image/cross.svg" alt="ИконкаКрестика">
                            </button>';
                        }
                        echo
                            '<p><input type="image" name="submit" class="entrance-btn" src="image/search1.svg"></p>'
                            ?>
                    </form>
                </div>
                <div class="content-main">
                    <div class="content-music" id="searchResults">
                        <?php

                            $genre = $_POST['input1'];
                            $name = $_POST['input2'];
                            $artist = $_POST['input3'];
                            $sql = "
                            select c.name,
                            (select name from genre g where g.genreid = c.genreid),
                            (select name from artist a where a.artistid = c.artistid),
                            (select duration from сharacteristics_music cm where cm.audiofileid = c.compositionid),
                            (select t.name from tonality t, сharacteristics_music cm where t.tonalityid = cm.tonality and
                            cm.audiofileid = c.compositionid) ,
                            (select bpm from сharacteristics_music cm where cm.audiofileid = c.compositionid) ,
                            (select count(liseningdate) from statistic s where s.audiofileid = c.compositionid),
                            (select presencevoice from сharacteristics_music cm where cm.audiofileid = c.compositionid),
                            (select coverpath from audiofiles a where a.audiofileid = c.compositionid)
                            from composition c
                            where artistid in (select artistid from artist where LOWER(name) like LOWER('%" . $artist . "%'))
                            and genreid in (select genreid from genre where LOWER(name) like LOWER('%" . $genre . "%'))
                            and LOWER(name) like LOWER('%" . $name . "%')";
                            $result = $conn->query($sql);

                            $prefix = "C:\\WebServers\\home\\music\\www\\";

                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_row($result)) {
                                    $url = str_replace($prefix, "", $row[8]);
                                    echo '
                                    <div class="content-wrapper">
                                    <img class="content-wrapper__image" src="' . $url . '" alt="">
                                    <div class="content-wrapper__info">
                                        <h3 class="content-wrapper__text">' . $row[0] . '</h3>
                                        <ul class="content-wrapper__list">
                                            <li class="content-wrapper__list-item">
                                                Исполнитель: ' . $row[2] . '
                                            </li>
                                            <li class="content-wrapper__list-item">
                                                Жанр: ' . $row[1] . '
                                            </li>
                                            <li class="content-wrapper__list-item">
                                                Количество прослушиваний: ' . $row[7] . '
                                            </li>
                                            <li class="content-wrapper__list-item" style="display: none" id="info1' . $i . '"> 
                                                Продолжительность: ' . $row[3] . '
                                            </li>
                                            <li class="content-wrapper__list-item" style="display: none" id="info2' . $i . '">
                                                Наличие голоса: ' . $row[6] . '
                                            </li>
                                            <li class="content-wrapper__list-item" style="display: none" id="info3' . $i . '">
                                                Тональность: ' . $row[4] . '
                                            </li>
                                            <li class="content-wrapper__list-item" style="display: none" id="info4' . $i . '">
                                                BPM (Ударов в минуту): ' . $row[5] . '
                                            </li>
                                        </ul>
                                        <button onclick="hideButtonAndShowInfo(this.id)" class="content-wrapper__buttons" id="buttoninfo' . $i . '" >Показатель все характеристики</button>
                                    </div>
                                    </div>
                                    ';
                                    $i = $i + 1;
                                }
                            }

                            $conn->close();
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
<script defer>
    window.onload = function () {
        // Проверяем, была ли форма уже отправлена
        var isFormSubmitted = getCookie('isFormSubmitted');
        console.log('isFormSubmitted:', isFormSubmitted);

        // Если форма еще не отправлена
        if (!isFormSubmitted) {
            // Получаем форму
            var searchForm = document.getElementById("searchForm");

            // Проверяем, существует ли форма
            if (searchForm) {
                // Отмечаем форму как отправленную
                setCookie('isFormSubmitted', 'true');
                console.log('Form marked as submitted.');

                // Вызываем функцию для отправки формы
                submitForm();
            }
        }
    };

    // Функция для отправки формы
    function submitForm() {
        var searchForm = document.getElementById("searchForm");
        // Проверяем, существует ли форма
        if (searchForm) {
            // Отправляем форму
            searchForm.submit();
            console.log('Form submitted.');
        }
    }

    // Установка cookie
    function setCookie(name, value) {
        document.cookie = name + '=' + value + '; path=/';
    }

    // Получение cookie
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            '(?:^|; )' + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + '=([^;]*)'
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
</script>



<script src="scripts.js"></script>
</html>