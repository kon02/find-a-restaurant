<x-app-layout>
    <table border="1">
        <tr>
            <th>店舗名</th>
            <th>営業時間</th>
        </tr>
        @for ($i = 0; $i < $restaurants['results_returned']; $i++)
            <tr>
                <div>
                    <td>
                        <a href="{{{ $restaurants['shop'][$i]['urls']['pc'] }}}">{{{ $restaurants['shop'][$i]['name'] }}}</a>
                        <img src="{{{ $restaurants['shop'][$i]['photo']['pc']['m'] }}}" alt="店舗写真">
                    </td>
                    <td>
                        <p>{{{ $restaurants['shop'][$i]['catch'] }}}</p>
                        <p>営業時間：{{{ $restaurants['shop'][$i]['open'] }}}</p>
                        <p>定休日：{{{ $restaurants['shop'][$i]['close'] }}}</p>
                        <p>飲み放題：{{{ $restaurants['shop'][$i]['free_drink'] }}}</p>
                        <p>食べ放題：{{{ $restaurants['shop'][$i]['free_food'] }}}</p>
                    </td>
                </div>
            </tr>
        @endfor
    </table>
</x-app-layout>