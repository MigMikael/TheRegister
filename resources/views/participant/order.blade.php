@extends('template')

@section('content')
    <div class="jumbotron col-md-12 col-xs-12" style="text-align: center">

        <div class="row">
            <h1><b>ลำดับการบริจาคบูชาที่ {{ $orderData['order_id'] }}</b></h1>
            <hr>
        </div>
        <hr>
        <br>
        <div class="row" style="align-content: center; align-items: center">
            {{--<div class="col-md-1 col-xs-1" style="border-style: solid">*</div>
        <div class="col-md-1 col-xs-1" style="border-style: solid">*</div>--}}

            <div class="col-md-1 col-xs-4 col-md-offset-2 col-xs-offset-0">
                <h3>9</h3>
                <div style="border: solid #cd7f32; background: #cd7f32">
                    <h1>
                        @if(isset($orderData[1]))
                        <b>{{ $orderData[1]['amount'] }}</b>
                        @else
                        <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>5</h3>
                <div style="border: solid #cd7f32; background: #cd7f32">
                    <h1>
                        @if(isset($orderData[2]))
                            <b>{{ $orderData[2]['amount'] }}</b>
                        @else
                            <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>3</h3>
                <div style="border: solid #cd7f32; background: #cd7f32">
                    <h1>
                        @if(isset($orderData[3]))
                            <b>{{ $orderData[3]['amount'] }}</b>
                        @else
                            <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <h3>1</h3>
                <div style="border: solid #D4AF37; background: #D4AF37; margin-left: 25%; margin-right: 25%">
                    <h1>
                        @if(isset($orderData[4]))
                            <b>{{ $orderData[4]['amount'] }}</b>
                        @else
                            <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>1</h3>
                <div style="border: solid #c0c0c0; background: #c0c0c0">
                    <h1>
                        @if(isset($orderData[5]))
                            <b>{{ $orderData[5]['amount'] }}</b>
                        @else
                            <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>1</h3>
                <div style="border: solid #A1887F; background: #A1887F">
                    <h1>
                        @if(isset($orderData[6]))
                            <b>{{ $orderData[6]['amount'] }}</b>
                        @else
                            <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="col-md-1 col-xs-4">
                <h3>1</h3>
                <div style="border: solid #DA8A67; background: #DA8A67">
                    <h1>
                        @if(isset($orderData[7]))
                            <b>{{ $orderData[7]['amount'] }}</b>
                        @else
                            <b>-</b>
                        @endif
                    </h1>
                </div>
            </div>

            {{--<div class="col-md-1 col-xs-1" style="border-style: solid">*</div>
            <div class="col-md-1 col-xs-1" style="border-style: solid">*</div>--}}
        </div>
        <hr>
        <div class="row">
            <h1>รวมจำนวนเงิน <b> {{ $orderData['total_price'] }} </b> บาท</h1>
        </div>
    </div>
@stop