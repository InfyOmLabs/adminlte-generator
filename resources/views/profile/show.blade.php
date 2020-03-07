@extends('layouts.app')
@section('title')
    Edit Profile
@endsection
@section('content')

    <section class="content-header">
        <h1>
            User
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{url('admin/profile/update')}}">Edit User Profile</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                <div class="row" style="margin: 0">

                    @include('profile.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
