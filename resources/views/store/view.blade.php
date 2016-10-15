@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Store Details</div>
                    <div class="panel-body">
                        @include('layouts.notification')
                        {{Form::model($store, ['url' => '/stores', 'method' => 'PUT'])}}
                        {{Form::label('name', "Name")}}
                        <br>
                        {{Form::text('name')}}
                        <br>

                        {{Form::label('address', "Address")}}
                        <br>
                        {{Form::textarea('address')}}
                        <br>

                        {{Form::label('lat', "lat")}}
                        <br>
                        {{Form::number('lat')}}
                        <br>

                        {{Form::label('long', "long")}}
                        <br>
                        {{Form::text('long')}}
                        <br>
                        {!! link_to('/store', 'Back') !!}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicines</div>
                    <div class="panel-body">
                        <table id="table">
                            <thead>
                                <th>Medicine ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Views</th>
                                <th>Remove</th>
                            </thead>
                            <tbody>
                                @foreach($store->products()->get() as $medicine)
                                    <tr>
                                        <td>{{$medicine->id}}</td>
                                        <td>{{$medicine->name}}</td>
                                        <td>{{$medicine->description}}</td>
                                        <td>{{date_format($medicine->created_at,'Y/m/d')}}</td>
                                        <td>{{$medicine->views}}</td>
                                        <td><a href="/store/product/remove/{{$medicine->id}}/{{$store->id}}" class="btn btn-danger">Delete</a></td>
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
                    <div class="panel-heading">Add Medicines</div>
                    <div class="panel-body">
                        <table id="table">
                            <thead>
                                <th>Medicine ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Add</th>
                            </thead>
                            <tbody>
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{$medicine->id}}</td>
                                        <td>{{$medicine->name}}</td>
                                        <td>{{$medicine->description}}</td>
                                        <td><a href="/store/product/add/{{$medicine->id}}/{{$store->id}}" class="btn btn-success">Add</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
