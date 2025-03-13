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
                gender: gender,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                        confirmButtonText: "Let's Login!"
                    }).then(() => {
                        window.location.href = '/login';
                    })
                } else {
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'Oke'
                    })
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Register failed',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            }
        })
    })

    // login
    $('.btn-login').on('click', function() {
        let username = $("#username").val();
        let password = $("#password").val();

        $.ajax({
            url: '/api/auth/login',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                        confirmButtonText: 'Oke'
                    }).then(() => {
                        window.location.href = '/hiragana-test';
                    })
                } else {
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'Oke'
                    })
                }
            },
            error: function(xhr, status, error) {
            //   alert('mbuh');
                Swal.fire({
                    title: 'Login failed',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            }
        })
        
    })

})