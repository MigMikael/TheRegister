@extends('template')

@section('content')
    <div class="row">
        <div class="jumbotron" style="text-align: center">
            <h1><b>Admin Panel</b></h1>
            <h2>รายชื่อผู้เข้าร่วมงานทั้งหมด</h2>
        </div>
        <div class="col-xs-12 col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    {{--<th>ID</th>--}}
                    <th>Order_id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>PhoneNumber</th>
                    <th>Category</th>
                    <th>Attend</th>
                    <th>Gain</th>
                    <th>Detail</th>
                    <th>QRCode</th>
                </tr>
                </thead>
                <tbody>
                @foreach($participants as $participant)
                <tr>
                    {{--<td>{!! $participant->id !!}</td>--}}
                    <td>{!! $participant->order_id !!}</td>
                    <td>{!! $participant->firstName !!}</td>
                    <td>{!! $participant->lastName !!}</td>
                    <td>{!! $participant->phoneNumber !!}</td>
                    <td>{!! $participant->category !!}</td>
                    <td>
                        @if($participant->is_attend == 1)
                            <span style="color: green" class="glyphicon glyphicon-ok"></span>
                        @else
                            <span style="color: red" class="glyphicon glyphicon-remove"></span>
                        @endif
                    </td>
                    <td>
                        @if($participant->is_gain == 1)
                            <span style="color: green" class="glyphicon glyphicon-ok"></span>
                        @else
                            <span style="color: red" class="glyphicon glyphicon-remove"></span>
                        @endif
                    </td>
                    <td>
                        <a target="_blank" href="{{ url('admin/show/'.$participant->order_id) }}">View</a>
                    </td>
                    <td>
                        <a target="_blank" href="{{ url('participant/qrcode/'.$participant->id) }}">
                            <span class="glyphicon glyphicon-qrcode"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop