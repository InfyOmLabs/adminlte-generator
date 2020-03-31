$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$( document ).ajaxError(function(event, xhr, settings) {
  if(xhr.status == 401){
    location.replace(loginUrl);
  }
});

function deleteItemAjax (url, header) {
  $.ajax({
    url: url,
    type: 'DELETE',
    dataType: 'json',
    success: function (obj) {
      if (obj.success) {
        location.reload()
      }
      swal({
        title: 'Deleted!',
        text: header + ' has been deleted.',
        type: 'success',
        timer: 2000
      });
    },
    error: function (data) {
      swal({
        title: '',
        text: data.responseJSON.message,
        type: 'error',
        timer: 5000
      });
    }
  });
}

window.deleteItem = function (url, header) {
  swal({
      title: "Delete !",
      text: 'Are you sure you want to delete this "' + header + '" ?',
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
      confirmButtonColor: '#5cb85c',
      cancelButtonColor: '#d33',
      cancelButtonText: 'No',
      confirmButtonText: 'Yes'
    },
    function () {
      deleteItemAjax(url, header)
    });
};

window.printErrorMessage = function (selector, errorResult) {
  $(selector).show().html("");
  $(selector).text(errorResult.responseJSON.message);
};

$(document).on('keydown', function (e) {
  if (e.keyCode === 27) {
    $('.modal').modal('hide');
  }
});

window.resetModalForm = function (formId, validationBox) {
  $(formId)[0].reset();
  $(validationBox).hide();
};

$(document).on('change', '#pfImage', function () {
  let ext = $(this).val().split('.').pop().toLowerCase();
  if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    $(this).val('');
    $('#editProfileValidationErrorsBox').html('The profile image must be a file of type: jpeg, jpg, png.').show();
  } else {
    displayPhoto(this, '#edit_preview_photo');
  }
});

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

