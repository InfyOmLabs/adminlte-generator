$(function () {
  // open delete confirmation model
  $(document).on('click', '.delete-btn', function (event) {
    let roleId = $(event.currentTarget).data('id')
    deleteItem(roleUrl + roleId, 'Role')
  })
})