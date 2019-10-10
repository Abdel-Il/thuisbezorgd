@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @foreach ($restaurant as $res)
                        <h3 class="card-title m-0">{{ $res->name }}</h3>
                    @endforeach
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>Hoofdgerechten</h5>
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                    <h5>Bijgerechten</h5>
                    <p>4</p>
                    <p>5</p>
                    <p>6</p>
                    <h5>Dranken</h5>
                    <p>7</p>
                    <p>8</p>
                    <p>9</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
