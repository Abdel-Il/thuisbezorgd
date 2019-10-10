@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <a href="{{ route('restaurant.create') }}">Start nu</a>
                    <a href="{{ route('restaurant.index') }}">Kijk hier</a>

                    @foreach ($restaurant as $res)
                        {{-- <h5 class="card-title"></h5> --}}
                        <br>
                        <a href="{{ route('restaurant.index', $res->id) }}">{{ $res->name }}</a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
