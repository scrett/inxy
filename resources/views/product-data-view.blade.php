@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                        <table class="table table-bordered">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Provider</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Location</th>
                                <th scope="col">CPU</th>
                                <th scope="col">Drive</th>
                                <th scope="col">Price</th>
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
                            </tr>
                            @endforeach
                        </table>
                        {{ $data->links() }}

        </div>
    </div>
@endsection
