<div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-offset-0" style="text-align: center">
        <div class="col-md-2 col-md-offset-2 col-xs-12 col-xs-offset-0">
            <h1><a href="" class="btn btn-default btn-lg disabled">Step 1</a></h1>
        </div>
        <div class="col-md-1 col-xs-12">
            <h2><span class="glyphicon glyphicon-arrow-right"></span></h2>
        </div>
        <div class="col-md-2 col-xs-12">
            <h1><a href="" class="btn @if(Request::is('step_2/*') || Request::is('finish/*')) btn-default @else btn-warning @endif btn-lg disabled">Step 2</a></h1>
        </div>
        <div class="col-md-1 col-xs-12">
            <h2><span class="glyphicon glyphicon-arrow-right"></span></h2>
        </div>
        <div class="col-md-2 col-xs-12">
            <h1><a href="" class="btn @if(Request::is('finish/*')) btn-default @else btn-warning @endif btn-lg disabled">Finish</a></h1>
        </div>
    </div>
</div>