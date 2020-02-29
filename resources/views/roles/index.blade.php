@extends('layouts.app')
@section('title')
    Roles
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Roles</h1>
        <div class="pull-right" id="rightData" style="margin-bottom:5px;margin-top: -10px;">
            <form class="form-inline">
                <div class="form-group" style="margin-top:30px">
                    <a class="btn btn-primary pull-right" style="margin-top: -20px;margin-bottom: 5px;"
                       href="{!! route('roles.create') !!}">Add New</a>
                </div>
            </form>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('roles.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    <script>
      $(function () {
        $('#role_table').DataTable({
          bAutoWidth: false,
          processing: true,
          serverSide: true,
          stateSave: true,
          'order': [[0, 'desc']],
          ajax: {
            url: '{!! url(route('roles.index'))  !!}',
          },
          columnDefs: [
            {
              'targets': [2],
              'orderable': false,
              'className': 'text-center',
              'width': '5%',
            },
          ],
          columns: [
            {
              data: 'name',
              name: 'name',
            },
            {
              data: 'description',
              name: 'description',
            },
            {
              data: function (row) {
                return '<a href="{{url('roles')}}/' + row.id +
                  '/edit" title="Edit" class="btn btn-default btn-xs" style="margin-right:5px;"><i class="glyphicon glyphicon-edit"   style="color:#3c8dbc;"></i>' +
                  '</a>' + '<a onclick="deleteData(' + row.id +
                  ')" title="Delete" class="btn btn-default btn-xs" ><i class="glyphicon glyphicon-trash"   style="color:red"></i></a>'
              }, name: 'id',
            },
          ],
        })
      })

      // open delete confirmation model
      function deleteData(id) {
        deleteItem('{{url('roles')}}/' + id, '#role_table', 'Role');
      }

      $(document).ready(function () {
        $("button").click(function () {
          location.reload(true);
        });
      });
    </script>
@endsection

