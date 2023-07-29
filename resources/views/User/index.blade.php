<x-app-layout>
    <h1>マイページ</h1>
    <br>
    <div class="own_posts">
        @foreach($own_posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <small>{{ $post->user->name }}</small>
                <p>{{ $post->body }}</p>
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
        @endforeach
        <div>
            <a href="/index">表示一覧へ</a>
        </div>
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>
</x-app-layout>