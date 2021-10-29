<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    {{--        @error('content')--}}
    {{--        <div class="alert alert-danger">--}}
    {{--            content must be numeric--}}
    {{--        </div>--}}
    {{--        @enderror--}}
    {{--        @if($errors->has('content'))--}}
    {{--            <div class="alert alert-danger">--}}
    {{--                {{$errors->first('content')}}--}}
    {{--            </div>--}}
    {{--        @endif--}}

    @if($errors->any())
        @foreach($errors->all() as $err)
            {{$err}}
        @endforeach
    @endif


    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="col-4 mt-2 ml-2">
            <input type="hidden" class="form-control col-sm" aria-label="Sizing example input"
                   value ="{{$post->id}}"
                   aria-describedby="inputGroup-sizing-default" name="id">
        </div>
    </form>
</div>
</body>
</html>