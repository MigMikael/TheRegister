<div class="panel">
    <div class="panel-heading">
        <h1><b>ลำดับการบริจาคบูชาที่ {{ $participant->order_id }}</b></h1>
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
                <h3>Attend :
                    @if($participant->is_attend == 1)
                        <span style="color: green" class="glyphicon glyphicon-ok"></span>
                    @else
                        <span style="color: red" class="glyphicon glyphicon-remove"></span>
                    @endif
                </h3>
                <h4>Attend Time : {{ $participant->attend_time }}</h4>
                <br>
                <h3>Gain :
                    @if($participant->is_gain == 1)
                        <span style="color: green" class="glyphicon glyphicon-ok"></span>
                    @else
                        <span style="color: red" class="glyphicon glyphicon-remove"></span>
                    @endif
                </h3>
                <h4>Gain Time : {{ $participant->gain_time }}</h4>
            </div>
            <hr>
            <br>
            <div class="col-md-12">
                <h4>PhoneNumber : {{ $participant->phoneNumber }}</h4>
                <h4>Email : {{ $participant->email }}</h4>
                <h4>Address : {{ $participant->address }}</h4>
            </div>
            @endif
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{ url('participant/qrcode/download/'.$participant->token) }}" class="btn btn-success btn-lg">
            Save
            <span class="glyphicon glyphicon-floppy-disk"></span>
        </a>
        <a href="{{ url('participant/pdf/'.$participant->couple_token) }}" class="btn btn-warning btn-lg">
            Print
            <span class="glyphicon glyphicon-print"></span>
        </a>
        <a href="{{ url('participant/'.$participant->token.'/edit') }}" class="btn btn-default btn-lg">
            Edit
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </div>
</div>
