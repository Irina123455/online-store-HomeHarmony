<?php
    session_start();
    // Остальной код файла add_to_card.php
    


//  Подключение к базе данных (замените на ваши данные)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "homeharmony";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//  Получаем данные из POST-запроса
$data = json_decode(file_get_contents('php://input'), true);

$product_id = $data['product_id'];
$product_name = $data['product_name'];
$product_price = $data['product_price'];
$product_description = $data['product_description'];
$quantity = $data['quantity'];

//  Получаем session_id (или user_id, если пользователь зарегистрирован)
$session_id = session_id(); //  Или $_SESSION['user_id']

//  Проверяем, есть ли уже этот товар в корзине для данного пользователя/сессии
$sql = "SELECT quantity FROM cart WHERE session_id = '$session_id' AND product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //  Если товар уже есть, увеличиваем количество
    $row = $result->fetch_assoc();
    $new_quantity = $row['quantity'] + $quantity;
    $sql = "UPDATE cart SET quantity = $new_quantity WHERE session_id = '$session_id' AND product_id = $product_id";
} else {
    //  Если товара нет, добавляем его в корзину
    $sql = "INSERT INTO cart (session_id, product_id, product_name, product_price, product_description, quantity)
            VALUES ('$session_id', $product_id, '$product_name', $product_price, '$product_description', $quantity)";
}

if ($conn->query($sql) === TRUE) {
    //  Получаем обновленное количество товаров в корзине
    $sql = "SELECT SUM(quantity) AS total_items FROM cart WHERE session_id = '$session_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_items = $row['total_items'];

    //  Возвращаем JSON-ответ
    $response = array('success' => true, 'message' => 'Товар добавлен в корзину', 'cart_items' => $total_items);
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Ошибка: ' . $conn->error);
    echo json_encode($response);
}

$conn->close();
?>