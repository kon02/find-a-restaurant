<x-app-layout>
    <body>
        <h1>Blog Name</h1>
        <h2>ログインユーザー：{{ Auth::user()->name }}</h2>
        <br>
        <div class='posts'>
            
            @foreach ($posts as $post)
                <small>{{ $post->user->name }}</small>
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
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
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