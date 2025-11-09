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
        @include('partials.nav')
    </div>
</body>
</html>