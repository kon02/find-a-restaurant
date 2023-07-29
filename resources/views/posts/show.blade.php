<x-app-layout>
    <body>
        <small>{{ $post->user->name }}</small>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="300" height="200"/>
            </div>
            @else
            <div>
                <p>画像なし</p>
            </div>
            @endif
        </div>
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/index">戻る</a>
        </div>
    </body>
    
</x-app-layout>