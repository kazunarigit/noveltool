@extends('layouts.admin')
@section('title', '小説一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>作成済み小説の一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.novel_writings.create'); }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.novel_writings.index'); }}" method="post">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-index col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <!--<th width="10%">ID</th>-->
                                <th width="20%">タイトル</th>
                                <!--<th width="50%">本文</th>-->
                                <!--<th width="10%">操作</th>-->
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($posts as $novel)
                                <tr>
                                    <th>{{ $novel->id }}</th>
                                    <td>{{ \Str::limit($novel->title, 100) }}</td>
                                   //<td>{{ \Str::limit($novel->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.novel_writings.edit', $novel->id); }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.novel_writings.destroy', $novel->id); }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection