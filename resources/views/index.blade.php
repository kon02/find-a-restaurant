<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-height: 100vh;">
            <div class="bg-result-img min-h-screen bg-cover">
                @include('layouts.navigation')
                <!-- Page Heading -->
                @if (isset($header))
    
                @endif


                @php
                // 1~$restaurants['results_returned']の範囲でランダムな整数を生成
                $randomIndex = rand(0, $restaurants['results_returned']-1);
                @endphp
                    
                @if($restaurants['results_returned'] > 0)
                <!--コンテナ-->
                
                    <div class="bg-white my-auto mx-44 py-10 px-10 shadow-lg mt-3 relative">
                        <div class="flex-col justify-center space-y-3">
                            <div>
                                <a href="{{{ $restaurants['shop'][$randomIndex]['urls']['pc'] }}}" class="text-4xl font-bold text-center">{{{ $restaurants['shop'][$randomIndex]['name'] }}}</a>
                                <img src="{{{ $restaurants['shop'][$randomIndex]['photo']['pc']['l'] }}}" alt="店舗写真" class="text-center">
                            </div>
                            <div class="flex-col space-y-1">
                                <p class="text-2xl font-bold">{{{ $restaurants['shop'][$randomIndex]['catch'] }}}</p>
                                <p class="text-2xl">営業時間：{{{ $restaurants['shop'][$randomIndex]['open'] }}}</p>
                                <p class="text-2xl">平均予算：{{{ $restaurants['shop'][$randomIndex]['budget']['average'] }}}</p>
                                <p class="text-2xl">営業時間：{{{ $restaurants['shop'][$randomIndex]['close'] }}}</p>
                                <p class="text-2xl">飲み放題：{{{ $restaurants['shop'][$randomIndex]['free_drink'] }}}</p>
                                <p class="text-2xl">食べ放題：{{{ $restaurants['shop'][$randomIndex]['free_food'] }}}</p>
                            </div>
                            <div class="absolute right-10 bottom-10">
                                <a href="{{{ $restaurants['shop'][$randomIndex]['urls']['pc'] }}}" class="px-2 py-2 bg-orange-400 rounded-md text-white hover:bg-orange-700 cursor-pointer text-center">詳しく見る</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-center mt-14">
                        <a href="/" class="text-2xl px-3 py-2 bg-blue-500 rounded-md text-white hover:bg-blue-800 cursor-pointer">ホームへ</a>
                    </div>
                @else
                    <div class="flex justify-center space-x-4 mt-80">
                        <h1 class="text-4xl">条件に合うお店は存在しません</h1>
                        <a href="/" class="px-3 py-2 bg-blue-500 rounded-md text-white hover:bg-blue-800 cursor-pointer">ホームへ戻る</a>
                    </div>
                @endif
            
            </div>
        </div>
    </body>
</html>
