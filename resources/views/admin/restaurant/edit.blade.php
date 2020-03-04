@extends('layouts.admin')

@section('content')

<form class="container form-horizontal" method="post" action="{{ route('admin.restaurant.update', $restaurant->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group row">
        <label for="first_name" class="col-md-2 col-form-label text-md-right">Name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="name" value={{ $restaurant->name }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-md-2 col-form-label text-md-right">Description</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="description" value={{ $restaurant->description }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label text-md-right">Address</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="address" value={{ $restaurant->address }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label text-md-right">City</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="city" value={{ $restaurant->city }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label text-md-right">Zipcode</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="zipcode" value={{ $restaurant->Zipcode }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label text-md-right">Phone number</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="phone" value={{ $restaurant->phone }} />
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">Update</button>
            </div>
        </div>
    </div>
</form>

@endsection