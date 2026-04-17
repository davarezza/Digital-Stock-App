$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {

    const successMessage = $('meta[name="flash-success"]').attr('content');
    const loginErrorMessage = $('meta[name="flash-loginError"]').attr('content');
    const emailErrorMessage = $('meta[name="flash-email"]').attr('content');

    if (successMessage) {
        toastr.options = {
            positionClass: "toast-top-right",
        };
        toastr.success(successMessage);
    }

    if (loginErrorMessage) {
        toastr.options = {
            positionClass: "toast-top-right",
        };
        toastr.error(loginErrorMessage);
    }

    if (emailErrorMessage) {
        toastr.options = {
            positionClass: "toast-top-right",
        };
        toastr.error(emailErrorMessage);
    }

    const $password = $('#password');
    const $passwordConfirmation = $('#password_confirmation');

    $('#togglePassword').on('click', function () {
        if ($password.length) {
            const type = $password.attr('type') === 'password' ? 'text' : 'password';
            $password.attr('type', type);
            $(this).toggleClass('bx-hide bx-show');
        }
    });

    $('#togglePasswordConfirmation').on('click', function () {
        if ($passwordConfirmation.length) {
            const type = $passwordConfirmation.attr('type') === 'password' ? 'text' : 'password';
            $passwordConfirmation.attr('type', type);
            $(this).toggleClass('bx-hide bx-show');
        }
    });

});
