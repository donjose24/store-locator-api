@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Stores</div>
                <div class="panel-body">
                    <table id="table">
                        <thead>
                            <th>Store ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Created At</th>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                                <tr>
                                    <td>{{$store->id}}</td>
                                    <td>{{$store->name}}</td>
                                    <td>{{$store->address}}</td>
                                    <td>{{date_format($store->created_at,'Y/m/d')}}</td>
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