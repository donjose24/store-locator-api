@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Store Details</div>
                    <div class="panel-body">
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
                        {{ Form::hidden('id') }}
                        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                        {!! link_to('/store', 'Back') !!}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
