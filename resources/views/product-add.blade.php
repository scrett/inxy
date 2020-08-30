@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Add product</h1></div>
                    <div class="container">
                    <form action="{{route('product-add-submit')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="provider">Enter provider</label>
                            <input type="text" name="provider" placeholder="Enter provider" id="provider" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="brand">Enter brand</label>
                            <input type="text" name="brand" placeholder="Enter brand" id="brand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="location">Enter location</label>
                            <input type="text" name="location" placeholder="Enter location" id="location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cpu">Enter cpu</label>
                            <input type="text" name="cpu" placeholder="Enter cpu" id="cpu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="drive">Enter drive</label>
                            <input type="text" name="drive" placeholder="Enter drive" id="drive" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Enter price</label>
                            <input type="text" name="price" placeholder="Enter price" id="price" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
