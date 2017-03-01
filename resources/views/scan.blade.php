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
    <script>
        /*window.onload = function () {
            var sendButton = document.getElementById('send-button');
            sendButton.onclick = function () {
                var tokenText = document.getElementById('read').innerHTML;
                console.log(tokenText);
                document.getElementById('user_token').value = tokenText;
            }
        }*/
    </script>
</head>
<body>
    @include('_navbar')
    <div class="container-fluid" style="margin-top: 80px">
        <div class="row col-md-6 col-md-offset-3 col-xs-offset-0">
            <div class="panel">
                <div class="panel-heading">
                    <h1>Scan QR Code</h1>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-md-12" id="reader" style="width:100%; height:300px;border-style: solid"></div>
                    <br>
                    <div class="col-xs-12 col-md-12" style="text-align: center">
                        <h1><span id="read" class="center">Scanning...</span></h1>
                        <br>
                        {{--<h4 class="center">Read Error (Debug only)</h4>
                        <span class="center">Will constantly show a message, can be ignored</span>--}}
                        <span id="read_error" class="center"></span>
                        <br>
                        {{--<h4 class="center">Video Error</h4>--}}
                        <span id="vid_error" class="center"></span>
                        <br>
                    </div>
                </div>
                <div class="panel-footer">
                    <br>
                    {!! Form::open(['url' => 'participant/register']) !!}
                    {{ Form::hidden('token', 'No Data', ['class' => 'form-control', 'id' => 'user_token1']) }}
                    {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block btn-lg']) }}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['url' => 'participant/gain']) !!}
                    {{ Form::hidden('token', 'No Data', ['class' => 'form-control', 'id' => 'user_token2']) }}
                    {{ Form::submit('Gain' , ['class' => 'btn btn-danger btn-block btn-lg']) }}
                    {!! Form::close() !!}
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>