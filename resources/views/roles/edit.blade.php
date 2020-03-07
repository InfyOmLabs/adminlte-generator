@extends('layouts.app')
@section('title')
    Roles
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Role
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($roles, ['route' => ['roles.update', $roles->id], 'method' => 'patch']) !!}

                    @include('roles.edit_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
@endsection
@section('scripts')
    <script>
        $(function(){
            $('.permission-checkbox').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                increaseArea: '10%'
            });

            $('form').find('input:text').filter(':input:visible:first').first().focus();
        });
    </script>
@endsection