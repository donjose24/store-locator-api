@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Stores</div>
                    <div class="panel-body">
                        @include('layouts.notification')
                        <table id="table">
                            <thead>
                                <th>Store ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Views</th>
                            </thead>
                            <tbody>
                                @foreach($stores as $store)
                                    <tr>
                                        <td>{{$store->id}}</td>
                                        <td>{{$store->name}}</td>
                                        <td>{{$store->address}}</td>
                                        <td>{{date_format($store->created_at,'Y/m/d')}}</td>
                                        <td>{{$store->views}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Store</div>
                    <div class="panel-body">
                        {{Form::open(['url' => '/store', 'method' => 'POST'])}}
                        {{Form::label('name', "Name")}}
                        <br>
                        {{Form::text('name')}}
                        <br>

                        {{Form::label('address', "Address")}}
                        <br>
                        {{Form::textarea('address')}}
                        <br>

                        {{Form::label('lat', "Latitude")}}
                        <br>
                        {{Form::number('lat')}}
                        <br>

                        {{Form::label('long', "Longitude")}}
                        <br>
                        {{Form::text('long')}}
                        <br>
                        <br>

                        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>

        </div>
    @endsection
