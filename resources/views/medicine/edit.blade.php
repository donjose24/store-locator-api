@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Medicine Details</div>
                    <div class="panel-body">
                        {{Form::model($medicine, ['url' => '/product', 'method' => 'PUT'])}}
                        {{Form::label('name', "Name")}}
                        <br>
                        {{Form::text('name')}}
                        <br>

                        {{Form::label('description', "Description")}}
                        <br>
                        {{Form::textarea('description')}}
                        <br>

                        {{Form::label('long', "Category")}}
                        <br>
                        {{Form::text('category')}}
                        <br>

                        {{Form::label('dosage', "Dosage")}}
                        <br>
                        {{Form::text('dosage')}}
                        <br>
                        <br>
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::hidden('id') }}
                        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                        {!! link_to('/medicines', 'Back') !!}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
