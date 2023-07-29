<x-app-layout>
    <h1>検索ページです</h1>
    
    <form action="/result" method="POST" onsubmit="return beforeSubmit()">
        @csrf
        <div class="ran">
            <label for="range">検索範囲</label>
            <select name="range" required>
                <option value="">-選択してください-</option>
                <option value="1">300m以内</option>
                <option value="2">500m以内</option>
                <option value="3">1000m以内</option>
                <option value="4">2000m以内</option>
                <option value="5">3000m以内</option>
            </select>
        </div>
        
        <div class="drink">
            <label for="free_drink">飲み放題</label>
            <select name="free_drink" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="food">
            <label for="free_food">食べ放題</label>
            <select name="free_food" required>
                <option value="0">絞り込まない</option></option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="pri">
            <label for="private">個室</label>
            <select name="private_room" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="mid">
            <label for="midnight">23時以降営業</label>
            <select name="midnight" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="kack">
            <label for="kacktail">カクテル充実</label>
            <select name="kacktail" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="sa">
            <label for="sake">日本酒充実</label></label>
            <select name="sake" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="wi">
            <label for="wine">ワイン充実</label>
            <select name="wine" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <div class="par">
            <label for="parking">駐車場</label>
            <select name="parking" required>
                <option value="0">絞り込まない</option>
                <option value="1">絞り込む</option>
            </select>
        </div>
        
        <button type="submit">この条件で検索する</button>
    </form>
    
    <script>
        function beforeSubmit() {
            if(window.confirm('本当にこの内容で検索しますか？')) {
              return true;
            } else {
              return false;
            }
          }
    </script>
</x-app-layout>