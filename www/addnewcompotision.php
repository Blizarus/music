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
        <form action="addnewcompotision.php" method="post">
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
        <input class="entrance-input" type="text" name="presencevoice" id="presencevoice">
        <!-- <p><select name="presencevoice">
        <option value="1">Инструментальная музыка</option>
        <option value="0" selected>Вокальная музыка</option> 
        </select>  -->
        <h3 class="content-wrapper__text">Тональность</h3>
        <input class="entrance-input" type="text" name="name_tonality" id="tonality">
        <h3 class="content-wrapper__text">BPM</h3>
        <input class="entrance-input" type="text" name="BPM" id="BPM">
        <input type="submit" value="Добавить композицию"></strong></p>
        </div>
</form>
      </section>
    </div>
  </main>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $composition = $_POST['name_composition'];
  $composition = str_replace(' ', '_', $composition);

  $artist = $_POST['name_artist'];
  $artist = str_replace(' ', '_', $artist);

  $genre = $_POST['name_genre'];
  $presencevoice = $_POST['presencevoice'];
  $tonality = $_POST['name_tonality'];
  $BPM = $_POST['BPM'];

  $name = $artist. "-" . $composition;
  $filepath  = "C:\\Users\\User\\" . $name . ".mp3";
  $dateupload  = date("Y-m-d");
  $coverpath = "C:\\WebServers\\home\\music\\www\\composition\\" . $artist. "\\".$composition ."png";


  $conn = new mysqli('music', 'root', '', 'music');
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql ="insert into audiofiles values(NULL, 0, ". $filepath.", ".$dateupload.", ".$coverpath.")";
  echo '<p>' . $sql;

  $sql ="select artistid from artist where name= ".$name."";
  $Query =  $conn->query($sql);
  $artistid = mysqli_fetch_row($Query);
  $artistid[0] ;
  echo '<p>' . $sql;


  $sql ="select genreid from genre where name= ".$genre."";
  $Query = $conn->query($sql);
  $genreid = mysqli_fetch_row($Query);
  $genreid[0];
  echo '<p>' . $sql;


  $sql ="insert into composition values (NULL, ".$artistid[0].", ".$genreid[0].", ".$composition.")";
  // $Query = $conn->query($sql);
  echo '<p>' . $sql;


  $sql ="select tonalityid from tonality where name= ".$tonality."";
  $Query = $conn->query($sql);
  $tonalityid = mysqli_fetch_row($Query);
  $tonalityid[0];
  echo '<p>' . $sql;


  $sql ="insert into сharacteristics_music values (NULL, ".$tonalityid.", ".$BPM.", ".$presencevoice.", 0)";
  // $Query = $conn->query($sql);
  echo '<p>' . $sql;


//   create table composition
// (compositionid int unsigned not null auto_increment primary key,
// artistid int unsigned not null,
// genreid int unsigned not null,
// name char(100)
// );

// insert into composition values
// (NULL, 1, 1, "Mockingbird"),
// (NULL, 2, 2, "Yesterday"),
// (NULL, 3, 3, "American Idiot"),
// (NULL, 4, 4, "99 Problems"),
// (NULL, 5, 5, "Fake Plastic Trees");

// create table сharacteristics_music
// (audiofileid int unsigned not null auto_increment primary key,
// tonality int,
// BPM int,
// duration int,
// presencevoice boolean,
// auditions int unsigned 
// );

// insert into сharacteristics_music values
// (NULL, 1, 84, 250, 1, 1),
// (NULL, 10, 96, 125, 1, 1),
// (NULL, 3, 180, 174, 1, 1),
// (NULL, 4, 94, 234, 1, 1),
// (NULL, 3, 116, 294, 1, 1);

}
?>