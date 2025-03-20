$(document).ready(() => {
    let user_id = $('#user_id').val();
    $.ajax({
        url: "/api/userById/" + user_id,
        type: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.status == 'success') {
                response.data.forEach((user) => {
                    $('#setting-name').text(user.name);
                    $('#setting-email').text(user.email);
                    $('#setting-gender').text(user.gender);
                    $('#setting-role').text(user.role);
                })
            }
        },
        error: (xhr, status, error) => {
            alert(error);
        }
    });

    // trigger modal
    $(document).on('click', '.trigger-modal', function () {
        let modalName = $(this).data('modal_name');
        // debug
        // console.log(modalName);
        $('.modal-title').text('Edit ' + modalName);

        $('#editModal').modal('show');
    })
})