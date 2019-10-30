@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <h1>Checkout</h1>
            <h4>Your Total: € {{ $total }}</h4>

            <form class="container form-horizontal" action="{{ route('checkout') }}" method="" id="checkout-form">
                @csrf
                @method('GET')

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">First Name</label>
                    <div class="col-md-8">
                        <input type="text" id="first_name" class="form-control" required name="first_name" {{-- value="{{ $user ?? ''->first_name }}" --}}>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Last Name</label>
                    <div class="col-md-8">
                        <input type="text" id="last_name" class="form-control" required name="last_name" {{-- value="{{ $user ?? ''->last_name }}" --}}>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Email</label>
                    <div class="col-md-8">
                        <input type="text" id="email" class="form-control" required name="email" {{-- value="{{ $user ?? ''->email }}" --}}>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">City</label>
                    <div class="col-md-8">
                        <input type="text" id="city" class="form-control" required name="city" {{-- value="{{ $user ?? ''->city }}" --}}>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Address</label>
                    <div class="col-md-8">
                        <input type="text" id="address" class="form-control" required name="address" {{-- value="{{ $user ?? ''->address }}" --}}>
                    </div>
                </div>

                <input type="hidden" id="price" {{-- value="{{ $total }}" c --}}lass="form-control" required name="price">
                <hr>
                {{-- </div> --}}
                <button type="submit" class="btn btn-success">Buy now</button>
            </form>
        </div>
    </div>
</div>
@endsection