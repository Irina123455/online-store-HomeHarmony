document.addEventListener('DOMContentLoaded', () => {
    const cartIcon = document.querySelector('header nav .nav-button img[src="../media/basket.png"]');
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartNotification = document.getElementById('cart-notification');
    const goToCartButton = document.getElementById('go-to-cart-button');
    const closeNotificationButton = document.getElementById('close-notification-button');
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');

    // Проверяем, найден ли элемент cartIcon
    if (cartIcon) {
        updateCartIcon(cart); // Обновляем иконку корзины при загрузке страницы

        // Добавляем обработчик клика на иконку корзины
        cartIcon.addEventListener('click', () => {
            //  Редирект на страницу корзины (если она существует)
            window.location.href = '../cart.html'; //  Замените на ваш URL
        });
    } else {
        console.warn('Элемент корзины не найден на этой странице.');
    }

    function getProductData(element) {
        // Попробуем найти ближайший .product-card или .container (для sofa1.php)
        const card = element.closest('.product-card') || element.closest('.container');

        if (!card) {
            console.error('Не удалось найти карточку товара.');
            return null;
        }

        return {
            id: card.dataset.id,
            name: card.dataset.name,
            price: parseFloat(card.dataset.price),
            image: card.dataset.image,
            description: card.dataset.description // Добавлено описание
        };
    }

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const product = getProductData(event.target);

            if (!product) {
                console.error('Не удалось получить данные о товаре.');
                return;
            }

            // Проверяем, есть ли уже этот товар в корзине
            const existingProductIndex = cart.findIndex(item => item.id === product.id);

            if (existingProductIndex > -1) {
                // Если товар уже есть, увеличиваем количество
                cart[existingProductIndex].quantity += 1;
            } else {
                // Если товара нет, добавляем его в корзину
                cart.push({ ...product, quantity: 1 });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            if (cartIcon) {
                updateCartIcon(cart);
            }

            // Отображаем модальное окно
            cartNotification.style.display = 'flex';
        });
    });

    function updateCartIcon(cart) {
        const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
        if (cartIcon) {
            cartIcon.dataset.count = cartCount;  // Используем data-атрибут для хранения количества

            //  Отображаем количество на иконке корзины (можно добавить элемент HTML)
            if (cartCount > 0) {
                cartIcon.classList.add('has-items'); // Добавляем класс для стилизации
            } else {
                cartIcon.classList.remove('has-items');
            }
        }
    }

    // Обработчики событий для кнопок в модальном окне
    if (goToCartButton) {
        goToCartButton.addEventListener('click', () => {
            window.location.href = '../cart.html'; //  Переход в корзину
        });
    } else {
        console.warn('Кнопка "Перейти в корзину" не найдена.');
    }

    if (closeNotificationButton) {
        closeNotificationButton.addEventListener('click', () => {
            cartNotification.style.display = 'none'; //  Закрываем уведомление
        });
    } else {
        console.warn('Кнопка "Продолжить покупки" не найдена.');
    }

    // Закрытие уведомления при клике вне окна
    window.addEventListener('click', (event) => {
        if (event.target === cartNotification) {
            cartNotification.style.display = 'none';
        }
    });
});