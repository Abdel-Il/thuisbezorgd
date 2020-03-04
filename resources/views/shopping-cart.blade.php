@extends('layouts.app')

@section('content')
@if(Session::has('cart'))
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Quantity</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consumables as $con)
                    <tr>
                        <td>{{ $con['qty'] }}</td>
                        <td>{{ $con['item']['title'] }}</td>

                        <td class="label label-success">€ {{ $con['price'] }}</td>
                        <td><a class="btn btn-primary" href="{{ route('reduceByOne', ['id' => $con['item']['id']]) }}">Reduce by 1</a></td>
                        <td><a class="btn btn-primary" href="{{ route('removeItem', ['id' => $con['item']['id']]) }}">Remove</a></td>
                    <tr>

                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: € {{ $totalPrice }}</strong>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <a href="{{ url('checkout') }}" type="button" class="btn btn-success">Checkout</a>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
</div>
@endif
@endsection