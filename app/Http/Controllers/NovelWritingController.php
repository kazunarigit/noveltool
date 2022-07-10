<?php

namespace App\Http\Controllers;

use App\NovelWriting;
use Illuminate\Http\Request;


class NovelWritingController extends Controller
{
    //
    public function add(){
        return view('admin.create');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
    if ($cond_title != '') {
        // 検索されたら検索結果を取得する
        $posts = NovelWriting::where('title', $cond_title)->get();
    }else{
        // それ以外はすべてのニュースを取得する
        $posts = NovelWriting::all();
    }
    return view('admin.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 以下を追記
      // Varidationを行う
      $this->validate($request, NovelWriting::$rules);

      $novelwriting = new NovelWriting;
      $form = $request->all();
      
       // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      
      $novelwriting->fill($form);
      $novelwriting->save();
      
      // admin/news/createにリダイレクトする
      return redirect('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function show(NovelWriting $novelWriting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, NovelWriting $novelWriting)
    {
        // News Modelからデータを取得する
      $novelWriting = NovelWriting::find($request->id);
      if (empty($novelWriting)) {
        abort(404);    
      }
      return view('admin.edit', ['novelwriting_form' => $novelWriting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NovelWriting $novelWriting)
    {
        // Validationをかける
      $this->validate($request, NovelWriting::$rules);
      // News Modelからデータを取得する
      $novelWriting = NovelWriting::find($request->id);
      // 送信されてきたフォームデータを格納する
      $novelWriting_form = $request->all();
       

      
      unset($novelWriting_form['remove']);
      unset($novelWriting_form['_token']);

      // 該当するデータを上書きして保存する
      $novelWriting->fill($novelWriting_form)->save();
      /*
      $history = new History();
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();
    */

      return redirect('admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, NovelWriting $novelWriting)
    {
        // 該当するNews Modelを取得
      $novelWriting = NovelWriting::find($request->id);
      // 削除する
      $novelWriting->delete();
      return redirect('admin/index/');
    }
}
