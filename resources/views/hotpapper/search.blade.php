<x-app-layout>
    <h1>検索ページです</h1>
    
    <form action="/result" name="myform" method="POST" onsubmit="return beforeSubmit()">
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
            <input type="checkbox" name="free_drink" value="1">
            <input type="hidden" name="free_drink" value="0">
            <label for="free_drink">飲み放題</label>
        </div>
        
        <div class="food">
            <input type="checkbox" name="free_food" value="1">
            <input type="hidden" name="free_food" value="0">
            <label for="free_food">食べ放題</label>
        </div>
        
        <div class="pri">
            <input type="checkbox" name="private_room" value="1">
            <input type="hidden" name="private_room" value="0">
            <label for="private">個室</label>
        </div>
        
        <div class="mid">
            <input type="checkbox" name="midnight" value="1">
            <input type="hidden" name="midnight" value="0">
            <label for="midnight">23時以降営業</label>
        </div>
        
        <div class="kack">
            <input type="checkbox" name="kacktail" value="1">
            <input type="hidden" name="kacktail" value="0">
            <label for="kacktail">カクテル充実</label>
        </div>
        
        <div class="sa">
            <input type="checkbox" name="sake" value="1">
            <input type="hidden" name="sake" value="0">
            <label for="sake">日本酒充実</label>
        </div>
        
        <div class="wi">
            <input type="checkbox" name="wine" value="1">
            <input type="hidden" name="wine" value="0">
            <label for="wine">ワイン充実</label>
        </div>
        
        <div class="par">
            <input type="checkbox" name="parking" value="1">
            <input type="hidden" name="parkingk" value="0">
            <label for="parking">駐車場</label>
        </div>
        
        <input type="hidden" id="latitudeInput" name="latitude" value="">
        <input type="hidden" id="longitudeInput" name="longitude" value="">
        <!--軽度と緯度をサーバーに送る-->
        
        
        <button id="btn" type="submit">この条件で検索する</button>
    </form>
    <br>
    
    <!--テスト-->
    <h1>緯度と経度計測</h1>
    <div class="center">
        <div class="txt-margin">
            <p>緯度：<span id="latitude">???</span><span>度</span></p>
            <p>経度：<span id="longitude">???</span><span>度</span></p>
        </div>
    </div>
    
    
    <script>
        function beforeSubmit() {
            if(window.confirm('本当にこの内容で検索しますか？')) {
              return true;
            } else {
              return false;
            }
          }
          
          
          
          
        // ボタンを押した時の処理
    document.getElementById("btn").onclick = function(){
        // 位置情報を取得する
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    };
    
    // 取得に成功した場合の処理
    function successCallback(position){
        // 緯度を取得し画面に表示
        var latitude = position.coords.latitude;
        document.getElementById("latitude").innerHTML = latitude;
        // 経度を取得し画面に表示
        var longitude = position.coords.longitude;
        document.getElementById("longitude").innerHTML = longitude;
        
        // 緯度と経度の値を隠し入力フィールドに設定
        document.getElementById("latitudeInput").value = latitude;
        document.getElementById("longitudeInput").value = longitude;
    };
    
    // 取得に失敗した場合の処理
    function errorCallback(error){
        alert("位置情報が取得できませんでした");
    };
    </script>
</x-app-layout>