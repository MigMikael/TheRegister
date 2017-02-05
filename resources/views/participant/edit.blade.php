@extends('template')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="text-align: center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>แก้ไขข้อมูล</h2>
                </div>
                {!! Form::model($participant, ['url' => 'participant/'.$participant->id,
                    'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                <div class="panel-body">
                    @include('participant._form')
                </div>
                <div class="panel-footer">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
@stop