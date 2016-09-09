@extends('layouts.app')

@section('content')
<div class="container spark-screen">
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
                        </thead>
                        <tbody>
                            @foreach($medicines as $medicine)
                            <tr>
                                <td>{{$medicine->id}}</td>
                                <td>{{$medicine->name}}</td>
                                <td>{{$medicine->description}}</td>
                                <td>{{date_format($medicine->created_at,'Y/m/d')}}</td>
                                <td>{{$medicine->views}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
