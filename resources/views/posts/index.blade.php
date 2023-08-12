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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
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
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                <div class="flex">
                    <h1 class="mt-12 ml-32 text-5xl font-bold">みんなの投稿</h1>
                    <a href='/posts/create' class="flex space-x-1 my-auto ml-auto mt-12 px-2 py-2 bg-orange-400 rounded-md text-white duration-75 hover:bg-orange-700 cursor-pointer">
                        <span class="material-symbols-outlined">add_circle</span>
                        <div>新規作成</div>
                    </a>
                    <a href='/user' class="flex space-x-1 my-auto mr-20 ml-5 mt-12 px-2 py-2 bg-orange-400 rounded-md text-white duration-75 hover:bg-orange-700 cursor-pointer">
                        <span class="material-symbols-outlined">person</span>
                        <div>マイページ</div>
                    </a>
                </div>
                
                <!--ブログ投稿-->
                @foreach ($posts as $post)
                <div class="container mx-auto bg-white my-10 py-auto shadow-lg flex relative">
                    <div>
                        @if($post->image_url)
                        <a href="/posts/{{ $post->id }}">
                            <!--class="relative inline-block group"-->
                            <!--<div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-25 transition-opacity duration-300 ease-in-out"></div>-->
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="300" height="200"/>
                            <!--class="z-10 transition-opacity duration-300 ease-in-out hover:opacity-75"-->
                        </a>
                        @else
                        <div>
                            <div>
                                <img src="../messageImage_1691492156238.jpg" alt="画像が読み込めません。" width="300" height="200"/>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <div class="flex absolute top-5 right-5">
                        @if(Auth::id() == $post->user_id)
                            <div class="mr-2">
                                <a href="/posts/{{ $post->id }}/edit" class="flex space-x-1 my-auto duration-75 hover:text-slate-500">
                                    <span class="material-symbols-outlined">edit</span>
                                    <div>編集</div>
                                </a>
                            </div>
                        @endif
                        
                        @if(Auth::id() == $post->user_id)
                        <form action="index/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})" class="flex space-x-1 my-auto duration-75 hover:text-slate-500">
                                <span class="material-symbols-outlined">delete</span>
                                <div>消去</div>
                            </button> 
                        </form>
                        @endif
                    </div>
                    
                    <div class="flex absolute bottom-5 right-5 text-1xl">
                        @auth
                        <!-- Post.phpに作ったisLikedByメソッドをここで使用 -->
                        @if (!$post->isLikedBy(Auth::user()))
                            <span class="likes">
                                <i class="fas fa-heart like-toggle cursor-pointer" data-post-id="{{ $post->id }}"></i>
                            <span class="like-counter">{{$post->likes_count}}</span>
                            </span><!-- /.likes -->
                        @else
                            <span class="likes">
                                <i class="fas fa-heart heart like-toggle liked text-red-600" data-post-id="{{ $post->id }}"></i>
                            <span class="like-counter">{{$post->likes_count}}</span>
                            </span><!-- /.likes -->
                        @endif
                        @endauth
                    </div>
                    
                    <div class="relative top-2 left-5">
                        <div class="flex">
                            <span class="material-symbols-outlined mt-1 mr-2">account_circle</span>
                            <div>
                                <p class="text-xs">{{ $post->user->name }}<p>
                                <p class="text-xs">{{ $post->created_at}}</p>
                            </div>
                        </div>
                    
                        <div class="pt-2">
                            <h2 class="text-3xl font-bold duration-75 hover:text-slate-500">
                                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </h2>
                        </div>
                        
                        <div class="text-2xl pt-4">
                            <p class="">{{$post->body}}</p>
                        </div>
                        

                    </div>
                </div>
                @endforeach
                
                
                <!--javascript-->
                <script>
                    function deletePost(id) {
                        'use strict'
                
                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>


            </div>
        </div>
    </body>
</html>