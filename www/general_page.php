<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
    <title>Блочная вёрстка</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="container">
	<div id="header">
	<h2>Музыкальный сервис</h2>
	</div>
		 
	<div id="sidebar">
          <p> Главная </p>
          <h3> Исполнители </h3>
          <h3> Альбомы </h3>
          <h3> Жанры </h3>
          <h3> Все композиции </h3>
          <h3> Анализ песни </h3>
          <h2> настройки </h2>
          <h3> Настройки профиля </h3>
	</div>
		 
	<div id="content">
	<h2>Основной контент страницы</h2>
	</div>
		 
	<div id="clear">
		 
	</div>
				
</div>
</body>
</html>

<style>
   body {
     background: #1F262E;
     color: #ffff;
     font-family: Arial, sans-serif;
     /* font-size: 14px; */
     margin: 0;
     padding: 0;
     box-sizing: border-box; 

}

#header {
     background: #343A46;
     width:  95%;
     height: 8%;
     border-bottom-left-radius: 20px; 
     border-bottom-right-radius: 20px; 
     margin-bottom: 2%;
     display: flex; 
     align-items: center; 
     padding-left: 5%;
}
    
#sidebar {
     display: block;
     align-items: left;
     background: #343A46;
     float: left;
     width: 20%;
     height: 80%;
     border-radius: 20px;
     margin-right: 3%;
     margin-left: 1%;

}

#sidebar h3 {
  padding-left: 15%; 
  font-size: 20px;
}

#sidebar h2 {
  padding-left: 10%; 
  font-size: 20px;
  text-transform: uppercase;
}

#sidebar h3:first-child {
  margin-top: 15%; 
}

#sidebar img {
  max-width: 100%; 
  margin-right: 10px; 
}

#content {
     background: #343A46;
     float: right;
     width: 75%;
     height: 100%;
     border-radius: 20px; 
     margin-right: 1%;
}
 
</style>
