@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0" style="text-align: center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($url == 'store_step_1')
                        <h2>กรอกข้อมูลของบุคคลที่หนึ่ง</h2>
                    @else
                        <h2>กรอกข้อมูลของบุคคลที่สอง</h2>
                        <a href="{{ url('step_3/'.$order_id) }}" class="btn btn-default btn-lg">
                            Skip
                            <span class="glyphicon glyphicon-share"></span>
                        </a>
                    @endif
                </div>
                {!! Form::open(['url' => $url, 'class' => 'form-horizontal']) !!}
                <div class="panel-body">
                    @include('participant._form')
                </div>
                <div class="panel-footer">
                    {!! Form::button('Next <span class="glyphicon glyphicon-chevron-right"></span>',['class'=>'btn btn-success btn-lg', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop