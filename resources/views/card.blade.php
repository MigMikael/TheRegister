<div class="panel">
    <div class="panel-heading">
        <h1>ลำดับที่ <b>{{ $participant->order_id }}</b></h1>
    </div>
    <div class="panel-body">
        <div class="col-md-4 col-xs-12">
            <img class="thumbnail" src="{{ url('participant/qrcode/'.$participant->token) }}" style="width: 100%;height: 100%">
        </div>
        <div class="col-md-8">
            <div class="col-md-8">
                <h2><b>{{ $participant->firstName }}  {{ $participant->lastName }}</b></h2>
                <br>
                <h2><b>{{ $participant->category }}</b></h2>
            </div>
            @if(Request::is('admin/*'))
            <div class="col-md-4">
                <h3>สถานะร่วมงาน :
                    @if($participant->is_attend == 1)
                        <span style="color: green" class="glyphicon glyphicon-ok"></span>
                    @else
                        <span style="color: red" class="glyphicon glyphicon-remove"></span>
                    @endif
                </h3>
                <h4>เวลาเข้าร่วมงาน : </h4>
                <h4>{{ $participant->attend_time }}</h4>
                <br>
                <h3>สถานะรับของ :
                    @if($participant->is_gain == 1)
                        <span style="color: green" class="glyphicon glyphicon-ok"></span>
                    @else
                        <span style="color: red" class="glyphicon glyphicon-remove"></span>
                    @endif
                </h3>
                <h4>เวลารับของ : </h4>
                <h4>{{ $participant->gain_time }}</h4>
            </div>
            <hr>
            <br>
            <div class="col-md-12">
                <h4>PhoneNumber : {{ $participant->phoneNumber }}</h4>
                <h4>Email : {{ $participant->email }}</h4>
                <h4>Address : {{ $participant->address }}</h4>
            </div>
            @else
                <div class="col-md-12">
                    <br>
                    <br>
                    <h4 style="color: #ff0000">
                        <b>***กรุณาบันทึกหรือพิมพ์รหัสคิวอาร์ของท่าน เพื่อนำมาใช้ลงทะเบียนในวันงาน</b>
                    </h4>
                </div>
            @endif
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{ url('participant/qrcode/download/'.$participant->token) }}" class="btn btn-success btn-lg">
            บันทึก
            <span class="glyphicon glyphicon-floppy-disk"></span>
        </a>
        <a href="{{ url('participant/pdf/'.$participant->couple_token) }}" class="btn btn-warning btn-lg">
            พิมพ์
            <span class="glyphicon glyphicon-print"></span>
        </a>
        <a href="{{ url('participant/'.$participant->token.'/edit') }}" class="btn btn-default btn-lg">
            แก้ไข
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </div>
</div>
