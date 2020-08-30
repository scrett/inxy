@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$data->provider}}</h1></div>
                    <div class="container">
                    <div class="form-group">
                        <p>Brand: {{$data->brand}}</p>
                    </div>
                    <div class="form-group">
                        <p>Location: {{$data->location}}</p>
                    </div>
                    <div class="form-group">
                        <p>CPU: {{$data->cpu}}</p>
                    </div>
                    <div class="form-group">
                        <p>Drive: {{$data->drive}}</p>
                    </div>
                    <div class="form-group">
                        <p>Price: {{$data->price}}</p>
                    </div>
                    <a href=" {{route('product-updata', $data->id)}}"><button class="btn btn-primary">Updata</button></a>
                    <a href=" {{route('product-delete', $data->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
