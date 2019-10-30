@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consumable as $con)
                    <tr>
                        <th scope="row">{{ $con->id }}</th>
                        <td>{{ $con->title }}</td>
                        <td>€ {{ $con->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Restaurant Id</th>
                        <th scope="col">Restaurant name</th>
                        <th scope="col">Restaurant email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurant as $res)
                    <tr>
                        <th scope="row">{{ $res->id }}</th>
                        <td>{{ $res->name }}</td>
                        <td>{{ $res->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection