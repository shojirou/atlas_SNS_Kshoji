@extends('layouts.login')

@section('content')
 <div class="container">
        <h2 class="page-header">新しく投稿をする</h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}
 </div>

@endsection
