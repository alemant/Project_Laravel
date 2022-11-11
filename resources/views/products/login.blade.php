@extends('layouts.main')
@section('contenido')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="number" class="form-control" name="price">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="btn btn-danger" href="{{route('products.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection