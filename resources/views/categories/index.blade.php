@extends('layouts.appp')

@section('content')
    <table class="table">
        <thead>
        <th>id</th>
        <th>Name</th>

        </thead>

    <tbody class="table-border-bottom-0">
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>

                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{route('category.destroy',$category)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>

                        <a class="btn btn-outline-primary" href="{{route('category.edit',$category)}}">edit</a>

                    </div>
                </div>
            </td>
        </tr>

    @endforeach
    </tbody>
    </table>
@endsection
