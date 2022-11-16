
@extends('layouts.admin')
@section('title', '小説の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>新規小説作成</h2>
                <form action="{{ route('admin.novel_writings.store') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">章</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="chapter" value="{{ old('chapter') }}">
                        </div>
                    <div class="form-group row">
                        <label class="col-md-2">節</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="section" value="{{ old('section') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="20">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="保存">
                </form>
            </div>
        </div>
    </div>
@endsection