{!! Form::hidden('order_id', $order_id, ['class' => 'form-control']) !!}
{!! Form::hidden('couple_token', $couple_token, ['class' => 'form-control']) !!}
<div class="form-group">
    {!! Form::label('name', 'ชื่อ ', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}<br>
    </div>
</div>

<div class="form-group">
    {!! Form::label('address', 'ที่อยู่ ', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}<br>
    </div>
</div>

<div class="form-group">
    {!! Form::label('phoneNumber', 'เบอร์โทรศัพท์ ', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('phoneNumber', null, ['class' => 'form-control']) !!}<br>
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'อีเมล ', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}<br>
    </div>
</div>

<div class="form-group">
    {!! Form::label('category', 'ลงทะเบียนเข้าร่ามงานในฐานะ ', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::select('category', $category, null, ['class' => 'form-control col-sm-12']) !!}<br>
    </div>
</div>