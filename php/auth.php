<?php
// auth.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "homeharmony";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }
     $phone = htmlspecialchars(trim($_POST["phone"]));

      if (!preg_match("/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $phone)) {
          $error = "Неверный формат номера телефона. Используйте +7(XXX)XXX-XX-XX";
         } else {
            $password = $_POST["password"];
            error_log("Phone: " . $phone);

        if (empty($phone) || empty($password)) {
            $error = "Пожалуйста, заполните все поля.";
        } else {
            $sql = "SELECT id, password, fio FROM users WHERE phone = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $phone);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashed_password = $row["password"];

                if (password_verify($password, $hashed_password)) {
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["user_fio"] = $row["fio"];
                    header("Location: ../index.php");
                    exit();
                } else {
                    $error = "Неверный пароль.";
                }
            } else {
                $error = "Пользователь с таким номером телефона не найден.";
            }

            $stmt->close();
          }
         }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <title>HomeHarmony - Вход</title>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#phone").mask("+7(999)999-99-99");
            });
        </script>
</head>
<body>
<div class="form-container">
    <h2>Вход</h2>
    <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="phone">Номер телефона:</label>
            <input type="tel" id="phone" name="phone" required>
            <div id="phoneError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <div id="passwordError" class="error-message"></div>
        </div>
        <div class="button">
            <button type="submit">Войти</button>
            <a href="../php/register.php">Ещё нет аккаунта? Зарегистрироваться</a>
        </div>
        <?php if (isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
    </form>
</div>
</body>
</html>