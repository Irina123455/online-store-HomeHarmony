<?php
    session_start();
    require_once 'session_helper.php'; // если используете функции из session_helper
    // Остальной код файла logout.php
    


// Удаляем все переменные сессии
session_unset();

// Уничтожаем сессию
session_destroy();

// Перенаправляем на страницу входа
header("Location: ../php/auth.php");
exit();
?>