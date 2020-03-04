@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div>
                @if (Auth::id() === $restaurant->user_id)
                    <a href="{{ route('food.create', []) }}">Product toevoegen</a>
                    <a href="{{ route('restaurant.edit', $restaurant->id) }}">Restaurant wijzigen</a>
                @endif


                @foreach($restaurant->consumable as $consumable)
                    <div class="row">
                        <div class="col-4">
                            <h5 class="">{{$consumable->title}}</h5>
                            <p class="">{{$consumable->description}}</p>
                            <p class="">{{$consumable->price}} euro</p>
                            <a class="nav-link btn btn-dark" href="{{ route('cart', [ $consumable->id]) }}">Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
