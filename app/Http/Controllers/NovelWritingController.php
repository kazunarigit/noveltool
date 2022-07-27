<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\HTML;

// 追記
use App\NovelWriting;

class NovelWritingController extends Controller
{
    public function index(Request $request)
    {
        $posts = NovelWriting::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('index', ['headline' => $headline, 'posts' => $posts]);
    }
}
