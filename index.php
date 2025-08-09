<?php
    session_cache_limiter('');
    session_start();
    include_once 'php/session_helper.php';

    if (!is_logged_in()) {
    header("Location: php/auth.php");
    exit();
    }

    if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $user_fio = $_SESSION["user_fio"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair Display:wght@400;700&display=swap" rel="stylesheet">
        <script src="../js/cart.js"></script>

    <title>HomeHarmony</title>
</head>
<body>
    <header>
    <nav>
      <div class="menu">
        <h3>HomeHarmony</h3>
        <ul>
            <li><a href="#main">Главная</a></li>
            <li><a href="#catalog">Каталог</a></li>
            <li><a href="#about">О нас</a></li> 
            <li><a href="#contact">Контакты</a></li>
        </ul>
        

        <div class="nav-button">
            <img src="media/profile.png" alt="Профиль" style="cursor: pointer;" onclick="location.href='php/profile.php'">
            <img src="media/basket.png" alt="Корзина" style="cursor: pointer;" onclick="location.href='cart.html'">
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

    <main id="main">
        <h1>HomeHarmony</h1>
        <p>Создайте гармонию в своем доме</p>
        <button onclick="location.href='catalog.php'">Перейти в каталог</button>
    </main>
</header>

<div class="catalog" id="catalog">
    <h3>Каталог</h3>
    <div class="catalog-card">
        <div class="card">
            <img src="media/1.png" alt="Бежевая кровать с мягким изголовьем">
            <div class="card-text">
                <p>Бежевая кровать с мягким изголовьем</p>
        <button onclick="location.href='catalog.php'">Перейти в каталог</button>
            </div>
        </div>
        <div class="card">
            <img src="media/sofa2.png" alt="Серый кресло-мешок в стиле лофт">
            <div class="card-text">
                <p>Серый кресло-мешок в стиле лофт</p>
        <button onclick="location.href='catalog.php'">Перейти в каталог</button>
            </div>
        </div>
        <div class="card">
            <img src="media/3.png" alt="Бежевая тумбочка с ящиками">
            <div class="card-text">
                <p>Бежевая тумбочка с ящиками</p>
        <button onclick="location.href='catalog.php'">Перейти в каталог</button>
            </div>
        </div>
        <div class="card">
            <img src="media/4.png" alt="Обеденная группа с бежевым столом и серыми стульями">
            <div class="card-text">
                <p>Обеденная группа со столом и стульями</p>
        <button onclick="location.href='catalog.html'">Перейти в каталог</button>
            </div>
        </div>
    </div>
</div>

<div class="about" id="about">
    <div class="about-content">
        <h3>Наша миссия</h3>
        <p>Помогать людям создавать дома, в которые хочется возвращаться. Мы стремимся к тому, чтобы каждый клиент остался доволен своим выбором и получил удовольствие от нашей мебели. Мы гордимся тем, что делаем, и уверены, что наша мебель станет украшением вашего дома!</p>
        <p>Поэтому мы тщательно отбираем каждую модель, уделяя внимание качеству материалов, дизайну и функциональности. Мы сотрудничаем с лучшими производителями, предлагая широкий ассортимент мебели для любого стиля и бюджета.</p>
        <div class="about-stats">
            <div class="about-stat-item">
                <img src="media/Users.png" alt="Клиенты">
                <span>500+ Клиентов</span>
            </div>
            <div class="about-stat-item">
                <img src="media/Wagon Truck.png" alt="Доставлено">
                <span>1000+ Доставлено</span>
            </div>
            <div class="about-stat-item">
                <img src="media/Good Quality.png" alt="Качество">
                <span>Высокое качество</span>
            </div>
        </div>
    </div>
    <div class="about-content-right" id="about-content">
        <img class="about-image" src="media/about1.png" alt="Фото наша миссия">

    </div>
</div>

<div class="advantages">
    <h1>ПОЧЕМУ ВЫБИРАЮТ НАС?</h1>
        <div class="advantages-cards">

    <div class="advantages-card">
        <img src="media/icon1.png" alt="1">
        <h3>Качество, проверенное временем</h3>
        <p>Надежная мебель из качественных материалов от проверенных поставщиков. Гарантия на всю продукцию.</p>
    </div>
    <div class="advantages-card">
        <img src="media/icon2.png" alt="2">
        <h3>Индивидуальный подход</h3>
        <p>Помощь в выборе мебели под ваш стиль и бюджет. Изготовление на заказ для идеального соответствия вашим потребностям.</p>
    </div>
    <div class="advantages-card">
        <img src="media/icon3.png" alt="3">
        <h3>Уют и комфорт в каждой детали</h3>
        <p>Тщательно отобранная мебель для создания уютной и функциональной атмосферы в вашем доме.</p>
    </div>
    </div>
</div>



<div class="contact" id="contact">
    <h1>Контактнные данные</h1>
    <div class="contact-content">
    <p>+7 961 147 56 53</p>
    <p>homeharmony71@mail.ru</p>
    </div>
    <div class="contact-content">
    <p>г. Волгоград ул.Садовая д.89</p>
    <div class="soc-seti">
        <img src="media/telegram.png" alt="Телеграмм">
        <img src="media/instagram.png" alt="Инстаграм">
        <img src="media/vk.png" alt="Вконтакте">
    </div>
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


<script src="js/script.js"></script>
</body>
</html>