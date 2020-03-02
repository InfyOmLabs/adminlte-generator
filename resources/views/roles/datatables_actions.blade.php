
<div class='btn-group'>
    <a href="{{ route('roles.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('roles.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    <a title="Delete" class="btn btn-default btn-xs delete-btn" data-id="{{$id}}"><i
                class="glyphicon glyphicon-trash" style="color:red"></i>
    </a>
</div>
{!! Form::close() !!}