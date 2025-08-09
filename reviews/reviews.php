<!DOCTYPE html>
<html>
<head>
    <title>Оставить отзыв</title>
    <link rel="stylesheet" href="style.css">  <!-- Подключите ваш CSS файл -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1>Оставить отзыв</h1>

    <div class="link">
  <a href="javascript:history.back()" class="back-link">
    <span>Назад</span>
  </a>
</div>


    
    <form action="submit_review.php" method="POST">
        <?php
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
        echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($product_id) . '">';
        ?>

        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="rating">Оценка:</label>
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Отлично"></label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Хорошо"></label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Нормально"></label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Плохо"></label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Ужасно"></label>
        </div><br><br>

        <label for="comment">Комментарий:</label>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Отправить отзыв">
    </form>
</body>
</html>