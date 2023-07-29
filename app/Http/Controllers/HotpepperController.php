<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;

class HotpepperController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';

    // APIキー
    private $api_key;
    
    
    public function search()
    {
        return view('hotpapper.search');
    }

    public function index(Request $request)
    {
        // dd($request);
        // インスタンス生成
        $client = new Client();

        // HTTPリクエストメソッド
        $method = 'GET';

        // APIキーを取得
        $this->api_key = config('hotpepper.api_key');

        // APIキーや検索ワードなどの設定を記述
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                // 'keyword' => '栃木',
                'lat' => 36.31734,//緯度
                'lng' => 139.60950,//経度
                'range' => $request->range,//1: 300m,2: 500m,3: 1000m,4: 2000m,5: 3000m
                'count' => 10,//何個検索結果を出すか
                'free_drink' => $request->free_drink,//飲み放題：0:絞り込まない,1:絞り込む
                'free_food' => $request->free_food,//食べ放題：0:絞り込まない,1:絞り込む
                'private_room' => $request->private_room,//個室：0:絞り込まない,1:絞り込む
                'midnight_meal'=> $request->midnight,//23時以降食事OK：0:絞り込まない,1:絞り込む
                'cocktail' => $request->cocktail,//カクテル充実：0:絞り込まない,1:絞り込む
                'sake' => $request->sake,//日本酒充実：0:絞り込まない,1:絞り込む
                'wine' => $request->wine,//ワイン充実：0:絞り込まない,1:絞り込む
                'order' => 4,//ソート：4:おススメ順
                'parking' => $request->parking,//駐車場あり:0:絞り込まない,1:絞り込む
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];

        // index.blade.phpを表示する
        return view('index', compact('restaurants'));
    }
}
