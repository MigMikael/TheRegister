@extends('template')

@section('content')
    <div class="jumbotron" style="text-align: center">
        <h1>{{ $error_message['header'] }}</h1>
        <h3>{{ $error_message['content'] }}</h3>
        <hr>
        <a href="{{ url()->previous() }}" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-left"></span>Back
        </a>
    </div>
@stop