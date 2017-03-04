@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($participants as $participant)
                <div class="col-md-10 col-md-offset-1 col-xs-offset-0" style="text-align: left">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Person {{ $loop->iteration }}</h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4 col-xs-12">
                                <img class="thumbnail" src="{{ url('participant/qrcode/'.$participant->token) }}" style="width:100%; height:100%">
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <div class="col-md-6">
                                    <h3><b>FirstName :</b> {{ $participant->firstName }}</h3>
                                    <h3><b>LastName : </b>{{ $participant->lastName }}</h3>
                                    <h3><b>Category : </b>{{ $participant->category }}</h3>
                                    <br>
                                    <h4>PhoneNumber : {{ $participant->phoneNumber }}</h4>
                                    <h4>Email : {{ $participant->email }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <h3>Attend : {{ $participant->is_attend }}</h3>
                                    <h4>Attend Time : {{ $participant->attend_time }}</h4>
                                    <br>
                                    <h3>Gain : {{ $participant->is_gain }}</h3>
                                    <h4>Gain Time : {{ $participant->gain_time }}</h4>
                                </div>
                                <hr>
                                <br>
                                <div class="col-md-12">
                                    <h4>Address : {{ $participant->address }}</h4>
                                </div>
                            </div>
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
    </div>
@stop