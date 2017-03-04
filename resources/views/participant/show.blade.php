@extends('template')

@section('content')
    <div class="row col-md-12">
        <div class="jumbotron panel-heading col-md-10 col-md-offset-1 col-xs-offset-0">
            <h1>ลงทะเบียนสำเร็จ</h1>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="panel card-header col-md-10 col-md-offset-1 col-xs-offset-0">
            <div class="panel-body">
                @foreach($participants as $participant)
                    <div class="col-md-6" style="text-align: center">
                        <div class="panel">
                            <div class="jumbotron panel-heading">
                                <h1><b>{{ $participant->order_id }}</b></h1>
                            </div>
                            <div class="panel-body">
                                <h1><b>{{ $participant->firstName }} {{ $participant->lastName }}</b></h1><br>
                                <h3>{{ $participant->category }}</h3><br>

                                <img class="thumbnail" src="{{ url('participant/qrcode/'.$participant->token) }}" style="width:100%; height:100%">
                            </div>
                            <div class="panel-footer">
                                <a href="{{ url('participant/'.$participant->token.'/edit') }}" class="btn btn-warning btn-lg">
                                    Edit
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="panel-footer">
                <a href="{{ url('participant/pdf/'.$participants[0]->couple_token) }}" class="btn btn-success btn-lg">
                    Print
                    <span class="glyphicon glyphicon-print"></span>
                </a>
            </div>
        </div>
    </div>
@stop