@extends('template')

@section('content')
    <div class="row col-md-10 col-md-offset-1 col-xs-offset-0">
        @foreach($participants as $participant)
            @include('card', $participant)
        @endforeach
    </div>
@stop