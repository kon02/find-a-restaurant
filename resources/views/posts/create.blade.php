<x-app-layout>

    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div> 
            <div class="image">
                <input type="file" name="image">
            </div>
            <div class="keep">
            <input type="submit" value="保存"/>
            </div>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
    
</x-app-layout>