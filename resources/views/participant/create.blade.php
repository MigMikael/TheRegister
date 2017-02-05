@extends('template')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="text-align: center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($url == 'store_step_1')
                        <h2>กรอกข้อมูลของบุคคลที่หนึ่ง</h2>
                    @else
                        <h2>กรอกข้อมูลของบุคคลที่สอง</h2>
                    @endif
                </div>
                {!! Form::open(['url' => $url, 'class' => 'form-horizontal']) !!}
                <div class="panel-body">
                    @include('participant._form')
                </div>
                <div class="panel-footer">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    @if($url == 'store_step_2')
                        <a href="{{ url('step_3/'.$order_id) }}" class="btn btn-primary">Skip</a>
                    @endif
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
@stop