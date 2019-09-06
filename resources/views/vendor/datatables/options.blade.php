window.LaravelDataTables = window.LaravelDataTables || {};
window.LaravelDataTables.options = %2$s
window.LaravelDataTables.editors = [];
@foreach($editors as $editor)
window.LaravelDataTables.editors["{{$editor->instance}}"] = {!! $editor->toJson()  !!}
@endforeach
