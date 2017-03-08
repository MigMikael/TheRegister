<!doctype html>
<html lang="en">
<head>
    @include('_head')
    {{--<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">--}}

    @if( strpos(Request::url(), 'localhost') == true )
    <script src="{{ URL::asset('library/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ URL::asset('library/jsqrcode-combined.min.js') }}"></script>
    <script src="{{ URL::asset('library/html5-qrcode.min.js') }}"></script>
    <script src="{{ URL::asset('library/main.js') }}"></script>
    @else
    <script src="https://the-register.herokuapp.com/library/jquery-1.9.1.min.js"></script>
    <script src="https://the-register.herokuapp.com/library/jsqrcode-combined.min.js"></script>
    <script src="https://the-register.herokuapp.com/library/html5-qrcode.min.js"></script>
    <script src="https://the-register.herokuapp.com/library/main.js"></script>
    @endif

    <title>Scan Qr Code</title>
</head>
<body>
    @include('_navbar')
    <div class="container-fluid" style="margin-top: 70px">
        <div class="row col-md-10 col-md-offset-1 col-xs-offset-0">
            <div class="panel">
                <div class="panel-heading">
                    @if(Request::path() == 'admin/register/scan')
                        <h1>ลงทะเบียนเข้าร่วมงานด้วยรหัสคิวอาร์</h1>
                    @elseif(Request::path() == 'admin/gain/scan')
                        <h1>ลงทะเบียนรับของด้วยรหัสคิวอาร์</h1>
                    @endif
                </div>
                <div class="panel-body">
                    <div class="col-md-6 col-xs-12" id="reader" style="height:400px;border-style: solid"></div>
                    <br>
                    <div class="col-md-6 col-xs-12" style="text-align: center">
                        <h1><span id="read" class="center">กำลังสแกน...</span></h1>
                        <br>
                        {{--<h4 class="center">Read Error (Debug only)</h4>
                        <span class="center">Will constantly show a message, can be ignored</span>--}}
                        <span id="read_error" class="center"></span>
                        <br>
                        {{--<h4 class="center">Video Error</h4>--}}
                        <span id="vid_error" class="center"></span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        @if(Request::path() == 'admin/register/scan')
                        {!! Form::open(['url' => 'admin/participant/register/qrcode']) !!}
                        {{ Form::hidden('token', 'No Data', ['class' => 'form-control', 'id' => 'user_token1']) }}
                        {{ Form::submit('ลงทะเบียน', ['class' => 'btn btn-primary btn-block btn-lg']) }}
                        {!! Form::close() !!}
                        @elseif(Request::path() == 'admin/gain/scan')
                        {!! Form::open(['url' => 'admin/participant/gain/qrcode']) !!}
                        {{ Form::hidden('token', 'No Data', ['class' => 'form-control', 'id' => 'user_token2']) }}
                        {{ Form::submit('รับองค์พระพิฆเนศวร' , ['class' => 'btn btn-danger btn-block btn-lg']) }}
                        {!! Form::close() !!}
                        @endif
                    </div>
                </div>
                {{--<div class="panel-footer">
                    dfka;flkda;lsfk
                </div>--}}
            </div>
        </div>
    </div>
</body>
</html>