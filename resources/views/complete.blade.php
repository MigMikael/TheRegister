@extends('template')

@section('content')
    <div class="jumbotron card-header col-md-10 col-md-offset-1 col-xs-offset-0">
        <h1>บันทึกข้อมูลเรียบร้อย</h1>
        <hr>
        <a href="{{ url('admin/gain/entry') }}" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-left"></span>กลับ
        </a>
    </div>
@stop