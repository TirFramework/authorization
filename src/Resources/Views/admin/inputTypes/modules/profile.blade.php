<tr>
    <td><h3>{{trans("authorization::panel.".$moduleName)}}</h3></td>
    <td>
        <label> Index: </label>
        <div class="radiogroup">
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][index]','deny',$checked)}}
                <span class="bg-danger">Deny</span>
            </label>
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][index]','owner')}}
                <span class="bg-info">Owner</span>
            </label>
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][index]','all')}}
                <span class="bg-green">All</span>
            </label>
        </div>
    </td>
    <td>
        <label> View: </label>
        <div class="radiogroup">
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][view]','deny',$checked)}}
                <span class="bg-danger">Deny</span>
            </label>
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][view]','owner')}}
                <span class="bg-info">Owner</span>
            </label>
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][view]','all')}}
                <span class="bg-green">All</span>
            </label>
        </div>
    </td>
    <td>

    </td>
    <td>
        <label> Edit: </label>
        <div class="radiogroup">
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][edit]','deny', $checked)}}
                <span class="bg-danger">Deny</span>
            </label>
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][edit]','owner')}}
                <span class="bg-info">Owner</span>
            </label>
            <label class="radiobox">
                {{Form::radio('permissions['.$moduleName.'][edit]','all')}}
                <span class="bg-green">All</span>
            </label>
        </div>
    </td>


</tr>
