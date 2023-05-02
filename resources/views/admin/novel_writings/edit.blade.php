@extends('layouts.admin')
@section('title', '小説の編集')

@php
$novelwriting_form = App\NovelWriting::find($id);
@endphp



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>小説編集</h2>
                <form method="post" action="{{ route('novel_writings.update', ['novel_writing' => $novel->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit">更新</button>
                </form>
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $novelwriting_form->title ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="content">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="20">{{ $novelwriting_form->content ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $novelwriting_form->id ?? '' }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                {{-- 以下を追記--}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($novelwriting_form->histories != NULL)
                                @foreach ($novelwriting_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
