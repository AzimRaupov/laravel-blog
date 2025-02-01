@extends('layouts.appp')


@section('content')
    <form action="{{route('register')}}" method="post">
        @csrf
        <input type="text" name="name" class="form-control"> <br>
        <input type="text" name="email" class="form-control"> <br>
        <input type="password" name="password" class="form-control"> <br>
        <input type="password" name="password_confirmation" class="form-control"> <br>
        <input type="submit" value="register" class="btn btn-primary">

    </form>
@endsection
