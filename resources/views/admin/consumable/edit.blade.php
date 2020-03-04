@extends('layouts.admin')

@section('content')

<form class="container form-horizontal" method="post" action="{{ route('admin.consumable.update', $consumable->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group row">
        <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="title" value={{ $consumable->title }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="description" value={{ $consumable->description }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Products price</label>
        <div class="col-md-8">
            <input type="number" step="0.01" class="form-control" name="price" value={{ $consumable->price }}>
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