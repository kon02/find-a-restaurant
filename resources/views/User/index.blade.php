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



                <div class="container mx-auto bg-slate-200 my-10 h-auto py-10 rounded-md">
                    <div class="text-5xl ml-20 my-auto flex">
                        <span class="material-symbols-outlined text-5xl mt-1 mr-2">account_circle</span>
                        <p class=""> {{ Auth::user()->name }} <p>
                    </div>
                </div>
                
                @foreach($own_posts as $post)
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
                    
                    
                <div class="flex justify-center pb-16">
                    <a href="/index" class="text-2xl text-center px-3 py-2 bg-blue-500 rounded-full text-white hover:bg-blue-800 cursor-pointer">表示一覧へ</a>
                </div>
           
    
    
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