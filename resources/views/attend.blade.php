@extends('template')

@section('content')
    <div class="col-md-10 col-md-offset-1 col-xs-offset-0">
        <div class="row">
            <div class="jumbotron col-md-12 card-header" style="background: #00897B;color: #FFFFFF;">
                <h1><b>ลงทะเบียนเข้าร่วมงานเรียบร้อย</b></h1>
                <br><br><br><br><br>
                <a href="{{ url()->previous() }}" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    กลับ
                </a>
            </div>
        </div>
    </div>
@stop