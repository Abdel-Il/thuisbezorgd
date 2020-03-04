    @extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <a class="nav-link btn btn-success" href="{{ route('admin.consumable.create', []) }}">
                Consumable maken
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
                        <th scope="col">Consumable Id</th>
                        <th scope="col">Consumable Title</th>
                        <th scope="col">Consumable Category Id</th>
                        <th scope="col">Consumable Description</th>
                        <th scope="col">Consumable Price</th>
                        <th scope="col">Consumable Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($consumable as $con)
                    <tr>
                        <td>{{ $con->id }}</td>
                        <td>{{ $con->title }}</td>
                        <td>{{ $con->category_id }}</td>
                        <td>{{ $con->description }}</td>
                        <td>{{ $con->price }}</td>
                        <td><a href="{{ route('admin.consumable.edit',$con->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.consumable.destroy', $con->id)}}" method="post">
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