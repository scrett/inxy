@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card-header"><h1>Admin!</h1></div>
                    <form enctype="multipart/form-data" method="post" action="{{route('product-load')}}">
                        @csrf
                            <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" data-show-preview="false" id="upload" type="file" name="upload" accept=".json">
                                <label class="custom-file-label" for="inputGroupFile04">Choose Json file</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" >Import</button>
                            </div>
                        </div>
                    </form>
                    <br>
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Provider</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Location</th>
                                <th scope="col">CPU</th>
                                <th scope="col">Drive</th>
                                <th scope="col">Price</th>
                                <th scope="col"><a href=" {{route('product-add')}}"><button class="btn btn-primary">&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;</button></a></th>
                            </tr>
                            @foreach($data as $el)
                            <tr>
                                <td>{{$el->id}}</td>
                                <td>{{$el->provider}}</td>
                                <td>{{$el->brand}}</td>
                                <td>{{$el->location}}</td>
                                <td>{{$el->cpu}}</td>
                                <td>{{$el->drive}}</td>
                                <td>{{$el->price}}</td>
                                <td><a href=" {{route('product-data-one', $el->id)}}"><button class="btn btn-primary">Detailed</button></a></td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
