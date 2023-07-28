<x-app-layout>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存する">
        </form>
        
            
        <div class='content__image'>
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="300" height="200"/>
                <form action="/posts/{{ $post->id }}/edit/destroy" id="form_{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="destroy_image">
                        <button type="button" onclick="deleteImage({{ $post->id }})">写真を消去</button>
                    </div>
                </form>    
            </div>
            @else
            <div>
                <p>画像なし</p>
                <div class="image">
                    <input type="file" name="image">
                </div>
                <!--アップロードができていない-->
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
</body>
    
</x-app-layout>