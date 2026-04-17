<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center p-5 bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url({{ asset('assets/img/auth/cloud-bg.jpg') }})">
    <!-- Form Container -->
    <div class="flex w-full max-w-225 h-auto md:h-125 border-2 border-white/30 rounded-3xl backdrop-blur-lg">
        <!-- Left Column - Hidden on mobile -->

        @yield('content')
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/auth/auth.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @if (Session::has('success'))
    toastr.options = {
        "positionClass": "toast-top-right",
    };
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('loginError'))
    toastr.options = {
        "positionClass": "toast-top-right",
    };
    toastr.error("{{ Session::get('loginError') }}");
    @endif

    @if (Session::has('email'))
    toastr.options = {
        "positionClass": "toast-top-right",
    };
    toastr.error("{{ Session::get('email') }}");
    @endif

    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.classList.toggle('bx-hide');
        this.classList.toggle('bx-show');
    });

    togglePasswordConfirmation.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.classList.toggle('bx-hide');
        this.classList.toggle('bx-show');
    });
</script>
