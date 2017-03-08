@extends('template')

@section('content')
    <div class="row">
        <div class="jumbotron card-header col-md-10 col-md-offset-1 col-xs-offset-0">
            @if(Request::path() == 'admin/register/entry')
                <h1>ลงทะเบียนเข้าร่วมงานด้วยเลขลำดับที่</h1>
            @elseif(Request::path() == 'admin/gain/entry')
                <h1>ลงทะเบียนรับของด้วยลำดับที่</h1>
            @endif
            <br>
            <br>
            <h3>กรุณากรอกลำดับที่</h3>

            @if(Request::path() == 'register/entry')
                {!! Form::open(['url' => 'participant/register/order_id', 'class' => 'form-horizontal']) !!}
            @else
                {!! Form::open(['url' => 'participant/gain/order_id', 'class' => 'form-horizontal']) !!}
            @endif
            <div class="row">
                <div class="col-xs-2 col-xs-offset-2 col-md-1 col-md-offset-4">
                    <div class="form-group">
                        {!! Form::number('order_id_1', null, ['class' => 'form-control input-lg', 'maxlength' => '1']) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-md-1">
                    <div class="form-group">
                        {!! Form::number('order_id_2', null, ['class' => 'form-control input-lg', 'maxlength' => '1']) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-md-1">
                    <div class="form-group">
                        {!! Form::number('order_id_3', null, ['class' => 'form-control input-lg', 'maxlength' => '1']) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-md-1">
                    <div class="form-group">
                        {!! Form::number('order_id_4', null, ['class' => 'form-control input-lg', 'maxlength' => '1']) !!}
                    </div>
                </div>
            </div>
            {!! Form::button('ต่อไป <span class="glyphicon glyphicon-chevron-right"></span>',
                                                    ['class'=>'btn btn-success btn-lg', 'type'=>'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop