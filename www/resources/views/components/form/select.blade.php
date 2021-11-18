<div class="col-md-6">
    <div class="form-group">
        {{ Form::label($label, null, ['class' => 'control-label']) }}
        {{ Form::select($name,$options,$value,$attributes) }}
    </div>
</div>
