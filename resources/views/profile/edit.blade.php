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
                   {!! Form::model($user,['url' => 'profile', 'method' => 'post','files' => true]) !!}

                    @include('profile.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   <script>
       $(".responsiveChosen").chosen({width: "100%"});
   </script>
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
              show()
          } else {
            displayPhoto(this, '#edit_preview_photos')
          }
        })

        window.displayPhoto = function (input, selector) {
          let displayPreview = true;
          if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
              let image = new Image();
              image.src = e.target.result;
              image.onload = function () {
                $(selector).attr('src', e.target.result);
                displayPreview = true;
              };
            };
            if (displayPreview) {
              reader.readAsDataURL(input.files[0]);
              $(selector).show();
            }
          }
        };
      })

    </script>
@endsection