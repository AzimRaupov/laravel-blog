@extends('layouts.appp')

@section('content')
    <form action="{{route('post.store')}}"  method="post" style="width: 400px">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title"> <br>
        <lable for="text">Text</lable>
        <textarea name="text" id="text" cols="10" rows="5" class="form-control"></textarea>
        <label for="category">Category</label>
        <select name="category_id" id="" class="form-select" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
