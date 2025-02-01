@extends('layouts.appp')

@section('content')
    <form action="{{route('category.update',$category)}}" method="post">
        @csrf
        @method('put')

        <input type="text" name="name" id="" class="form-control" value="{{$category->name}}"> <br>

        <input type="submit" value="update" class="btn btn-primary">
    </form>
@endsection
