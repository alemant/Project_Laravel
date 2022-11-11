@extends('layouts.main')
@section('contenido')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create product
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" href="{{route('products.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection