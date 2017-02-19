<!doctype html>
<html lang="en">
<head>
    @include('_head')
    {{--<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">--}}
    <script src="{{ URL::asset('library/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ URL::asset('library/jsqrcode-combined.min.js') }}"></script>
    <script src="{{ URL::asset('library/html5-qrcode.min.js') }}"></script>
    <script src="{{ URL::asset('library/main.js') }}"></script>
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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4"
                 style="border-style: solid; align-content: center; height: auto; width: auto;text-align: center">
                <h3>Scan Qr Code</h3>
                <div class="center" id="reader" style="width:375px;height:450px"></div>
                <br>

                <h4 class="center">Result</h4>
                <h1><span id="read" class="center">No Data</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4">
                {{--<h4 class="center">Read Error (Debug only)</h4>
                <span class="center">Will constantly show a message, can be ignored</span>--}}
                <span id="read_error" class="center"></span>

                <br>
                {{--<h4 class="center">Video Error</h4>--}}
                <span id="vid_error" class="center"></span>

                {!! Form::open(['url' => 'participant/register', 'class' => 'form-control']) !!}
                    {{ Form::hidden('token', 'No Data', ['class' => 'form-control', 'id' => 'user_token1']) }}
                    {{ Form::submit('Register') }}
                {!! Form::close() !!}

                {!! Form::open(['url' => 'participant/gain', 'class' => 'form-control']) !!}
                    {{ Form::hidden('token', 'No Data', ['class' => 'form-control', 'id' => 'user_token2']) }}
                    {{ Form::submit('Gain') }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
</html>