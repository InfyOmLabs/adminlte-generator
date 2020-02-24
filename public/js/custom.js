// require('@coreui/coreui');
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

if ($.fn.dataTable !== undefined) {

  $.extend($.fn.dataTable.defaults, {
    "paging": true,
    "info": true,
    "ordering": true,
    "autoWidth": false,
    "pageLength": 10,
    "language": {
      "search": "",
      "sSearch": "Search",
      "sProcessing": "Processing"
    },
    "preDrawCallback": function () {
      customSearch()
    }
  });
}

function customSearch() {
  $('.dataTables_filter input').addClass("form-control");
  $('.dataTables_filter input').attr("placeholder", "Search");
}

function deleteItemAjax(url, tableId, header, callFunction = null) {
  $.ajax({
    url: url,
    type: 'DELETE',
    dataType: 'json',
    success: function (obj) {
      if (obj.success) {
        $(tableId).DataTable().ajax.reload(null, false);
      }
      swal({
        title: 'Deleted!',
        text: header + ' has been deleted.',
        type: 'success',
        timer: 2000
      });
      if (callFunction) {
        eval(callFunction);
      }
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

window.deleteItem = function (url, tableId, header, callFunction = null) {
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
      deleteItemAjax(url, tableId, header, callFunction = null);
    });
};

window.deleteItemInputConfirmation = function (url, tableId, header, alertMessage, callFunction = null) {
  swal({
      type: "input",
      inputPlaceholder: "Please type \"delete\" to delete this "+header+".",
      title: "Delete !",
      text: alertMessage,
      html: true,
      showCancelButton: true,
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
      confirmButtonColor: '#5cb85c',
      cancelButtonColor: '#d33',
      cancelButtonText: 'No',
      confirmButtonText: 'Yes',
      imageUrl: baseUrl + "images/warning.png"
    },
    function (inputVal) {
      if (inputVal===false) {
        return false;
      }
      if (inputVal=='' || inputVal.toLowerCase() != "delete") {
        swal.showInputError("Please type \"delete\" to delete this client.");
        $(".sa-input-error").css('top','23px!important');
        return false;
      }
      if(inputVal.toLowerCase() === "delete"){
        deleteItemAjax(url, tableId, header, callFunction = null);
      }
    });
};

window.printErrorMessage = function (selector, errorResult) {
  $(selector).show().html("");
  $(selector).text(errorResult.responseJSON.message);
};

window.manageCheckbox = function (input) {
  if (input.id == "enabled") {
    $(input).attr('name', 'no');
    $(input).iCheck({
      checkboxClass: 'icheckbox_line-white',
      insert: '<div class="icheck_line-icon"></div>'
    });
  } else {
    $(input).attr('name', 'yes');
    $(input).iCheck({
      checkboxClass: 'icheckbox_line-green',
      insert: '<div class="icheck_line-icon"></div>'
    });
  }
};

window.manageAjaxErrors = function (data, errorDivId = 'editValidationErrorsBox') {
  if (data.status == 404) {
    $.toast({
      heading: 'Error',
      text: data.responseJSON.message,
      showHideTransition: 'fade',
      icon: 'error',
      position: 'top-right',
    });
  } else {
    printErrorMessage("#" + errorDivId, data);
  }
};
$(document).on('keydown', function (e) {
  if (e.keyCode === 27) {
    $('.modal').modal('hide');
  }
});
window.displaySuccessMessage = function (message) {
  $.toast({
    heading: 'Success',
    text: message,
    showHideTransition: 'slide',
    icon: 'success',
    position: 'top-right',
  });
};

$(function () {
  $(".dataTables_length").css('padding-top', '6px');
  $(".dataTables_info").css('padding-top', '24px');
});

if ($.fn.dataTable !== undefined) {
  $.extend($.fn.dataTable.defaults, {
    drawCallback: function (settings) {
      let thisTableId = settings.sTableId;
      if (settings.fnRecordsDisplay() > settings._iDisplayLength) {
        $('#' + thisTableId + '_paginate').show();
      } else {
        $('#' + thisTableId + '_paginate').hide();
      }
    }
  });
}

window.resetModalForm = function (formId, validationBox) {
  $(formId)[0].reset();
  $(validationBox).hide();
};

// open edit user profile model
$(document).on('click', '.edit-profile', function (event) {
  let userId = $(event.currentTarget).data('id');
  renderProfileData(usersUrl + userId + '/edit');
});

$(document).on('change', '#pfImage', function () {
  let ext = $(this).val().split('.').pop().toLowerCase();
  if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    $(this).val('');
    $('#editProfileValidationErrorsBox').html('The profile image must be a file of type: jpeg, jpg, png.').show();
  } else {
    displayPhoto(this, '#edit_preview_photo');
  }
});

window.renderProfileData = function (usersUrl) {
  $.ajax({
    url: usersUrl,
    type: 'GET',
    success: function (result) {
      if (result.success) {
        let user = result.data;
        $('#pfUserId').val(user.id);
        $('#pfName').val(user.name);
        $('#pfEmail').val(user.email);
        $('#pfPhone').val(user.phone);
        $('#edit_preview_photo').attr('src',user.image_avatar);
        $('#EditProfileModal').modal('show');
      }
    }
  });
};
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

