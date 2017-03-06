@extends('template')

@section('content')
    @include('participant._progress')
    <br>
    <div class="row col-md-10 col-md-offset-1 col-xs-offset-0">
        <div class="jumbotron panel-heading">
            <h1>ลงทะเบียนสำเร็จ</h1>
        </div>
    </div>
    <div class="row col-md-10 col-md-offset-1 col-xs-offset-0">
        @foreach($participants as $participant)
            @include('card', $participant)
        @endforeach
    </div>
@stop