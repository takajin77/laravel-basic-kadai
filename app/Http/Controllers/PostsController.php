<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index(){
        //postsテーブルからすべてのデータを取得し、変数$postsに代入
        $posts=DB::table('posts')->get();

        //変数$postsをposts/index.blade.phpファイルに渡す
        return view('posts.index',compact('posts'));
    }

    public function show($id){
        // url/posts/{id}の{id}部分と主キー(idからむ)の値が一致するデータをpostsテーブルから取得し、変数$postsに代入
        $posts= Posts::find($id);

        //変数$postsをposts/show.blade.phpファイルに渡す
        return view('posts.show',compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        //バリデーションを設定
        $request->validate([
            'title'=>'required|max:20',
            'content'=>'required|max:200'
        ]);

        //フォーム内容をもとに、テーブルにデータを追加する
        $posts= new Posts();
        $posts->title=$request->input('title');
        $posts->content=$request->input('content');
        $posts->save();

        //リダイレクトさせる
        return redirect("/posts/{$posts->id}");
    }
}