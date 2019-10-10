@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('user.update', $restaurant->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Restaurant:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="name" value={{ $restaurant->name }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Restaurant description:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="address" value={{ $restaurant->address }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Restaurant city:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="city" value={{ $restaurant->city }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Restaurant zipcode:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="zipcode" value={{ $restaurant->zipcode }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Restaurant phone:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="phone" value={{ $restaurant->phone }} />
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">
                    Edit
                </button>
            </div>
        </div>
    </div>
</form>

@endsection