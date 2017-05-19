@extends('template')

@section('content')
    <script>
        window.onload = function () {
            document.getElementById('btn-done').focus()
        }
    </script>
    <div class="jumbotron col-md-12 col-xs-12" style="text-align: center;padding-top: 0;padding-bottom: 15px">
        <div class="row" style="margin-bottom: 1%;align-content: center; align-items: center">
            <h2>สรุปข้อมูล</h2>
            <h1><b>{{ $count }}</b> / <b>{{ $all }} = {{ round(($count/$all)*100, 2) }} %</b></h1>
        </div>
        <div class="row" style="margin-bottom: 1%;align-content: center; align-items: center">
            <div class="col-md-4 col-xs-4 col-md-offset-0 col-xs-offset-0" style="display: block;padding: 0">
                <h3 style="border: #cd7f32 solid; margin: 0 15% 0 15%; padding: 2%">9 นิ้ว</h3>
                <h1 style="font-size: 100px; background: #cd7f32; margin: 0 15% 0 15%">
                    @if(isset($orderData[1]))
                        <b>{{ $orderData[1] }}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>
            <div class="col-md-4 col-xs-4" style="display: block;padding: 0">
                <h3 style="border: #cd7f32 solid; margin: 0 15% 0 15%; padding: 2%">5 นิ้ว</h3>
                <h1 style="font-size: 100px; background: #cd7f32; margin: 0 15% 0 15%">
                    @if(isset($orderData[2]))
                        <b>{{ $orderData[2] }}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>
            <div class="col-md-4 col-xs-4" style="display: block;padding: 0">
                <h3 style="border: #cd7f32 solid; margin: 0 15% 0 15%; padding: 2%">3 นิ้ว</h3>
                <h1 style="font-size: 100px; background: #cd7f32; margin: 0 15% 0 15%">
                    @if(isset($orderData[3]))
                        <b>{{ $orderData[3] }}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%;align-content: center; align-items: center">

            <div class="col-md-12 col-xs-12" style="display: block;padding: 0">
                <h3 style="border: #FCC200 solid; margin: 0 25% 0 25%; padding: 1%">ทองคำ</h3>
                <h1 style="font-size: 100px; background: #FCC200; margin: 0 25% 0 25%">
                    @if(isset($orderData[4]))
                        <b>{{ $orderData[4] }}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>

        </div>
        <div class="row" style="margin-bottom: 2%;align-content: center; align-items: center">
            <div class="col-md-4 col-xs-4" style="display: block;padding: 0">
                <h3 style="border: #BFC1C2 solid; margin: 0 15% 0 15%; padding: 2%">เงิน</h3>
                <h1 style="font-size: 100px; background: #BFC1C2; margin: 0 15% 0 15%">
                    @if(isset($orderData[5]))
                        <b>{{ $orderData[5] }}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>
            <div class="col-md-4 col-xs-4" style="display: block;padding: 0">
                <h3 style="border: #A1887F solid; margin: 0 15% 0 15%; padding: 2%">นวโลหะ</h3>
                <h1 style="font-size: 100px; background: #A1887F; margin: 0 15% 0 15%">
                    @if(isset($orderData[6]))
                        <b>{{ $orderData[6] }}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>
            <div class="col-md-4 col-xs-4" style="display: block;padding: 0">
                <h3 style="border: #DA8A67 solid; margin: 0 15% 0 15%; padding: 2%">ทองแดง</h3>
                <h1 style="font-size: 100px; background: #DA8A67; margin: 0 15% 0 15%">
                    @if(isset($orderData[7]))
                        <b>{{ $orderData[7]}}</b>
                    @else
                        -
                    @endif
                </h1>
            </div>
        </div>
        {{--<div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
                <a href="{{ url('admin/complete') }}" id="btn-done" class="btn btn-success btn-lg">เสร็จสิ้น</a>
            </div>
        </div>--}}
    </div>
@stop