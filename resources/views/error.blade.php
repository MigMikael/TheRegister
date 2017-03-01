@extends('template')

@section('content')
    <div class="jumbotron card-header col-md-10 col-md-offset-1 col-xs-offset-0">
        <h1>{{ $error_message['header'] }}</h1>
        <h3>{{ $error_message['content'] }}</h3>
        <hr>
        <a href="{{ url()->previous() }}" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-left"></span>Back
        </a>
    </div>
@stop