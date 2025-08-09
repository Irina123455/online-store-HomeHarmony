<?php
session_start();
require_once '../php/session_helper.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../about_the_product/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair Display:wght@400;700&display=swap" rel="stylesheet">
    <title>HomeHarmony</title>
</head>
<body>

     <header>
   <nav>
      <div class="menu">
        <h3>HomeHarmony</h3>
        <ul>
            <li><a href="../index.php #main">Главная</a></li>
            <li><a href="../catalog.php">Каталог</a></li>
            <li><a href="../index.php #about">О нас</a></li>
            <li><a href="../index.php #contact">Контакты</a></li>
        </ul>


        <div class="nav-button">
            <img src="../media/profile.png" alt="Профиль" style="cursor: pointer;" onclick="location.href='../php/profile.php'">
            <img src="../media/basket.png" alt="Корзина" style="cursor: pointer;" onclick="location.href='cart.html'">
            <?php
                if (isset($_SESSION["user_id"])) {
                echo '<button onclick="location.href=\'/php/logout.php\'">Выйти</button>';
                } else {
                echo '<button onclick="location.href=\'/php/auth.php\'">Войти</button>';
                }
                ?>
        </div>
        
        </div>
    </nav>
     </header>


     <div class="product-detail-wrapper">
        <!-- СТРЕЛКА НАЗАД -->
        <a href="../catalog.php" class="back-link">
            <i class="fas fa-arrow-left"></i> <!-- Иконка стрелки из Font Awesome -->
            <span>Назад в каталог</span>
        </a>
        <!-- /СТРЕЛКА НАЗАД -->
        <div class="container"
                      data-id="11"
                      data-name="Бежевый пуф с текстильной обивкой"
                      data-price="16990"
                      data-image="../media/poof.png">
                    <img src="../media/poof.png" alt="Бежевый пуф с текстильной обивкой">
            <div class="content">
                <div class="content-text"> <!-- Исправлено content-tet на content-text -->
                    <h3>Бежевый пуф с текстильной обивкой</h3>
                    <p>Добавьте уют и стиль в ваше пространство с нашим бежевым пуфом с текстильной обивкой. Этот универсальный элемент мебели станет отличным дополнением как к современному, так и к классическому интерьеру.</p>
                </div>
                <div class="content-button">
                    <p class="price">16 990 рублей</p>
                    <button class="add-to-cart-btn">В корзину</button>
                </div>
            </div>
        </div>

        <div class="text">
            <h2>Отзывы</h2>
        </div>

        <div class="reviews">
    <?php
    // Database credentials
    $host = "localhost";
    $username = "root"; // Замени на свои
    $password = "root"; // Замени на свои
    $database = "homeharmony";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $product_id = 11; // Замените на реальный ID товара, если он не фиксированный
    // Prepare and execute the query (using prepared statements to prevent SQL injection)
    $sql = "SELECT name, rating, comment FROM reviews WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id); // "i" indicates integer type
    $stmt->execute();
    $result = $stmt->get_result();

    // Store reviews in an array
    $reviews = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }

    $stmt->close();
    $conn->close();

    $initialVisibleCount = 4; // Количество отзывов для отображения изначально

    ?>

    <?php if (empty($reviews)): ?>
        <p>Пока нет отзывов.</p>
    <?php else: ?>
        <?php foreach ($reviews as $index => $review): ?>
            <div class="comment <?php if ($index >= $initialVisibleCount) echo 'hidden'; ?>">
                <h3><?php echo htmlspecialchars($review['name']); ?></h3>
                <div class="rating">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $review['rating']) {
                            echo '<span class="fa fa-star checked"></span>';
                        } else {
                            echo '<span class="fa fa-star"></span>';
                        }
                    }
                    ?>
                </div>
                <p><?php echo htmlspecialchars($review['comment']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>
    <div class="leave-a-review">
        <a href="../reviews/reviews.php?product_id=<?php echo $product_id; ?>"><button >Оставить отзыв</button></a>
    </div>
        <?php if (count($reviews) > $initialVisibleCount): ?>
            <div class="show-more">
                <button id="showMoreButton">Показать еще</button>
            </div>
        <?php endif; ?>
         </div>
    </div>





<footer>
    <h3>HomeHarmony</h3>
    <div class="menu">
        <ul>
            <li><a href="#main">Главная</a></li>
            <li><a href="#catalog">Каталог</a></li>
            <li><a href="#about">О нас</a></li>
            <li><a href="#contact">Контакты</a></li>
        </ul>
        </div>
</footer>


<script>
const showMoreButton = document.getElementById('showMoreButton');
const hiddenComments = document.querySelectorAll('.comment.hidden');

if (showMoreButton) {
    showMoreButton.addEventListener('click', function() {
        const hiddenComments = document.querySelectorAll('.comment.hidden');
        hiddenComments.forEach(comment => {
            comment.classList.remove('hidden');
        });
        showMoreButton.style.display = 'none'; // Скрываем кнопку после показа всех отзывов
    });
}
</script>

<div id="cart-notification" class="cart-notification">
          <div class="cart-notification-content">
            <p>Товар добавлен в корзину!</p>
            <button id="go-to-cart-button">Перейти в корзину</button>
            <button id="close-notification-button">Продолжить покупки</button>
          </div>
        </div>

        <script src="../js/cart.js" defer></script>

     </body>
</html>
