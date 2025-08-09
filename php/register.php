<?php
    session_start();
    // Остальной код файла register.php
    

    $fioError = $phoneError = $passwordError = "";
    $successMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "homeharmony";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        $fio = htmlspecialchars(trim($_POST["fio"]));
        $phone = htmlspecialchars(trim($_POST["phone"]));
        $password = $_POST["password"];

        if (empty($fio)) {
            $fioError = "Пожалуйста, введите ФИО.";
        }
        if (empty($phone)) {
            $phoneError = "Пожалуйста, введите номер телефона.";
        } elseif (!preg_match("/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $phone)) {
            $phoneError = "Неверный формат номера телефона. Используйте +7(XXX)XXX-XX-XX";
        }
        if (empty($password)) {
            $passwordError = "Пожалуйста, введите пароль.";
        } elseif (strlen($password) < 6) {
            $passwordError = "Пароль должен содержать не менее 6 символов.";
        }
        if (empty($fioError) && empty($phoneError) && empty($passwordError)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (fio, phone, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $fio, $phone, $hashed_password);
            if ($stmt->execute()) {
                $successMessage = "Регистрация прошла успешно!";
            } else {
                $fioError = "Ошибка при регистрации: " . $stmt->error;
            }
            $stmt->close();
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
        <title>HomeHarmony</title>
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
        <h2>Регистрация</h2>
        <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="fio">ФИО:</label>
                <input type="text" id="fio" name="fio" value="<?php echo isset($_POST['fio']) ? $_POST['fio'] : ''; ?>" required>
                <div id="fioError" class="error-message"><?php echo $fioError; ?></div>
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" required>
                <div id="phoneError" class="error-message"><?php echo $phoneError; ?></div>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
                <div id="passwordError" class="error-message"><?php echo $passwordError; ?></div>
            </div>
            <div class="button">
            <button type="submit">Зарегистрироваться</button>
            <a href="../php/auth.php">Уже есть аккаунт? Войти</a>
            </div>
            <?php if ($successMessage): ?>
              <div class="success-message"><?php echo $successMessage; ?></div>
            <?php endif; ?>
        </form>
    </div>
    </body>
    </html>