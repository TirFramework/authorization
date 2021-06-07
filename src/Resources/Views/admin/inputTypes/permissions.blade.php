<?php
?>


@php
    $checked = true;
    if(isset($model)){
        $checked = null;
    }
@endphp

<div class="form-group">
    <div class="col-md-12 control-label">{!! Form::label('permissions',trans('role::panel.permissions'), ['class' => '']) !!}</div>
    <div class="col-md-12">
        <table class="table">
            {{--for update empty check box--}}
            {!! Form::hidden("permissions","")!!}
            @foreach(Tir\Crud\Support\Module\Modules::list() as $module)
                @include('authorization::admin.inputTypes.modulePermission',compact('module','model'))
            @endforeach
        </table>
    </div>
</div>
