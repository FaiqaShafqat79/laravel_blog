@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn default" type="button">Go Back</a> <br>
    <h1>{{$post->title}}</h1>
    <img src="/storage/cover_image/{{$post->cover_image}}" alt="" class="img-fluid" style="width:100%">
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>Written on: {{$post->created_at}} by <b>{{$post->user->name}}</b></small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" type="button">Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'float-right']) !!}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection