@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-offset-0">
            <div class="panel">
                <div class="panel-heading">
                    <h2>แก้ไขข้อมูล</h2>
                </div>
                {!! Form::model($participant, ['url' => 'participant/'.$participant->id,
                    'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                <div class="panel-body">
                    @include('participant._form')
                </div>
                <div class="panel-footer">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success btn-lg']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop