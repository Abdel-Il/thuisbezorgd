@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <a class="nav-link btn btn-success" href="{{ route('admin.restaurant.create', ['id' => Auth::id()]) }}">
                Restaurant maken
            </a>
        </div>
    </div>
</div>

@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
       
@endif

<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Restaurant Id</th>
                        <th scope="col">Restaurant Name</th>
                        <th scope="col">Restaurant Address</th>
                        <th scope="col">Restaurant City</th>
                        <th scope="col">Restaurant Phone</th>
                        <th scope="col">Restaurant Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurant as $res)
                    <tr>
                        <td>{{ $res->id }}</td>
                        <td>{{ $res->name }}</td>
                        <td>{{ $res->address }}</td>
                        <td>{{ $res->city }}</td>
                        <td>{{ $res->phone }}</td>
                        <td><a href="{{ route('admin.restaurant.edit',$res->id)}}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ route('admin.consumable.index',$res->id)}}" class="btn btn-primary">Consumables</a></td>
                        <td>
                            <form action="{{ route('admin.restaurant.destroy', $res->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection