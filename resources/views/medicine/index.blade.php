@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicines</div>
                    <div class="panel-body">
                        @include('layouts.notification')
                        <table id="table">
                            <thead>
                                <th>Medicine ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Views</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{$medicine->id}}</td>
                                        <td>{{$medicine->name}}</td>
                                        <td>{{$medicine->description}}</td>
                                        <td>{{date_format($medicine->created_at,'Y/m/d')}}</td>
                                        <td>{{$medicine->views}}</td>
                                        <td>{!! link_to ("/product/edit/$medicine->id", "Edit", ['class' => 'btn btn-primary'])!!}</td>
                                        <td><a href="/product/delete/{{$medicine->id}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Medicine</div>
                        <div class="panel-body">
                            {{Form::open(['url' => '/product', 'method' => 'POST'])}}
                                {{Form::label('name', "Name")}}
                                <br>
                                {{Form::text('name')}}
                                <br>

                                {{Form::label('description', "Description")}}
                                <br>
                                {{Form::textarea('description')}}
                                <br>

                                {{Form::label('price', "Price")}}
                                <br>
                                {{Form::number('price')}}
                                <br>

                                {{Form::label('category', "Category")}}
                                <br>
                                {{Form::text('category')}}
                                <br>

                                {{Form::label('dosage', "Dosage")}}
                                <br>
                                {{Form::text('dosage')}}
                                <br>
                                <br>
                                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                            {{Form::close()}}
                        </div>
                </div>
            </div>
        </div>
    @endsection
