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
                
                
                
                <h1 class="mt-12 text-5xl font-bold text-center text-shadow-xl pb-7">編集画面</h1>
                
                <div class="mx-96 bg-white border-8 border-blue-400 my-5 shadow-lg pt-6 pb-12 rounded-md relative">
                    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center justify-center">
                            <div class="space-y-5">
                        
                                <div class="">
                                    <h2>店名</h2>
                                    <input type='text' name='post[title]' value="{{ $post->title }}" class="rounded-md w-64">
                                </div>
                                    
                                <div class="">
                                    @if($post->average)
                                        <h3>平均予算</h3>
                                        <input type='text' name='post[average]' value="{{ $post->average }}" class="rounded-md w-64">
                                    @else
                                        <h3>平均予算</h3>
                                        <input type='text' name='post[average]' value="" placeholder="記載なし" class="rounded-md w-64">         
                                    @endif
                                </div>
                                
                                <div class="">
                                    @if($post->day)
                                        <h3>営業時間</h3>
                                        <input type='text' name='post[day]' value="{{ $post->day }}" class="rounded-md w-64">
                                    @else
                                        <h3>営業時間</h3>
                                        <input type='text' name='post[day]' value=""　placeholder="記載なし" class="rounded-md w-64">
                                    @endif
                                </div>
                                
                                <div>
                                    <h3>レビュー</h3>
                                    <input type='text' name='post[body]' value="{{ $post->body }}" class="rounded-md w-64">
                                </div>
                                
                                @if(!$post->image_url)
                                    <div>
                                        <p>画像なし</p>
                                        <div class="image">
                                            <input type="file" name="image">
                                        </div>
                                        <!--アップロードができていない-->
                                    </div>
                                @endif
                            </div>
                            
                            <div class="absolute bottom-5 right-8">
                            <input type="submit" value="保存" class="px-5 py-2 bg-orange-400 rounded-md text-white duration-75 hover:bg-orange-700 cursor-pointer">
                            </div>
                        </div>
                    </form>
                        
                    <div class='content__image'>
                        @if($post->image_url)
                        <div class="mt-10 mx-44">
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="300" height="200" class=""/>
                            <form action="/posts/{{ $post->id }}/edit/destroy" id="form_{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="destroy_image">
                                    <button type="button" onclick="deleteImage({{ $post->id }})" class="duration-75 hover:text-slate-500">写真を消去</button>
                                </div>
                            </form>    
                        </div>
                        @endif
                    </div>
                    
                        
                </div>
                
                <script>
                    function deleteImage(id) {
                        'use strict'
                    
                        if (confirm('本当に削除しますか？')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>

            </div>
        </div>
    </body>
</html>