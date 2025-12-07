<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    @vite([
        'resources/js/profile/profile.js',
        'resources/js/nav.js',
        'resources/css/nav.css',
        'resources/css/main.css',
        'resources/css/profile/profile.css',
    ])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Document</title>
</head>
<body>
    <div class="main_container">
        @include('partials.nav', ['type' => 'register_pizza'])

        <div class="profile_block">

            @if ($avatarUrl)
                <div class="avatar">
                    <img src="{{ 'http://127.0.0.1:8000' . $avatarUrl }}" alt="avatar">
                </div>

                {{-- <div class="form_avatar">
                    <input type="file" name="avatar" id="avatar">
                </div>

                <button id="avatarFormBtn">Загрузить</button> --}}
            @else  
                <div class="avatar avatar_no_url">
                    
                </div>           
                {{-- <div class="form_avatar">
                    <input type="file" name="avatar" id="avatar">
                </div>

                <button id="avatarFormBtn">Загрузить</button> --}}
            @endif

            <div class="profile_panel">
                <h1>{{ $userData['name'] }}</h1>
                <div class="profile_inform">
                    
                </div>
            </div>

        </div>

    </div>
</body>
</html>