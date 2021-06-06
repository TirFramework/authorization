<?php
/** @var array $permission */
?>
{{--@dump($model->permissions)--}}

<tr>
    <td><h3>{{$module->name}}</h3></td>
    @foreach($module->permissions as $permission)
        <td>
            <?php $action = key($permission) ?>
            <label for="">{{reset($permission)}}:</label>
            <div class="radiogroup">
                @foreach($permission as $key=>$value)
                    @if(!$loop->first)
                        <label class="radiobox">
                            @foreach($model->permissions as $access)
                                @if(
                                        $access->module == $module->name &&
                                        $access->action == $action &&
                                        $access->access == $key
                                    )
                                    @php $checked = 'checked'; break; @endphp
                                @endif
                            @endforeach
                            {{Form::radio("permissions[$module->name][$action]",$key,$checked)}}
                            @php $checked = null @endphp
                            <span>{{$value}}</span>
                        </label>
                    @endif
                @endforeach
            </div>
        </td>
    @endforeach

</tr>
{{--<tr>--}}
{{--    <td><h3>{{trans("authorization::panel.".$moduleName)}}</h3></td>--}}
{{--    <td>--}}
{{--        <label> Index: </label>--}}
{{--        <div class="radiogroup">--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][index]','deny',$checked)}}--}}
{{--                <span class="bg-danger">Deny</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][index]','owner')}}--}}
{{--                <span class="bg-info">Owner</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][index]','all')}}--}}
{{--                <span class="bg-green">All</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <label> View: </label>--}}
{{--        <div class="radiogroup">--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][view]','deny',$checked)}}--}}
{{--                <span class="bg-danger">Deny</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][view]','owner')}}--}}
{{--                <span class="bg-info">Owner</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][view]','all')}}--}}
{{--                <span class="bg-green">All</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <label> Create: </label>--}}
{{--        <div class="radiogroup">--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][create]','deny', $checked)}}--}}
{{--                <span class="bg-danger">Deny</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][create]','allow')}}--}}
{{--                <span class="bg-green">Allow</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <label> Edit: </label>--}}
{{--        <div class="radiogroup">--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][edit]','deny', $checked)}}--}}
{{--                <span class="bg-danger">Deny</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][edit]','owner')}}--}}
{{--                <span class="bg-info">Owner</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][edit]','all')}}--}}
{{--                <span class="bg-green">All</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <label> Delete & Restore: </label>--}}
{{--        <div class="radiogroup">--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][delete]','deny', $checked)}}--}}
{{--                <span class="bg-danger">Deny</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][delete]','owner')}}--}}
{{--                <span class="bg-info">Owner</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][delete]','all')}}--}}
{{--                <span class="bg-green">All</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <label> Full Delete: </label>--}}
{{--        <div class="radiogroup">--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][fulldelete]','deny', $checked)}}--}}
{{--                <span class="bg-danger">Deny</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][fulldelete]','owner')}}--}}
{{--                <span class="bg-info">Owner</span>--}}
{{--            </label>--}}
{{--            <label class="radiobox">--}}
{{--                {{Form::radio('permissions['.$moduleName.'][fulldelete]','all')}}--}}
{{--                <span class="bg-green">All</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--</tr>--}}
