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
                    {!! Form::open(['route' => 'users.store', 'files' => true]) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
      $(function () {

        $(document).on('change', '#userImage', function () {
          let ext = $(this).val().split('.').pop().toLowerCase()
          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $(this).val('')
            $('#editProfileValidationErrorsBox').
              html('The profile image must be a file of type: jpeg, jpg, png.').
              show()
          } else {
            displayPhoto(this, '#edit_preview')
          }
        })

        window.displayPhoto = function (input, selector) {
          let displayPreview = true
          if (input.files && input.files[0]) {
            let reader = new FileReader()
            reader.onload = function (e) {
              let image = new Image()
              image.src = e.target.result
              image.onload = function () {
                $(selector).attr('src', e.target.result)
                displayPreview = true
              }
            }
            if (displayPreview) {
              reader.readAsDataURL(input.files[0])
              $(selector).show()
            }
          }
        }

        $('.confirm-pwd').hide()
        $(document).on('blur', '#pfCurrentPassword', function () {
          let currentPassword = $('#pfCurrentPassword').val()
          if (currentPassword == '' || currentPassword.trim() == '') {
            $('.confirm-pwd').hide()
            return false
          }

          $('.confirm-pwd').show()
        })
        $('.confirm-pwd').hide()
        $(document).on('blur', '#pfNewPassword', function () {
          let password = $('#pfNewPassword').val()
          if (password == '' || password.trim() == '') {
            $('.confirm-pwd').hide()
            return false
          }

          $('.confirm-pwd').show()
        })
        $(document).on('blur', '#pfNewConfirmPassword', function () {
          let confirmPassword = $('#pfNewConfirmPassword').val()
          if (confirmPassword == '' || confirmPassword.trim() == '') {
            $('.confirm-pwd').hide()
            return false
          }

          $('.confirm-pwd').show()
        })
      })
    </script>
@endsection