@extends('layouts.app')

@section('content')

<form class="container form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('food.store') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Products name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="title">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Products description</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="description">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Products category</label>
        <div class="col-md-8">
            <select name="category_id">
                <option value="1">Hoofdgerecht</option>
                <option value="2">Bijgerecht</option>
                <option value="3">Dranken</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Products price</label>
        <div class="col-md-8">
            <input type="number" step="0.01" class="form-control" name="price">
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