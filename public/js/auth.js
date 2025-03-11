$(document).ready(function () {
    // register
    $('.btn-register').on('click', function() {
        let name = $('#name').val();
        let username = $('#username').val();
        let password = $('#password').val();
        let email = $('#email').val();
        let gender = $('input[name="gender"]:checked').val();

        $.ajax({
            url: '/api/auth/register',
            type: 'POST',
            data: {
                name: name,
                username: username,
                password: password,
                email: email,
                gender: gender
            },
            dataType: 'json',
            success: function(response) {

            },
            error: function(xhr, status, error) {
                alert('Register failed' + error);
            }
        })

    })


    // login


})