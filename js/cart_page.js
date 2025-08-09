document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const checkoutButton = document.getElementById('checkout-button');

    let cart = JSON.parse(localStorage.getItem('cart') || '[]');



    function displayCart() {
        cartItemsContainer.innerHTML = ''; // Очищаем контейнер

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Корзина пуста.</p>';
            cartTotalElement.textContent = 'Общая стоимость: 0 рублей';
            checkoutButton.disabled = true; // Отключаем кнопку "Оформить заказ"
            return;
        }

        let total = 0;

        cart.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            itemElement.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="item-details">
                    <h3>${item.name}</h3>
                    <p>Цена: ${item.price} рублей</p>
                    <div class="quantity-controls">
                        <button class="decrease-quantity" data-index="${index}">-</button>
                        <span>${item.quantity}</span>
                        <button class="increase-quantity" data-index="${index}">+</button>
                    </div>
                </div>
                <button class="remove-item" data-index="${index}">Удалить</button>
            `;
            cartItemsContainer.appendChild(itemElement);
            total += item.price * item.quantity;
        });

        cartTotalElement.textContent = `Общая стоимость: ${total} рублей`;
        checkoutButton.disabled = false; // Включаем кнопку "Оформить заказ"
    }

    function updateCart(index, newQuantity) {
        if (newQuantity <= 0) {
            // Если количество становится равным 0, удаляем товар из корзины
            cart.splice(index, 1);
        } else {
            cart[index].quantity = newQuantity;
        }
        sessionStorage.setItem('cart', JSON.stringify(cart));
        displayCart(); // Обновляем отображение корзины
    }

    // Обработчики событий для кнопок изменения количества и удаления
    cartItemsContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('decrease-quantity')) {
            const index = event.target.dataset.index;
            updateCart(index, cart[index].quantity - 1);
        } else if (event.target.classList.contains('increase-quantity')) {
            const index = event.target.dataset.index;
            updateCart(index, cart[index].quantity + 1);
        } else if (event.target.classList.contains('remove-item')) {
            const index = event.target.dataset.index;
            cart.splice(index, 1);
            sessionStorage.setItem('cart', JSON.stringify(cart));
            displayCart();
        }
    });

    // Обработчик события для кнопки "Оформить заказ"
    checkoutButton.addEventListener('click', () => {
        alert('Переход к оформлению заказа (реализация отсутствует)');
        //  Здесь можно реализовать переход к странице оформления заказа
    });

    displayCart(); //  Первоначальное отображение корзины
});