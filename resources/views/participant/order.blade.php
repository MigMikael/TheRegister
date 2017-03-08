@extends('template')

@section('content')
    <script>
        window.onload = function () {
            document.getElementById('btn-done').focus()
        }
    </script>
    <div class="jumbotron col-md-12 col-xs-12" style="text-align: center;padding-top: 0;padding-bottom: 15px">
        <div class="row">
            <h3><b>ลำดับที่</b></h3>
            @for($i = 0; $i < strlen($orderData['order_id']); $i++)
                <div class="col-md-2 col-xs-3 @if($i == 0) col-md-offset-2 col-xs-offset-0 @endif">
                    <div style="display: inline">
                        <h1 style="background: #FFFFFF;font-size: 65px;">
                            <b>{{ $orderData['order_id'][$i] }}</b>
                        </h1>
                    </div>
                </div>
            @endfor
        </div>
        <div class="row" style="align-content: center; align-items: center">
            <div class="col-md-1 col-xs-4 col-md-offset-2 col-xs-offset-0" style="display: block">
                <h3>9 นิ้ว</h3>
                <div style="border: solid #cd7f32; background: #cd7f32">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[1]))
                            <b>{{ $orderData[1]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>5 นิ้ว</h3>
                <div style="border: solid #cd7f32; background: #cd7f32">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[2]))
                            <b>{{ $orderData[2]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>3 นิ้ว</h3>
                <div style="border: solid #cd7f32; background: #cd7f32">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[3]))
                            <b>{{ $orderData[3]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <h3>ทองคำ</h3>
                <div style="border: solid #FCC200; background: #FCC200; margin-left: 25%; margin-right: 25%">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[4]))
                            <b>{{ $orderData[4]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>เงิน</h3>
                <div style="border: solid #BFC1C2; background: #BFC1C2">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[5]))
                            <b>{{ $orderData[5]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>นวโลหะ</h3>
                <div style="border: solid #A1887F; background: #A1887F">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[6]))
                            <b>{{ $orderData[6]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>ทองแดง</h3>
                <div style="border: solid #DA8A67; background: #DA8A67">
                    <h1 style="font-size: 55px">
                        @if(isset($orderData[7]))
                            <b>{{ $orderData[7]['amount'] }}</b>
                        @else
                            -
                        @endif
                    </h1>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px">
            <h3>รวมจำนวนเงิน(บาท)</h3>
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1" style="background: #FFFFFF;">
                <h1 style="font-size: 70px;display: inline">
                    <b> {{ $orderData['total_price'] }} </b>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
                <a href="{{ url('admin') }}" id="btn-done" class="btn btn-success btn-lg">เสร็จสิ้น</a>
            </div>
        </div>
    </div>
@stop