@extends('layout.master')
@section('content')
<form action="{{ route('posts.update', $post['id']) }}" method="POST">
    @method('PUT') @csrf
    <input type="text" name="title" value="{{ $post['title'] }}"><br>
    <input type="text" name="text" value="{{ $post['text'] }}"><br>
    <input class="btn btn-info" type="submit" value="UPDATE">
</form>

@endsection
