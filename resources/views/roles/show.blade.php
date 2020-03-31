@extends('layouts.app')
@section('title')
    {!! !empty($roles->name)? $roles->name:''!!} | Role Detail
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            {{$roles->name}}
        </h1>
        <h1 class="pull-right">
            <a href="{!! route('roles.edit',$roles->id) !!}" style="margin-top: -10px"
               class="btn btn-primary">Edit</a>
            <button class="btn btn-default" style="margin-top: -10px" onclick="goBack()">Back</button>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix" style="margin-bottom:3px;"></div>
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('roles.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
