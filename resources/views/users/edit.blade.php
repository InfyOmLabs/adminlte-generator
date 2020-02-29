@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('users.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
    <script>
      $('#editRoleId').select2({
        width: '100%',
        placeholder: "Select Role"
      });
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