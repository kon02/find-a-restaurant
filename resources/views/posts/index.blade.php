<x-app-layout>
    <body>
        <h1>Blog Name</h1>
        <h2>ログインユーザー：{{ Auth::user()->name }}</h2>
        <br>
        <div class='posts'>
            
            @foreach ($posts as $post)
                <small>{{ $post->user->name }}</small>
                
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
                
                <div class='post'>
                    
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{$post->body}}</p>
                    
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="300" height="200"/>
                    </div>
                    @else
                    <div>
                        <p>画像なし</p>
                    </div>
                    @endif
                    
                    @if(Auth::id() == $post->user_id)
                    <form action="index/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">消去</button> 
                    </form>
                    @endif
                    <br>
                </div>
            @endforeach
        </div>
        <a href='/posts/create'>作成</a>
        <br>
        <a href='/user'>マイページ</a>
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>