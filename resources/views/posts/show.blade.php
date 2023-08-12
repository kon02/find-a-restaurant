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

                <div class="">
                    <h1 class="mt-12 text-5xl font-bold text-center text-shadow-xl">投稿詳細</h1>
                </div>
                
                
                <div class="w-3/4 mx-auto bg-white my-5 shadow-lg pt-6 pb-12 rounded-md relative">
                    <div class="ml-5">
                        <!--ユーザーアイコン＋ネーム-->
                        <div class="flex">
                            <span class="material-symbols-outlined text-5xl mr-2">account_circle</span>
                            <div class="class="text-xs"">
                                <p>{{ $post->user->name }}</p>
                                <p>{{ $post->created_at}}</p>
                            </div>
                        </div>
                        
                        @if(Auth::id() == $post->user_id)
                        <div class="flex absolute bottom-2 right-2 text-1xl space-x-3">
                            <a href="/posts/{{ $post->id }}/edit" class="flex space-x-1 my-auto duration-75 hover:text-slate-500">
                                <span class="material-symbols-outlined">edit</span>
                                <div>編集</div>
                            </a>
                            <form action="index/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{ $post->id }})" class="flex space-x-1 my-auto duration-75 hover:text-slate-500">
                                    <span class="material-symbols-outlined">delete</span>
                                    <div>消去</div>
                                </button> 
                            </form>
                        </div>
                        @endif
                        
                        <div class="flex absolute top-7 right-7 text-3xl">
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
                        
                        <h1 class="text-4xl font-bold my-6">
                            {{ $post->title }}
                        </h1>
                        
                        <div class="flex space-x-20">
                            <div>
                                @if($post->image_url)
                                    <div>
                                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="300" height="200"/>
                                    </div>
                                @else
                                    <div>
                                        <img src="../messageImage_1691492156238.jpg" alt="画像が読み込めません。" width="300" height="200"/>
                                    </div>
                                @endif
                            </div>
                                
                            <div class="flex-col space-y-5 mt-5">
                                <div class="text-3xl">
                                    @if($post->average)
                                        <div class="flex space-x-8"><p class="px-3 py-2 bg-orange-300 rounded-md text-white">平均予算</p><p class="my-auto">{{ $post->average }}</p></div>
                                    @else
                                        <div class="flex space-x-8"><p class="px-3 py-2 bg-orange-300 rounded-md text-white">平均予算</p><p class="my-auto">記載なし</p></div>
                                    @endif
                                </div>
                                
                                <div class="text-3xl">
                                    @if($post->day)
                                        <div class="flex space-x-8"><p class="px-3 py-2 bg-orange-300 rounded-md text-white">営業時間</p><p class="my-auto">{{ $post->day }}</p></div>
                                    @else
                                        <div class="flex space-x-8"><p class="px-3 py-2 bg-orange-300 rounded-md text-white">営業時間</p><p class="my-auto">記載なし</p></div>
                                    @endif
                                </div>
                                
                                <div class="flex-col space-y-5 mt-auto">
                                    <h3 class="text-3xl">コメント</h3>
                                    <div class="border-b-4 border-slate-400 opacity-25"></div>
                                    <p class="text-2xl">{{ $post->body }}</p>    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="flex justify-end mr-56 mt-12">
                    <a href="/index" class="text-3xl px-3 py-2 bg-blue-500 rounded-md text-white hover:bg-blue-800 cursor-pointer">戻る</a>
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