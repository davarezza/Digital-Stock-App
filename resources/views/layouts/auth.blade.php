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
    <style>
        .auth-bg {
            background-color: #f1f5f9;
            background-image:
                url("{{ asset('assets/img/auth/login-bg.png') }}");
            background-size: auto, auto, auto, cover;
            background-position: center, center, center, center;
            background-repeat: no-repeat;
        }
        .auth-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(241, 245, 249, 0.88);
            backdrop-filter: blur(1px);
        }
    </style>
</head>
<body class="auth-bg relative min-h-screen flex items-center justify-center">

    <div class="relative z-10 w-full flex justify-center px-4 py-2">
        <div class="w-full max-w-4xl min-h-110 bg-white rounded-3xl shadow-2xl flex overflow-hidden">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/auth/auth.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if (Session::has('success'))
        toastr.options = { "positionClass": "toast-top-right" };
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('loginError'))
        toastr.options = { "positionClass": "toast-top-right" };
        toastr.error("{{ Session::get('loginError') }}");
        @endif

        @if (Session::has('email'))
        toastr.options = { "positionClass": "toast-top-right" };
        toastr.error("{{ Session::get('email') }}");
        @endif
    </script>
</body>
</html>
