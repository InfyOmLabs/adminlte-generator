@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Posts</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="card">
                <div class="card-body p-0">
                    {!! Form::open(['route' => 'posts.store']) !!}

                    @include('posts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
