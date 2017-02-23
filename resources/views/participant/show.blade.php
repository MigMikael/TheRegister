@extends('template')

@section('content')
    <script>
        function printPage() {
            window.print();
        }
    </script>
    <div class="row">
        <div class="col-md-12">
            @foreach($participants as $participant)
                <div class="col-md-6" style="text-align: center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>ลงทะเบียนสำเร็จ</h2>
                        </div>
                        <div class="panel-body">
                            <p>{{ $participant->firstName }}</p><br>
                            <p>{{ $participant->lastName }}</p><br>
                            <p>{{ $participant->category }}</p><br>

                            <img class="thumbnail" src="{{ url('participant/qrcode/'.$participant->id) }}" style="width:100%; height:100%">
                        </div>
                        <div class="panel-footer">
                            <button onclick="printPage()" class="btn btn-success btn-lg">
                                Print
                                <span class="glyphicon glyphicon-print"></span>
                            </button>

                            <a href="{{ url('participant/'.$participant->id.'/edit') }}" class="btn btn-warning">
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