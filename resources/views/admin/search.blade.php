@extends('template')

@section('content')
    <div class="row">
        <div class="card-header jumbotron col-md-10 col-md-offset-1 col-xs-offset-0">
            <h1><b>ค้นหา</b></h1>
            {!! Form::open(['url' => 'admin/participant/search', 'class' => 'form-horizontal']) !!}
            <div class="col-md-4 form-group">
                <label for="search_by">ค้นหาโดย</label>
                {!! Form::select('search_by', $search_option, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-6 form-group">
                {!! Form::text('query', null, ['class' => 'form-control input-lg']) !!}
            </div>
            <div class="col-md-2 form-group">
                {!! Form::button('ค้นหา <span class="glyphicon glyphicon-chevron-right"></span>',
                                             ['class'=>'btn btn-success btn-lg', 'type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row col-md-10 col-md-offset-1 col-xs-offset-0">
        @if(isset($participants))
            @foreach($participants as $participant)
                @include('card', $participant)
            @endforeach
        @endif
    </div>
@stop