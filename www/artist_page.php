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
      <section class="content">
        <div class="content-head">
          <form action="artist_page.php" method="post" class="content-head__buttons-row">
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            $conn = new mysqli('music', 'root', '', 'music');
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            echo
              '<input class="content-head__input" type="text" id ="input"  placeholder="Поиск по исполнителю" name = "input">
              <input type="image" name="submit" class="entrance-btn" src="image/search1.svg">';
            ?>
          </form>
        </div>
        <div class="content-main">
          <div class="content-music" id="searchResults">
            <?php

              $genre = $_POST['input'];

              $sql = "select artistid, name,
              (select count(liseningdate) from statistic s where s.audiofileid in 
              (select compositionid from composition c where c.artistid=a.artistid)),
              coerpath from artist a
              where LOWER(name) like LOWER('%" . $artist . "%')";
              $result = $conn->query($sql);

              $prefix = "C:\\WebServers\\home\\music\\www\\";

              if ($result->num_rows > 0) {
                $i = 1;
                while ($row = mysqli_fetch_row($result)) {
                  $a = str_replace($prefix, "", $row[3]);
                  $url = 'searchcriteria_page.php?id=' . $row[0] . '&criteria=genre';
                  echo '
                    <div class="content-wrapper">
                    <img class="content-wrapper__image" src="' . $a . '" alt="">
                    <div class="content-wrapper__info">
                      <h3 class="content-wrapper__text">' . $row[1] . '</h3>
                      <ul class="content-wrapper__list">
                        <li class="content-wrapper__list-item">
                            Количество прослушиваний: ' . $row[2] . '
                        </li>
                      </ul>
                      <button onclick="redirectToPage(\'' . $url . '\')" class="content-wrapper__buttons" id="buttongenre' . $i . '" >Посмотреть композиции</button>
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
<script src="scripts.js"></script>

</html>