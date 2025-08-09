<?php
    session_start();
    require_once 'session_helper.php'; // если используете функции из session_helper
    // Остальной код файла profile.php
    

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION["user_id"])) {
    // Если не авторизован, перенаправляем на страницу входа
    header("Location: auth.php");
    exit();
}

// Получаем данные пользователя из сессии
$user_id = $_SESSION["user_id"];
$user_fio = $_SESSION["user_fio"];





// 1. Подключение к базе данных (как в register.php и auth.php)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "homeharmony";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка отправки формы редактирования профиля
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_profile'])) { // Проверяем, была ли отправлена форма редактирования
    $new_fio = htmlspecialchars(trim($_POST["fio"]));
    $new_phone = htmlspecialchars(trim($_POST["phone"]));

    // Обновляем данные в базе данных
    $sql = "UPDATE users SET fio = ?, phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_fio, $new_phone, $user_id);

    if ($stmt->execute()) {
        // Обновляем данные в сессии
        $_SESSION["user_fio"] = $new_fio;
        $success_message = "Профиль успешно обновлен!";
    } else {
        $error_message = "Ошибка при обновлении профиля: " . $stmt->error;
    }

    $stmt->close();
}

// 2. Получаем данные пользователя из базы данных
$sql = "SELECT fio, phone, profile_image FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $fio = htmlspecialchars($row["fio"]);
    $phone = htmlspecialchars($row["phone"]);
    $profile_image = htmlspecialchars($row["profile_image"]);
} else {
    echo "Ошибка: Пользователь не найден.";
    header("Location: ../index.php");
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<div class="container">
        <h1>Профиль пользователя</h1>
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <div class="info">
            <p><strong>ФИО:</strong> <?php echo $fio; ?></p>
            <p><strong>Номер телефона:</strong> <?php echo $phone; ?></p>
        </div>

        <div class="button-group">
            <form action="edit_profile.php" method="GET">
                <button type="submit">Редактировать профиль</button>
            </form>
            <form action="../index.php" method="GET">
                <button type="submit">На главную</button>
            </form>
            
        </div>
    </div>

</body>
</html>