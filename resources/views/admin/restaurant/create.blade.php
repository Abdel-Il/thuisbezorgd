@extends('layouts.admin')

@section('content')

<form class="container form-horizontal" method="POST" action="{{ route('admin.restaurant.store') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Description</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="description">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Address</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="address">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">City</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="city">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Zipcode</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="zipcode">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Phone number</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="phone">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">Create</button>
            </div>
        </div>
    </div>
</form>

@endsection