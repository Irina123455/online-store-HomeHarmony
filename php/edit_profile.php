<?php
    session_start();
    require_once 'session_helper.php'; // если используете функции из session_helper
    // Остальной код файла edit_profile.php
    


// Проверяем, авторизован ли пользователь
if (!isset($_SESSION["user_id"])) {
    header("Location: ../php/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// 1. Подключение к базе данных (как в profile.php)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "homeharmony";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
  function getExtension($filename) {
        $parts = explode('.', $filename);
        return end($parts);
    }
// Обработка отправки формы редактирования профиля
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_fio = htmlspecialchars(trim($_POST["fio"]));
    $new_phone = htmlspecialchars(trim($_POST["phone"]));
     
    // Обновляем данные в базе данных
    $sql = "UPDATE users SET fio = ?, phone = ?";

    if (!empty($profile_image)) {
        $sql .= ", profile_image = ?";
    }

    $sql .= " WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!empty($profile_image)) {
        $stmt->bind_param("sssi", $new_fio, $new_phone, $profile_image, $user_id);
            } else {        $stmt->bind_param("ssi", $new_fio, $new_phone, $user_id);
    }

    if ($stmt->execute()) {
        // Обновляем данные в сессии
        $_SESSION["user_fio"] = $new_fio;
        $success_message = "Профиль успешно обновлен!";
          header("Location: profile.php");
        exit();
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
    header("Location: profile.php");
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
    <title>Редактировать профиль</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>

   <div class="container">
        <h1>Редактировать профиль</h1>

        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fio">ФИО:</label>
                <input type="text" id="fio" name="fio" value="<?php echo $fio; ?>">
            </div>

            <div class="form-group">
                <label for="phone">Номер телефона:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            
            <div class="button-group">
                <button type="submit" name="edit_profile">Сохранить изменения</button>
                <a href="profile.php" class="back-link">Назад в профиль</a>
            </div>
        </form>
    </div>

</body>
</html>