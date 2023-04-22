<?php

namespace App\Http\Controllers\Admin;

use App\NovelWriting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NovelWritingController extends Controller
{
    //
    public function add(){
        return view('admin.novel_writings.create');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cond_title = $request->input('cond_title');
        if (!empty($cond_title)) {
        // 検索されたら検索結果を取得する
            $posts = NovelWriting::where('title', 'like', "%{$cond_title}%")->get();
        }else{
        // それ以外はすべてのニュースを取得する
            $posts = NovelWriting::all();
        }
            return view('admin.novel_writings.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.novel_writings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // 以下を追記
        // Varidationを行う
        $this->validate($request, NovelWriting::$rules);

        $novelwriting = new NovelWriting;
        $novelwriting->title = $request->title;
        $novelwriting->content = $request->content;
        $novelwriting->save();
        return redirect()->route('admin.novel_writings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $novelWriting = NovelWriting::find($id);
        return view('admin.novel_writings.edit', ['novelWriting' => $novelWriting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        
        $novelwriting_form = App\NovelWriting::find($id);
        return view('admin.novel_writings.edit', ['novelwriting_form' => $novelWriting_form]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validationをかける
        $this->validate($request, NovelWriting::$rules);
        // Modelからデータを取得する
        $novelWriting = NovelWriting::find($id);
        // 
        $novelWriting->title = $request->title;
        $novelWriting->content = $request->content;

        // 該当するデータを上書きして保存する
        $novelWriting->save();
      
        
    

      return redirect()->route('admin.novel_writings.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NovelWriting  $novelWriting
     * @return \Illuminate\Http\Response
     */
    public function destroy(NovelWriting $novelWriting)
    {
        // 該当するNews Modelを取得
        // $novelWriting = NovelWriting::find($request->id);
        // 削除する
        $novelWriting->delete();
        return redirect()->route('admin.novel_writings.index');
    }
}
