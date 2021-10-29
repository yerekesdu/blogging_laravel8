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

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Created at</th>
            <th scope="col">Details</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->created_at}}</td>
                    <td><a class="btn btn-primary" href="{{route('categories.show', $cat->id)}}">Details</a></td>
                    <td><a class="btn btn-secondary" href="{{route('categories.edit', $cat->id)}}">Edit</a></td>
                    <form action="{{route('categories.destroy', $cat->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td><button class="btn btn-danger">Delete</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-secondary" href="{{route('categories.create')}}">Create category</a>

</div>
</body>
</html>
