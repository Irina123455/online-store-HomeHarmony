<?php
session_start();
require_once 'php/session_helper.php';
// Остальной код файла catalog.php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/catalog.css">
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
            <li><a href="index.php #main">Главная</a></li>
            <li><a href="catalog.php">Каталог</a></li>
            <li><a href="index.php #about">О нас</a></li> 
            <li><a href="index.php #contact">Контакты</a></li>
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

     </header>
     <div class="link">
     <a href="index.php" class="back-link">
            <i class="fas fa-arrow-left"></i> <!-- Иконка стрелки из Font Awesome -->
            <span>Назад на главную</span>
        </a>
        </div>

     <div class="container">
        <hr>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Поиск...">
            <button class="sort-button" id="sortButton">Фильтр по категориям</button>
            <div class="sort-menu" id="sortMenu">
                <ul>
                    <li data-category="all">Все категории</li>
                    <li data-category="гостиная">Гостиная</li>
                    <li data-category="спальня">Спальня</li>
                    <li data-category="кухня">Кухня</li>
                    <li data-category="прихожая">Прихожая</li>
                    <li data-category="детская">Детская</li>
                    <li data-category="офис">Офис</li>

                </ul>
            </div>
        </div>
        <hr>
<h3>Каталог</h3>
        <div class="results">
            <div class="catalog" id="productCatalog">
                

                <!-- Гостиная -->
                <div class="product-card" data-category="гостиная"
                     data-id="1" 
                     data-name="Прямой бежевый диван в скандинавском стиле"
                     data-price="27990"
                     data-image="media/sofa1.png">  <!-- Путь к изображению -->
                    <img src="media/sofa1.png" alt="Прямой бежевый диван в скандинавском стиле">
                    <div class="product-text">
                        <p>Прямой бежевый диван в скандинавском стиле</p>
                        <p>27 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/sofa1.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="2" 
                     data-name="Угловой коричневый диван в стиле модерн"
                     data-price="36990"
                     data-image="media/sofa2.png">
                    <img src="media/sofa2.png" alt="Угловой коричневый диван в стиле модерн">
                    <div class="product-text">
                        <p>Угловой коричневый диван в стиле модерн</p>
                        <p>36 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/sofa2.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="3"
                     data-name="Бежевая ТВ-тумба в скандинавском стиле"
                     data-price="14990"
                     data-image="media/TV-stand.png">
                    <img src="media/TV-stand.png" alt="Бежевая ТВ-тумба в скандинавском стиле">
                    <div class="product-text">
                        <p>Бежевая ТВ-тумба в скандинавском стиле</p>
                        <p>14 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/tv-stand.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="4"
                     data-name="Серые стенки и стеллажи в стиле лофт"
                     data-price="22990"
                     data-image="media/wall.png">
                    <img src="media/wall.png" alt="Серые стенки и стеллажи в стиле лофт">
                    <div class="product-text">
                        <p>Серые стенки и стеллажи в стиле лофт</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/wall.php'">Подробнее</button>
                    </div>
                </div>
                 <div class="product-card" data-category="гостиная"
                      data-id="5"
                      data-name="Модульный серый диван в стиле минимализм"
                      data-price="29990"
                      data-image="media/sofa3.png">
                    <img src="media/sofa3.png" alt=" Модульный серый диван в стиле минимализм">
                    <div class="product-text">
                        <p> Модульный серый диван в стиле минимализм</p>
                        <p>29 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/sofa3.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="6"
                     data-name="Бежевый диван-кровать с деревянными подлокотниками"
                     data-price="37990"
                     data-image="media/sofa4.png">
                    <img src="media/sofa4.png" alt="Бежевый диван-кровать с деревянными подлокотниками">
                    <div class="product-text">
                        <p>Бежевый диван-кровать с деревянными подлокотниками</p>
                        <p>37 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/sofa4.php'">Подробнее</button>
                    </div>
                </div>
    
                <div class="product-card" data-category="гостиная"
                     data-id="7"
                     data-name="Мягкое бежевое кресло с акцентами светло-бежевого"
                     data-price="22990"
                     data-image="media/armchair1.png">
                    <img src="media/armchair1.png" alt="Мягкое бежевое кресло с акцентами светло-бежевого">
                    <div class="product-text">
                        <p>Мягкое бежевое кресло с акцентами светло-бежевого</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/armchair1.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="8"
                     data-name="Коричневое кресло-качалка с текстильной обивкой"
                     data-price="26990"
                     data-image="media/armchair2.png">
                    <img src="media/armchair2.png" alt="Коричневое кресло-качалка с текстильной обивкой">
                    <div class="product-text">
                        <p>Коричневое кресло-качалка с текстильной обивкой</p>
                        <p>26 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/armchair2.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="9"
                     data-name="Серый кресло-мешок в стиле лофт"
                     data-price="19990"
                     data-image="media/armchair3.png">
                    <img src="media/armchair3.png" alt="Серый кресло-мешок в стиле лофт">
                    <div class="product-text">
                        <p> Серый кресло-мешок в стиле лофт</p>
                        <p>19 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/armchair3.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card" data-category="гостиная"
                     data-id="10"
                     data-name="Коричневый журнальный столик в стиле минимализм"
                     data-price="17990"
                     data-image="media/table1.png">
                    <img src="media/table1.png" alt="Коричневый журнальный столик в стиле минимализм">
                    <div class="product-text">
                        <p>Коричневый журнальный столик в стиле минимализм</p>
                        <p>17 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/table1.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="гостиная"
                      data-id="11"
                      data-name="Бежевый пуф с текстильной обивкой"
                      data-price="16990"
                      data-image="media/poof.png">
                    <img src="media/poof.png" alt="Бежевый пуф с текстильной обивкой">
                    <div class="product-text">
                        <p>Бежевый пуф с текстильной обивкой</p>
                        <p>16 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/poof.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="гостиная"
                      data-id="12"
                      data-name="Коричневая консоль с деревянной столешницей и металлическими ножками"
                      data-price="13990"
                      data-image="media/console.png">
                    <img src="media/console.png" alt=" Коричневая консоль с деревянной столешницей и металлическими ножками">
                    <div class="product-text">
                        <p> Коричневая консоль с деревянной столешницей и металлическими ножками</p>
                        <p>13 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/console.php'"> Подробнее</button>
                    </div>
                </div>

                <!--Спальня-->
                <div class="product-card"  data-category="спальня"
                      data-id="13"
                      data-name="Бежевая кровать с мягким изголовьем"
                      data-price="33990"
                      data-image="media/bed1.png">
                    <img src="media/bed1.png" alt="Бежевая кровать с мягким изголовьем">
                    <div class="product-text">
                        <p>Бежевая кровать с мягким изголовьем</p>
                        <p>33 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/bed1.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="спальня"
                      data-id="14"
                      data-name="Двуспальная коричневая кровать с деревянным каркасом"
                      data-price="35990"
                      data-image="media/bed2.png">
                    <img src="media/bed2.png" alt="Двуспальная коричневая кровать с деревянным каркасом">
                    <div class="product-text">
                        <p>Двуспальная коричневая кровать с деревянным каркасом</p>
                        <p>35 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/bed2.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="спальня"
                      data-id="15"
                      data-name="Серая кровать с подъемным механизмом и местом для хранения"
                      data-price="37990"
                      data-image="media/bed3.png">
                    <img src="media/bed3.png" alt="Серая кровать с подъемным механизмом и местом для хранения">
                    <div class="product-text">
                        <p>Серая кровать с подъемным механизмом и местом для хранения</p>
                        <p>37 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/bed3.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="спальня"
                      data-id="16"
                      data-name="Бежевая тумбочка с ящиками"
                      data-price="17990"
                      data-image="media/chest.png">
                    <img src="media/chest.png" alt="Бежевая тумбочка с ящиками">
                    <div class="product-text">
                        <p>Бежевая тумбочка с ящиками</p>
                        <p>17 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/chest.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="спальня"
                      data-id="17"
                      data-name="Комод с коричневыми деревянными ящиками и серым корпусом"
                      data-price="23990"
                      data-image="media/chest2.png">
                    <img src="media/chest2.png" alt="Комод с коричневыми деревянными ящиками и серым корпусом">
                    <div class="product-text">
                        <p>Комод с коричневыми деревянными ящиками и серым корпусом</p>
                        <p>23 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/chest2.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="спальня"
                      data-id="18"
                      data-name="Серый шкаф с бежевыми дверцами в минималистичном стиле"
                      data-price="29990"
                      data-image="media/wardrobe1.png">
                    <img src="media/wardrobe1.png" alt="Серый шкаф с бежевыми дверцами в минималистичном стиле">
                    <div class="product-text">
                        <p>Серый шкаф с бежевыми дверцами в минималистичном стиле</p>
                        <p>29 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/wardrobe1.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="спальня"
                      data-id="19"
                      data-name="Бежевый туалетный столик с зеркалом и мягким стулом"
                      data-price="31990"
                      data-image="media/dressingtable.png">
                    <img src="media/dressingtable.png" alt="Бежевый туалетный столик с зеркалом и мягким стулом">
                    <div class="product-text">
                        <p>Бежевый туалетный столик с зеркалом и мягким стулом</p>
                        <p>31 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/dressingtable.php'">Подробнее</button>
                    </div>
                </div>

                <!--Кухня-->
                <div class="product-card"  data-category="кухня"
                      data-id="20"
                      data-name="Кухонный гарнитур с бежевыми фасадами и коричневой столешницей"
                      data-price="45990"
                      data-image="media/kitchenset1.png">
                    <img src="media/kitchenset1.png" alt="Кухонный гарнитур с бежевыми фасадами и коричневой столешницей">
                    <div class="product-text">
                        <p>Кухонный гарнитур с бежевыми фасадами и коричневой столешницей</p>
                        <p>45 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/kitchenset1.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="кухня"
                      data-id="21"
                      data-name="Кухонный гарнитур на заказ с использованием серого, коричневого и бежевого цветов"
                      data-price="49990"
                      data-image="media/kitchenset2.png">
                    <img src="media/kitchenset2.png" alt="Кухонный гарнитур на заказ с использованием серого, коричневого и бежевого цветов">
                    <div class="product-text">
                        <p>Кухонный гарнитур на заказ с использованием серого, коричневого и бежевого цветов</p>
                        <p>49 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/kitchenset2.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="кухня"
                      data-id="22"
                      data-name="Обеденный стол с бежевой столешницей и серыми ножками"
                      data-price="15990"
                      data-image="media/diningtable.png">
                    <img src="media/diningtable.png" alt="Обеденный стол с бежевой столешницей и серыми ножками">
                    <div class="product-text">
                        <p>Обеденный стол с бежевой столешницей и серыми ножками</p>
                        <p>15 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/diningtable.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="кухня"
                      data-id="23"
                      data-name="Барный стол с коричневой столешницей и металлическими ножками"
                      data-price="19990"
                      data-image="media/bartable.png">
                    <img src="media/bartable.png" alt="Барный стол с коричневой столешницей и металлическими ножками">
                    <div class="product-text">
                        <p>Барный стол с коричневой столешницей и металлическими ножками</p>
                        <p>19 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/bartable.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="кухня"
                      data-id="24"
                      data-name="Мягкие бежевые стулья с деревянными ножками"
                      data-price="17990"
                      data-image="media/chair.png">
                    <img src="media/chair.png" alt="Мягкие бежевые стулья с деревянными ножками">
                    <div class="product-text">
                        <p> Мягкие бежевые стулья с деревянными ножками</p>
                        <p>17 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/chair.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="кухня"
                      data-id="25"
                      data-name="Барные серые стулья с регулируемой высотой"
                      data-price="22990"
                      data-image="media/barchair.png">
                    <img src="media/barchair.png" alt="Барные серые стулья с регулируемой высотой">
                    <div class="product-text">
                        <p>Барные серые стулья с регулируемой высотой</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/barchair.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="кухня"
                      data-id="26"
                      data-name="Обеденная группа с бежевым столом и серыми стульями"
                      data-price="28990"
                      data-image="media/dininggroup.png">
                    <img src="media/dininggroup.png" alt="Обеденная группа с бежевым столом и серыми стульями">
                    <div class="product-text">
                        <p>Обеденная группа с бежевым столом и серыми стульями</p>
                        <p>28 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/dininggroup.php'">Подробнее</button>
                    </div>
                </div>

                <!--Прихожая-->
                <div class="product-card"  data-category="прихожая"
                      data-id="27"
                      data-name="Вешалка с бежевой основой и коричневыми крючками"
                      data-price="2990"
                      data-image="media/hanger.png">
                    <img src="media/hanger.png" alt="Вешалка с бежевой основой и коричневыми крючками">
                    <div class="product-text">
                        <p>Вешалка с бежевой основой и коричневыми крючками</p>
                        <p>2 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/hanger.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="прихожая"
                      data-id="28"
                      data-name="Обувница с серыми дверцами и бежевым корпусом"
                      data-price="17990"
                      data-image="media/shoemaker.png">
                    <img src="media/shoemaker.png" alt=" Обувница с серыми дверцами и бежевым корпусом">
                    <div class="product-text">
                        <p> Обувница с серыми дверцами и бежевым корпусом</p>
                        <p>17 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/shoemaker.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="прихожая"
                      data-id="29"
                      data-name=""
                      data-price="12990"
                      data-image="media/mirror.png">
                    <img src="media/mirror.png" alt=" Зеркало в коричневой деревянной раме">
                    <div class="product-text">
                        <p> Зеркало в коричневой деревянной раме</p>
                        <p>12 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/mirror.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="прихожая"
                      data-id="30"
                      data-name="Консоль с бежевой столешницей и серыми металлическими ножками"
                      data-price="22990"
                      data-image="media/console2.png">
                    <img src="media/console2.png" alt=" Консоль с бежевой столешницей и серыми металлическими ножками">
                    <div class="product-text">
                        <p> Консоль с бежевой столешницей и серыми металлическими ножками</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/console2.php'">Подробнее</button>
                    </div>
                </div>

                <!--Детская-->
                <div class="product-card"  data-category="детская"
                      data-id="31"
                      data-name="Бежевая кроватка для новорожденного с деревянными элементами"
                      data-price="22990"
                      data-image="media/babybed.png">
                    <img src="media/babybed.png" alt="Бежевая кроватка для новорожденного с деревянными элементами">
                    <div class="product-text">
                        <p>Бежевая кроватка для новорожденного с деревянными элементами</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/babybed.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="детская"
                      data-id="32"
                      data-name="Двухъярусная кровать с серым каркасом и бежевыми ступенями"
                      data-price="22990"
                      data-image="media/babybed2.png">
                    <img src="media/babybed2.png" alt="Двухъярусная кровать с серым каркасом и бежевыми ступенями">
                    <div class="product-text">
                        <p>Двухъярусная кровать с серым каркасом и бежевыми ступенями</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/babybed2.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="детская"
                      data-id="33"
                      data-name="Бежевый стол с серым стулом для ребенка"
                      data-price="22990"
                      data-image="media/babytable.png">
                    <img src="media/babytable.png" alt="Бежевый стол с серым стулом для ребенка">
                    <div class="product-text">
                        <p>Бежевый стол с серым стулом для ребенка</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/babytable.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="детская"
                      data-id="34"
                      data-name="Серый шкаф с бежевыми ящиками для детской одежды"
                      data-price="22990"
                      data-image="media/babywardrobe.png">
                    <img src="media/babywardrobe.png" alt="Серый шкаф с бежевыми ящиками для детской одежды">
                    <div class="product-text">
                        <p>Серый шкаф с бежевыми ящиками для детской одежды</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/babywardrobe.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="детская"
                      data-id="35"
                      data-name="Бежевый комод с серыми ручками в детской"
                      data-price="22990"
                      data-image="media/babychest.png">
                    <img src="media/babychest.png" alt="  Бежевый комод с серыми ручками в детской">
                    <div class="product-text">
                        <p>   Бежевый комод с серыми ручками в детской</p>
                        <p>22 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/babychest.php'">Подробнее</button>
                    </div>
                </div>

                <!--Офис-->
                <div class="product-card"  data-category="офис"
                      data-id="36"
                      data-name="Стол письменный с коричневой столешницей и металлическими серыми ножками"
                      data-price="11990"
                      data-image="media/officedesk.png">
                    <img src="media/officedesk.png" alt="Стол письменный с коричневой столешницей и металлическими серыми ножками">
                    <div class="product-text">
                        <p>Стол письменный с коричневой столешницей и металлическими серыми ножками</p>
                        <p>11 990 рублей</p>
                    </div>
                    <div class="product-button">
                        <button class="add-to-cart-btn">В корзину</button>
                        <button onclick="location.href='about_the_product/officedesk.php'">Подробнее</button>
                    </div>
                </div>
                <div class="product-card"  data-category="офис"
                data-id="37"
                      data-name="Компьютерный стол с бежевой столешницей и полкой для клавиатуры"
                      data-price="13990"
                      data-image="media/computerdesk.png">
        <img src="media/computerdesk.png" alt=" Компьютерный стол с бежевой столешницей и полкой для клавиатуры">
        <div class="product-text">
            <p> Компьютерный стол с бежевой столешницей и полкой для клавиатуры</p>
            <p>13 990 рублей</p>
        </div>
        <div class="product-button">
                <button class="add-to-cart-btn">В корзину</button>
                <button onclick="location.href='about_the_product/computerdesk.php'"> Подробнее</button>
            </div>
        </div>

        <div class="product-card"  data-category="офис"
        data-id="38"
                      data-name="Кресло офисное с серой сетчатой спинкой и бежевым сиденьем"
                      data-price="12990"
                      data-image="media/officechair.png">
        <img src="media/officechair.png" alt="Кресло офисное с серой сетчатой спинкой и бежевым сиденьем">
        <div class="product-text">
            <p>Кресло офисное с серой сетчатой спинкой и бежевым сиденьем</p>
            <p>12 990 рублей</p>
        </div>
        <div class="product-button">
                <button class="add-to-cart-btn">В корзину</button>
                <button onclick="location.href='about_the_product/officechair.php'">Подробнее</button>
            </div>
        </div>
        <div class="product-card"  data-category="офис"
        data-id="39"
                      data-name="Стеллаж офисный с коричневыми полками и серым металлическим каркасом"
                      data-price="27990"
                      data-image="media/officeshelving.png">
        <img src="media/officeshelving.png" alt="Стеллаж офисный с коричневыми полками и серым металлическим каркасом">
        <div class="product-text">
            <p>Стеллаж офисный с коричневыми полками и серым металлическим каркасом</p>
            <p>27 990 рублей</p>
        </div>
        <div class="product-button">
                <button class="add-to-cart-btn">В корзину</button>
                <button onclick="location.href='about_the_product/officeshelving.php'">Подробнее</button>
            </div>
        </div>
        <div class="product-card"  data-category="офис"
        data-id="40"
                      data-name="Тумбочка с бежевыми ящиками и серым корпусом для офиса"
                      data-price="16990"
                      data-image="media/officetable.png">
        <img src="media/officetable.png" alt=" Тумбочка с бежевыми ящиками и серым корпусом для офиса">
        <div class="product-text">
            <p> Тумбочка с бежевыми ящиками и серым корпусом для офиса</p>
            <p>16 990 рублей</p>
        </div>
        <div class="product-button">
                <button class="add-to-cart-btn">В корзину</button>
                <button onclick="location.href='about_the_product/officetable.php'">Подробнее</button>
            </div>
        </div>
        
       
            </div>
        </div>
    </div>
    <script>
// Получаем элементы
const searchInput = document.getElementById('searchInput');
const sortButton = document.getElementById('sortButton');
const sortMenu = document.getElementById('sortMenu');
const sortMenuItems = sortMenu.querySelectorAll('li');
const productCatalog = document.getElementById('productCatalog');

// Проверяем, существует ли productCatalog перед тем как искать product-card внутри него
const productCards = productCatalog ? productCatalog.querySelectorAll('.product-card') : [];

// Глобальные переменные для хранения текущего состояния фильтров
let currentSearchTerm = '';
let currentCategoryFilter = 'all'; // По умолчанию показываем все категории

// Функция для отображения/скрытия меню фильтра
function toggleSortMenu() {
    // Убедимся, что меню существует
    if (sortMenu) {
        sortMenu.classList.toggle('show');
    }
}

// Обработчик клика по кнопке "Фильтр по категориям"
if (sortButton) {
    sortButton.addEventListener('click', function(event) {
        event.stopPropagation(); // Предотвращаем закрытие меню при клике на кнопку
        toggleSortMenu();
    });
}

// Функция для обновления отображения товаров на основе текущих фильтров
function displayProducts() {
    // Проверяем, что productCards не пустой массив
    if (productCards.length === 0) return;

    productCards.forEach(card => {
        // Получаем текст описания товара (первый p-элемент)
        const productTextElement = card.querySelector('.product-text p:first-child');
        const productText = productTextElement ? productTextElement.textContent.toLowerCase() : '';

        // Получаем категорию из data-атрибута карточки
        const category = card.dataset.category;

        // ИСПРАВЛЕНИЕ: Правильное объявление переменной matchesSearch
        const matchesSearch = productText.includes(currentSearchTerm.toLowerCase());

        // Проверяем, соответствует ли товар выбранной категории
        const matchesCategory = (currentCategoryFilter === 'all' || category === currentCategoryFilter);

        // Если товар соответствует обоим условиям, показываем его, иначе скрываем
        if (matchesSearch && matchesCategory) {
            card.classList.remove('hidden');
        } else {
            card.classList.add('hidden');
        }
    });
}

// Обработчики кликов по пунктам меню категорий
sortMenuItems.forEach(item => {
    item.addEventListener('click', function() {
        currentCategoryFilter = this.dataset.category; // Обновляем выбранную категорию
        toggleSortMenu(); // Закрываем меню после выбора
        displayProducts(); // Обновляем отображение товаров
    });
});

// Обработчик ввода в поле поиска
if (searchInput) {
    searchInput.addEventListener('input', function() {
        currentSearchTerm = this.value; // Обновляем поисковый запрос
        displayProducts(); // Обновляем отображение товаров
    });
}

// Обработчик клика вне меню (для закрытия меню фильтрации)
document.addEventListener('click', function(event) {
    // Убедитесь, что sortMenu и sortButton существуют, прежде чем обращаться к ним
    if (sortMenu && sortButton && !sortMenu.contains(event.target) && event.target !== sortButton) {
        sortMenu.classList.remove('show');
    }
});

// Вызываем функцию displayProducts при загрузке страницы, чтобы все товары отобразились изначально
// Это гарантирует, что фильтры будут применены даже если поиск/фильтр не менялись
document.addEventListener('DOMContentLoaded', displayProducts);
</script>
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