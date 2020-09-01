
@extends('layout.master')
@section('content')
   {{-- Database error/success display logic --}}
   @if (session('status_success'))
   <p class="badge badge-success"><b>{{ session('status_success') }}</b></p>
@else
   <p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

  {{-- Validation error, for invalid incoming data, display logic --}}
  @if ($errors->any())
  <div>
      @foreach ($errors->all() as $error)
          <p style="color: red">{{ $error }}</p>
      @endforeach
  </div>
@endif


    @foreach ($posts as $post)
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['text'] }}</p>
        <p style="font-size: 10px">Comment count: {{ count($post->comments) }} 
            | <a href="{{ route('posts.show', $post['id']) }}">View post details and comment on it</a></p>

        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
            @method('DELETE') @csrf
            <input class="btn btn-danger" type="submit" value="DELETE">
        </form>


        <form action="{{ route('posts.show', $post['id']) }}" method="GET">
            <input class="btn btn-info" type="submit" value="UPDATE">
        </form>
      
    @endforeach


    <form method="POST" action="/posts">
        @csrf
        <label for="title">Post title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="text">Post text:</label><br>
        <input type="text" id="text" name="text"><br><br>
        <input class="btn btn-success" type="submit" value="Submit">
    </form>
  

@endsection

