@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Updata product</h1></div>
                    <div class="container">
                    <form action="{{route('product-updata-submit',$data->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter provider</label>
                            <input type="text" name="provider" value="{{$data->provider}}" placeholder="Enter provider" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Enter brand</label>
                            <input type="text" name="brand" value="{{$data->brand}}" placeholder="Enter brand" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Enter location</label>
                            <input type="text" name="location" value="{{$data->location}}" placeholder="Enter location" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Enter cpu</label>
                            <input type="text" name="cpu" value="{{$data->cpu}}" placeholder="Enter CPU" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Enter drive</label>
                            <input type="text" name="drive" value="{{$data->drive}}" placeholder="Enter drive" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Enter price</label>
                            <input type="text" name="price" value="{{$data->price}}" placeholder="Enter price" id="name" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Updata</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
