@extends('template')

@section('content')
    <div class="row">
        <div class="card-header jumbotron col-md-10 col-md-offset-1 col-xs-offset-0">
            <h1><b>รายชื่อผู้เข้าร่วมงาน</b></h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-md-10 col-md-offset-1 col-xs-offset-0 table-responsive">
            <table class="table table-hover table-bordered">
                <thead style="text-align: center">
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>ประเภท</th>
                    <th>สถานะเข้างาน</th>
                    <th>สถานะรับของ</th>
                    <th>รายละเอียด</th>
                    <th>รหัสคิวอาร์</th>
                </tr>
                </thead>
                <tbody>
                @foreach($participants as $participant)
                    <tr>
                        <td>{!! $participant->order_id !!}</td>
                        <td>{!! $participant->firstName !!}</td>
                        <td>{!! $participant->lastName !!}</td>
                        <td>{!! $participant->phoneNumber !!}</td>
                        <td>{!! $participant->category !!}</td>
                        <td style="text-align: center">
                            @if($participant->is_attend == 1)
                                <span style="color: green" class="glyphicon glyphicon-ok"></span>
                            @else
                                <span style="color: red" class="glyphicon glyphicon-remove"></span>
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if($participant->is_gain == 1)
                                <span style="color: green" class="glyphicon glyphicon-ok"></span>
                            @else
                                <span style="color: red" class="glyphicon glyphicon-remove"></span>
                            @endif
                        </td>
                        <td style="text-align: center">
                            <a target="_blank" href="{{ url('admin/participant/show/'.$participant->order_id) }}">View</a>
                        </td>
                        <td style="text-align: center">
                            <a target="_blank" href="{{ url('participant/qrcode/'.$participant->token) }}">
                                <span class="glyphicon glyphicon-qrcode"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row col-md-10 col-md-offset-1 col-xs-offset-0" style="text-align: center;">
        {{ $participants->links() }}
    </div>
@stop