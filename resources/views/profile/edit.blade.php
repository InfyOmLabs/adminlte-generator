@extends('layouts.app')
@section('title')
    User Profile
@endsection
@section('content')
   <section class="content-header">
           <h1 class="pull-left">
               User Profile
           </h1>
   </section>
   <div class="content">
       <div class="clearfix" style="margin-bottom:3px;"></div>
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">

           <div class="box-body">
               <div class="row">
                   {!! Form::model($user,['url' => 'update-profile', 'method' => 'post','files' => true]) !!}

                    @include('profile.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
    <script>
        $(function() {
        $(document).on('change', '#editUserImage', function () {
          let ext = $(this).val().split('.').pop().toLowerCase()
          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $(this).val('')
            $('#editProfileValidationErrorsBox').
              html('The profile image must be a file of type: jpeg, jpg, png.').
              show();
          } else {
            displayPhoto(this, '#edit_preview_photos')
          }
        })
      })
    </script>
@endsection
