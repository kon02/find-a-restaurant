<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/button.css')  }}" >
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body class="relative font-serif antialiased">
        <div class="min-height: 100vh;">
            <div class="bg-home-img min-h-screen bg-cover">
                @include('layouts.navigation')
                
                @if (isset($header))
        
                @endif
                <!--表紙ページ-->
                <!--コンテナ-->
                <div class="flex-col space-y-6 text-center border-double border-8 border-orange-500 rounded-lg shadow-lg h-96 my-32 mx-44 pt-10">
                    <h1 class="text-white text-6xl text-center font-bold">お店に出会う！</h1>
                    <form action="/result" name="myform" method="POST" onsubmit="return beforeSubmit()">
                        @csrf
                        <div class="flex-col space-y-6">
                            <div class="ran text-center">
                                <label for="range" class="text-1xl font-bold px-2">検索範囲</label>
                                <select name="range" required>
                                    <option value="">-選択してください-</option>
                                    <option value="1">300m以内</option>
                                    <option value="2">500m以内</option>
                                    <option value="3">1000m以内</option>
                                    <option value="4">2000m以内</option>
                                    <option value="5">3000m以内</option>
                                </select>
                            </div>
                        
                            <div class="flex space-x-4 justify-center">
                                <div class="drink">
                                    <input type="hidden" name="free_drink" value="0">
                                    <input type="checkbox" id="free_drink" name="free_drink" value="1">
                                    <label for="free_drink">飲み放題</label>
                                </div>
                                
                                <div class="food">
                                    <input type="hidden" name="free_food" value="0">
                                    <input type="checkbox" id="free_food" name="free_food" value="1">
                                    <label for="free_food">食べ放題</label>
                                </div>
                                
                                <div class="pri">
                                    <input type="hidden" name="private_room" value="0">
                                    <input type="checkbox" id="private" name="private_room" value="1">
                                    <label for="private">個室</label>
                                </div>
                                
                                <div class="mid">
                                    <input type="hidden" name="midnight" value="0">
                                    <input type="checkbox" id="midnight" name="midnight" value="1">
                                    <label for="midnight">23時以降営業</label>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4 justify-center">
                                <div class="kack">
                                    <input type="hidden" name="kacktail" value="0">
                                    <input type="checkbox" id="kacktail" name="kacktail" value="1">
                                    <label for="kacktail">カクテル充実</label>
                                </div>
                                
                                <div class="sa">
                                    <input type="hidden" name="sake" value="0">
                                    <input type="checkbox" id="sake" name="sake" value="1">
                                    <label for="sake">日本酒充実</label>
                                </div>
                                
                                <div class="wi">
                                    <input type="hidden" name="wine" value="0">
                                    <input type="checkbox" id="wine" name="wine" value="1">
                                    <label for="wine">ワイン充実</label>
                                </div>
                                
                                <div class="par">
                                    <input type="hidden" name="parking" value="0">
                                    <input type="checkbox" id="parking" name="parking" value="1">
                                    <label for="parking">駐車場</label>
                                </div>
                            </div>
                            
                            <input type="hidden" id="latitudeInput" name="latitude" value="">
                            <input type="hidden" id="longitudeInput" name="longitude" value="">
                            <!--軽度と緯度をサーバーに送る-->
                            
                            
                            <button id="btn" type="submit" class="px-5 py-2 bg-orange-400 rounded-md text-white duration-75 hover:bg-orange-700 cursor-pointer font-bold">この条件で検索する</button>
                        </div>
                    </form>
                    <br>
                    <!--テスト-->
                </div>
                <div class="opacity-0">
                    <h1>緯度と経度計測</h1>
                    <div class="center">
                        <div class="txt-margin">
                            <p>緯度：<span id="latitude">???</span><span>度</span></p>
                            <p>経度：<span id="longitude">???</span><span>度</span></p>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="fade">
            <div class="container p-0 m-0 mx-auto h-96 my-48">
                <div>
                    <p class="font-serif text-center text-7xl mb-20">食スルとは？</p>
                </div>
                <div class="font-serif text-5xl">
                    <p>食スルとは、好みに合わせて、お店を一つ紹介するアプリです。</p>
                    <p>皆さんは、お店選びで困ったことはありませんか？そんな時に活用していただきたいです。</p>
                </div>
            </div>
        </div>
        
        
        
        <div class="border-b-4 border-bg-slate-200 mt-12 text-6xl font-bold text-center text-shadow-xl pb-12">みんなの投稿</div>
        
        <div class="fade">
            <div class="font-sans container mx-auto bg-orange-50 my-10 py-auto shadow-lg flex relative mt-14">
                <div>
                        <img src="../images.jpeg" alt="画像が読み込めません。" width="300" height="200"/>
                        <!--class="z-10 transition-opacity duration-300 ease-in-out hover:opacity-75"-->
                </div>
                
                <div class="relative top-2 left-5">
                    <div class="flex">
                        <span class="material-symbols-outlined mt-1 mr-2">account_circle</span>
                        <div>
                            <p class="text-xs">yamada01<p>
                            <p class="text-xs">2023-08-16 03:00:19</p>
                        </div>
                    </div>
                
                    <div class="pt-2">
                        <h2 class="text-3xl font-bold duration-75 hover:text-slate-500">飯山商店</h2>
                    </div>
                    
                    <div class="text-2xl pt-4">
                        <p class="">このお店のラーメンは格別に美味しいです！</p>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="fade">
            <div class="font-sans container mx-auto bg-orange-50 my-10 py-auto shadow-lg flex relative">
                <div>
                        <img src="../imagesrrr.jpeg" alt="画像が読み込めません。" width="300" height="200"/>
                        <!--class="z-10 transition-opacity duration-300 ease-in-out hover:opacity-75"-->
                </div>
                
                
                <div class="relative top-2 left-5">
                    <div class="flex">
                        <span class="material-symbols-outlined mt-1 mr-2">account_circle</span>
                        <div>
                            <p class="text-xs">tanaka01<p>
                            <p class="text-xs">2023-08-17 06:00:50</p>
                        </div>
                    </div>
            
        
                    <div class="pt-2">
                        <h2 class="text-3xl font-bold duration-75 hover:text-slate-500">山田食堂</h2>
                    </div>
                    
                    <div class="text-2xl pt-4">
                        <p class="">全てが大盛りです！是非一度は言って欲しい！</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center mt-14 mb-10">
            <a href="/index" class="text-2xl px-3 py-2 bg-blue-500 rounded-md text-white hover:bg-blue-800 cursor-pointer">さらに見る</a>
        </div>
            
        
        
        <script>
        
            const targets = document.getElementsByClassName('fade');
            for(let i = targets.length; i--;){
             let observer = new IntersectionObserver((entries, observer) => {
              for(let j = entries.length; j--;){
               if (entries[j].isIntersecting) {
                entries[j].target.classList.add('active');
               } else{
                entries[j].target.classList.remove('active');
               }
              }
             });
             observer.observe(targets[i]);
            }
        
            function beforeSubmit() {
                if(window.confirm('本当にこの内容で検索しますか？')) {
                  return true;
                } else {
                  return false;
                }
              }
              
            // ボタンを押した時の処理
            document.addEventListener("DOMContentLoaded", function() {
                // 位置情報を取得する
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            });
            
            // 取得に成功した場合の処理
            function successCallback(position){
                // 緯度を取得し画面に表示
                var latitude = position.coords.latitude;
                document.getElementById("latitude").innerHTML = latitude;
                // 経度を取得し画面に表示
                var longitude = position.coords.longitude;
                document.getElementById("longitude").innerHTML = longitude;
                
                // 緯度と経度の値を隠し入力フィールドに設定
                document.getElementById("latitudeInput").value = latitude;
                document.getElementById("longitudeInput").value = longitude;
            };
            
            // 取得に失敗した場合の処理
            function errorCallback(error){
                alert("位置情報が取得できませんでした");
            };
        </script>
        
        </div>
    </body>
</html>