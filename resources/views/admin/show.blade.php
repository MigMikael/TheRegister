@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($participants as $participant)
                <div class="col-md-12" style="text-align: left">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">
                            <h2>Person {{ $loop->iteration }}</h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4 col-xs-12">
                                <img class="thumbnail" src="{{ url('participant/qrcode/'.$participant->id) }}" style="width:100%; height:100%">
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <div class="col-md-6">
                                    <h4><b>FirstName :</b> {{ $participant->firstName }}</h4>
                                    <h4><b>LastName : </b>{{ $participant->lastName }}</h4>
                                    <h4><b>Category : </b>{{ $participant->category }}</h4>
                                    <p>PhoneNumber : {{ $participant->phoneNumber }}</p>
                                    <p>Email : {{ $participant->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Attend : {{ $participant->is_attend }}</h4>
                                    <p>Attend Time : {{ $participant->attend_time }}</p>
                                    <h4>Gain : {{ $participant->is_gain }}</h4>
                                    <p>Gain Time : {{ $participant->gain_time }}</p>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <p>Address : {{ $participant->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{ url('participant/'.$participant->id.'/edit') }}"
                               class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop