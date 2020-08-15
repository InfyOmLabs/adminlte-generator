@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Post</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'posts.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('posts.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('posts.index') }}" class="btn btn-default float-right">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
