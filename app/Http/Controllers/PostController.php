<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Cloudinary;


class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        //getPaginateByLimit()はPost.phpで定義したメソッド
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Post $post, PostRequest $request)//PostRequestで条件を満たさないと保存できないようにする
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            //cloudinaryへ画像を送信し、
            $publicId = cloudinary::getPublicId();
            //直前にcloudinaryにアップロードされたが画像の名前を取得
            $input += ['image_url' => $image_url];
            $post->public_id = $publicId;
        }
        $post->fill($input)->save();
        // dd($publicId);
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            //cloudinaryへ画像を送信し、
            $publicId = cloudinary::getPublicId();
            //直前にcloudinaryにアップロードされたが画像の名前を取得
            $input_post += ['image_url' => $image_url];
            $post->public_id = $publicId;
        }
        // dd($input_post);
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/index');
    }
    
    public function destroy(Request $request, Post $post)
    {
        
        $input_post = $request['post'];
        // dd($input_post,$post);
        Cloudinary::destroy($post->public_id);
        $post->image_url='';//データベースの中身を空にする
        $post->public_id='';
        $post->save();
        
        // $publicIdは削除したい画像のpublic_id
        // このpublic_idはCloudinary上で画像を一意に特定するための識別子
        // Cloudinaryのdestroyメソッドを呼び出して画像を削除します。
        return redirect('/posts/' . $post->id);
    }
}
