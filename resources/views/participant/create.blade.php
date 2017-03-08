@extends('template')

@section('content')
    @include('participant._progress')
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-offset-0" style="text-align: center">
            <div class="panel">
                <div class="panel-heading">
                    @if($url == 'store_step_1')
                        <h1>ขั้นตอนที่ 1</h1>
                        <h4>กรอกข้อมูลของบุคคลที่หนึ่ง</h4>
                    @else
                        <h1>ขั้นตอนที่ 2</h1>
                        <h4>กรอกข้อมูลของบุคคลที่สอง</h4>
                        <a href="{{ url('finish/'.$order_id.'/'.$couple_token) }}" class="btn btn-default btn-lg">
                            ข้าม
                            <span class="glyphicon glyphicon-share"></span>
                        </a>
                    @endif
                </div>
                {!! Form::open(['url' => $url, 'class' => 'form-horizontal']) !!}
                <div class="panel-body">
                    @include('participant._form')
                </div>
                <div class="panel-footer">
                    {!! Form::button('ต่อไป <span class="glyphicon glyphicon-chevron-right"></span>',['class'=>'btn btn-success btn-lg', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop