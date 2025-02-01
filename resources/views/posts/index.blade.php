@extends('layouts.appp')

@section('content')
    <table class="table">
        <thead>
        <th>id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Comment</th>
        <th>Likes</th>
        <th>Publication date</th>

        </thead>

        <tbody class="table-border-bottom-0">
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('post.show',$post)}}">{{$post->title}}</a></td>
                <td>{{$post->category->name}}</td>
                <td>{{count($post->comments)}}</td>
<td>{{count($post->like)}}</td>
                <td>{{$post->publication_at}}</td>
                <td>

                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form action="{{route('post.destroy',$post)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>

                            <a class="btn btn-outline-primary" href="{{route('post.edit',$post)}}">edit</a>

                        </div>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
