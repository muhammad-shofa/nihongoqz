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
                    $('#setting-password').text(user.formatted_password);
                    $('#setting-gender').text(user.gender);
                    $('#setting-role').text(user.role);
                    
                    // add atribut
                    $('#setting-name').attr('data-modal_name', 'name');
                })
            }
        },
        error: (xhr, status, error) => {
            alert(error);
        }
    });

    // trigger modal
    $(document).on('click', '.trigger-modal', () => {

    // })
    // $('.trigger-modal').on('click', () => {
        let modalName = $('#setting-name').data('modal_name');
        console.log(modalName);
        $('#editModal').modal('show');
    })
})