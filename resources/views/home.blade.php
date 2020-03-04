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
                    <div class="">
                        <b>All restaurants</b>
                        <a class="text-right" href="{{ route('restaurant.create') }}">Start now</a> 
                    </div>

                    @foreach ($restaurant as $res)
                        {{-- <h5 class="card-title"></h5> --}}
                        <br>
                        <a href="{{ route('restaurant.show', [ $res->id]) }}">{{ $res->name }}</a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
