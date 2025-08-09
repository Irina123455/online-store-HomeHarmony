<?php
session_start();
require_once 'php/session_helper.php';
// Остальной код файла cart.php


// Подключение к базе данных (замените на свои данные)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "homeharmony";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Функция для добавления товара в корзину (с использованием сессий)
function addToCartSession($product_id, $quantity) {
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = $quantity;
    } else {
        $_SESSION['cart'][$product_id] += $quantity;
    }
}

// Обработка POST-запроса (добавление товара)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    if (!is_numeric($product_id) || !is_numeric($quantity) || $quantity <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Некорректные данные!']);
        exit;
    }

    // Добавление товара в корзину (только сессия для примера)
    addToCartSession($product_id, $quantity);

    echo json_encode(['status' => 'success', 'message' => 'Товар добавлен в корзину!']);
    exit;
}

// Обработка GET-запроса (получение количества товаров)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'get_cart_count') {
    $cartCount = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
    echo json_encode(['count' => $cartCount]);
    exit;
}

$conn->close();
?>