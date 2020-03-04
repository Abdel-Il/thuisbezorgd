@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Order First name</th>
                        <th scope="col">Order Last name</th>
                        <th scope="col">Order City</th>
                        <th scope="col">Order Price</th>
                        <th scope="col">Order Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->first_name }}</td>
                        <td>{{ $order->last_name }}</td>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection