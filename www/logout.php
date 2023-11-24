<?php
session_start();

// Удаляем все данные сессии
session_unset();
session_destroy();

// Перенаправляем пользователя на предыдущую страницу (HTTP_REFERER - встроенная переменная, содержащая URL предыдущей страницы)
header("Location: " . $_SERVER["HTTP_REFERER"]);
exit();
?>