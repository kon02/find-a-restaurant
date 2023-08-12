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
                
                <h1 class="mt-12 text-5xl font-bold text-center text-shadow-xl pb-7">新規作成</h1>
                
                <div class="mx-96 bg-white border-8 border-orange-400 my-5 shadow-lg pt-6 pb-12 rounded-md relative">
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center justify-center">
                            <div class="space-y-5">
                                <div class="title">
                                    <h2>店名</h2>
                                    <input type="text" name="post[title]" placeholder="〇〇食堂" value="{{ old('post.title') }}" class="rounded-md w-64"/>
                                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                                </div>
                                <div>
                                    <h2>平均予算</h2>
                                    <input type="text" name="post[average]" placeholder="2000円〜3000円" value="{{ old('post.average') }}" class="rounded-md w-64"/>
                                    <p class="average__error" style="color:red">{{ $errors->first('post.average') }}</p>
                                </div>
                                <div>
                                    <h2>営業時間</h2>
                                    <input type="text" name="post[day]" placeholder="月～金: 11:00～23:30" value="{{ old('post.day') }}" class="rounded-md w-80"/>
                                    <p class="day__error" style="color:red">{{ $errors->first('post.day') }}</p>
                                </div>
                                <div class="body">
                                    <h2>レビュー</h2>
                                    <textarea name="post[body]" placeholder="〜〜がとてもおいしかった！" class="rounded-md h-32 w-96 resize-y">{{ old('post.body') }}</textarea>
                                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                                </div> 
                                <div class="">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            
                            <div class="absolute bottom-5 right-8">
                                <input type="submit" value="保存" class="px-5 py-2 bg-orange-400 rounded-md text-white duration-75 hover:bg-orange-700 cursor-pointer"/>
                            </div>
                        </div>
                    </form>
                    <!--<div >[<a href="/">back</a>]</div>-->
                </div>
            </div>
        </div>
    </body>
</html>