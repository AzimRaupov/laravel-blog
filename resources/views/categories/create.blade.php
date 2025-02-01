@extends('layouts.appp')

@section('content')
    <form method="POST" action="{{route('category.store')}}">
        @csrf
        <input type="text" name="name" class="form-control"> <br>
        <input type="submit" value="create" class="btn btn-primary">

    </form>
@endsection
