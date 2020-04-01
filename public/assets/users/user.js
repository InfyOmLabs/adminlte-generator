$(function () {
    // open delete confirmation model
    $(document).on('click', '.delete-btn', function (event) {
        let userId = $(event.currentTarget).data('id');
        deleteItem(userUrl + userId, 'User');
    });
});

$(document).on('change', '#userImage', function () {
    let ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $(this).val('');
        $('#editProfileValidationErrorsBox').
            html('The profile image must be a file of type: jpeg, jpg, png.').
            show();
    } else {
        displayPhoto(this, '#edit_preview');
    }
});

$(document).on('change', '#editUserImage', function () {
    let ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $(this).val('');
        $('#editProfileValidationErrorsBox').
            html('The profile image must be a file of type: jpeg, jpg, png.').
            show();
    } else {
        displayPhoto(this, '#edit_preview_photos');
    }
});
