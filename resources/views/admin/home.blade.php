@extends('template')

@section('content')
    <div class="col-md-10 col-md-offset-1 col-xs-offset-0">
        <div class="row">
            <div class="jumbotron col-md-12 card-header" style="background: #00897B;color: #FFFFFF;">
                <h1><b>สำหรับผู้ดูแลระบบ</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="padding: 0">
                <div class="panel">
                    <div class="panel-heading">
                        <h1>ลงทะเบียนเข้างาน</h1>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('admin/register/scan') }}" class="btn btn-success btn-lg btn-block">รหัสคิวอาร์</a>
                        <a href="{{ url('admin/register/entry') }}" class="btn btn-warning btn-lg btn-block">ลำดับที่</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h1>รับของสั่งจอง</h1>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('admin/gain/scan') }}" class="btn btn-success btn-lg btn-block">รหัสคิวอาร์</a>
                        <a href="{{ url('admin/gain/entry') }}" class="btn btn-warning btn-lg btn-block">ลำดับที่</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="padding: 0">
                <div class="panel">
                    <div class="panel-heading">
                        <h1>ผู้เข้าร่วมงาน</h1>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('admin/participant/list') }}" class="btn btn-success btn-lg btn-block">รายชื่อ</a>
                        <a href="{{ url('admin/participant/search') }}" class="btn btn-warning btn-lg btn-block">ค้นหา</a>
                        <a href="{{ url('admin/summary') }}" class="btn btn-default btn-lg btn-block">สรุป</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop