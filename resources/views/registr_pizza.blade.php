<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
        'resources/css/nav.css',
        'resources/js/nav.js',
        'resources/css/main.css',
        'resources/css/product_block_card.css',
        'resources/js/shope.js',
        'resources/js/registr_pizza.js',
    ])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Оформление заказа</title>
</head>
<body>
    <div class="main_container">
        @include('partials.nav', ['type' => 'register_pizza'])
        <h2>Оформление заказа</h2>
        <div class="registr_pizza_block">
            <div class="basket_contain">
                <div class="basket_contain_panel">
                    <h3>1. Корзина</h3>
                </div>
            </div>
            <div class="person_inform_contain">
                <div class="basket_contain_panel">
                    <h3>2. Персональная информация</h3>
                </div>
            </div>
            <div class="address_contain">
                <div class="basket_contain_panel">
                    <h3>3. Адрес доставки</h3>
                </div>
            </div>
            <div class="total_contain">
                <div class="total_inform">
                    <p>Итого:</p>
                    <h3>2365 ₽</h3>
                    <div class="check_inform">
                        <div class="check_item">
                            <div class="item_title">
                                <div class="check_icon"><img src="{{ asset('images/icons/check_price.png') }}" alt=""></div>
                                Стоимость товаров:
                            </div>
                            <div class="check_price">2005 ₽</div>
                        </div>
                        <div class="check_item">
                            <div class="item_title">
                                <div class="check_icon"><img src="{{ asset('images/icons/ckeck_tax.png') }}" alt=""></div>
                                Налоги:
                            </div>
                            <div class="check_price">2005 ₽</div>
                        </div>
                        <div class="check_item">
                            <div class="item_title">
                                <div class="check_icon"><img src="{{ asset('images/icons/ckeck_delivery.png') }}" alt=""></div>
                                Доставка:
                            </div>
                            <div class="check_price">2005 ₽</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>