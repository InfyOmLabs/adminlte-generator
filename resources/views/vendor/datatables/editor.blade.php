(function(window,$){
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
    window.LaravelDataTables = window.LaravelDataTables || {};
    @foreach($editors as $editor)
        var {{$editor->instance}} = window.LaravelDataTables["%1$s-{{$editor->instance}}"] = new $.fn.dataTable.Editor({!! $editor->toJson() !!});
        {!! $editor->scripts  !!}
        @foreach ((array) $editor->events as $event)
            {{$editor->instance}}.on('{!! $event['event']  !!}', {!! $event['script'] !!});
        @endforeach
    @endforeach
    window.LaravelDataTables["%1$s"] = $("#%1$s").DataTable(%2$s);
})(window,jQuery);
