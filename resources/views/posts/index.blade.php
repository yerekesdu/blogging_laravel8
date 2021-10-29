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
                   <th scope="col">Title</th>
                   <th scope="col">Category</th>
                   <th scope="col">Content</th>
                   <th scope="col">Created at</th>
                   <th scope="col">Details</th>
                   <th scope="col">Edit</th>
                   <th scope="col">Delete</th>
               </tr>
               </thead>
               <tbody>
               @foreach($posts as $post)
                   <tr>
                       <td>{{$post->id}}</td>
                       <td>{{$post->title}}</td>
                       <td>{{$post->category->name}}</td>
                       <td>{{$post->content}}</td>
                       <td>{{$post->created_at}}</td>
                       <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-secondary">Details</a></td>
                       <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                       <td><form action="{{route('posts.destroy', $post->id)}}" method="POST" onSubmit="return beforeDelete()">
                               @csrf
                               @method('DELETE')
                               <button class="btn btn-danger btn-sm">
                                   DELETE
                               </button>
                           </form></td>
                   </tr>
               @endforeach
               </tbody>
           </table>

       <a href="{{route('posts.create')}}" class="btn btn-primary ms-5 mt-2">Create Post</a>
   </div>
<script>
    function beforeDelete(){
        return confirm('Are you really want to delete');
    }
</script>
</body>
</html>
