<x-app-layout>
        @php
        // 1~$restaurants['results_returned']の範囲でランダムな整数を生成
        $randomIndex = rand(0, $restaurants['results_returned']-1);
        @endphp
        
    @if($restaurants['results_returned'] > 0)
        <table border="1">
            <tr>
                <th>店舗名</th>
                <th>営業時間</th>
            </tr>
            
                <tr>
                    <div>
                        <td>
                            <a href="{{{ $restaurants['shop'][$randomIndex]['urls']['pc'] }}}">{{{ $restaurants['shop'][$randomIndex]['name'] }}}</a>
                            <img src="{{{ $restaurants['shop'][$randomIndex]['photo']['pc']['m'] }}}" alt="店舗写真">
                        </td>
                        <td>
                            <p>{{{ $restaurants['shop'][$randomIndex]['catch'] }}}</p>
                            <p>営業時間：{{{ $restaurants['shop'][$randomIndex]['open'] }}}</p>
                            <p>定休日：{{{ $restaurants['shop'][$randomIndex]['close'] }}}</p>
                            <p>飲み放題：{{{ $restaurants['shop'][$randomIndex]['free_drink'] }}}</p>
                            <p>食べ放題：{{{ $restaurants['shop'][$randomIndex]['free_food'] }}}</p>
                        </td>
                    </div>
                </tr>
        </table>
        <a href="/">ホームへ戻る</a>
        
    @else
        <p>お店がありません</p>
    @endif
</x-app-layout>