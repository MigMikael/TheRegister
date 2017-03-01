@extends('template')

@section('content')
    <script>
        function printPage() {
            window.print();
        }
    </script>

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
                                <h3><b>{{ $participant->firstName }} {{ $participant->lastName }}</b></h3><br>
                                <h3>{{ $participant->category }}</h3><br>

                                <img class="thumbnail" src="{{ url('participant/qrcode/'.$participant->id) }}" style="width:100%; height:100%">
                            </div>
                            <div class="panel-footer">
                                <button onclick="printPage()" class="btn btn-success btn-lg">
                                    Print
                                    <span class="glyphicon glyphicon-print"></span>
                                </button>

                                <a href="{{ url('participant/'.$participant->id.'/edit') }}" class="btn btn-warning btn-lg">
                                    Edit
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="panel-footer">
                <a href="" class="btn btn-success btn-lg">Print All</a>
            </div>
        </div>
    </div>
@stop