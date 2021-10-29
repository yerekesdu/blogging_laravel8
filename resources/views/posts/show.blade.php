@extends('.layout')

@section('title', 'Show post')

@section('content')
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>

        @foreach($comments as $comment)
            <h3>{{$comment->user->name}}</h3>
            <p>{{$comment->text}}</p>
        @endforeach

        <form action="{{route('comments.store')}}" method="POST">
            @csrf
            <textarea name="text" cols="30" rows="10"></textarea>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button class="btn btn-primary">Add comment</button>
        </form>
@endsection
