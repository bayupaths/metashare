<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    {{-- Icon Logo Metashare --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/icons/logo-metashare-small.png') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('vendor/adminmart/dist/css/style.min.css') }}">
    <!-- Login CSS -->
    <link rel="stylesheet" href="{{ url('assets/style/login-admin-style.css') }}">

    <link rel="stylesheet" href="{{ url('vendor/adminmart/dist/css/icons/font-awesome/css/fontawesome.min.css') }}">
</head>

<body>
    <div class="main-wrapper">

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative p-3">
            <div class="auth-box row bg-white shadow-sm w-md-75 w-lg-50">
                <div
                    class="col-lg-6 col-md-5  d-none d-sm-flex justify-content-center align-items-center w-md-75 w-lg-50">
                    <img src="{{ url('assets/images/ilustrations/admin-login.svg') }}">
                </div>
                <div class="col-lg-6 col-md-7 mt-2">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{ url('assets/icons/logo-metashare.png') }}" alt="Metashare Logo" width="150">
                            <hr>
                            <h4 class="text-black">Login Admin</h4>
                        </div>
                        <form action="{{ route('admin-login-process') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <div class="input-group rounded shadow-sm">
                                            <span>
                                                <label for="email"
                                                    class="far fa-regular fa-user mt-2 pl-3 text-primary"></label>
                                            </span>
                                            <input name="email"
                                                class="form-control border-0 @error('email') is-invalid @enderror"
                                                id="username" type="email" placeholder="Masukan Email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <div class="input-group rounded shadow-sm">
                                            <span>
                                                <label for="password" class="icon-key mt-2 pl-3 text-primary"></label>
                                            </span>
                                            <input name="password"
                                                class="form-control border-0 @error('password') is-invalid @enderror"
                                                id="password" type="password" placeholder="Masukan password"
                                                autocomplete="current-password" id="id_password"><span role="button"
                                                class="d-flex"><i class="fas fa-eye fa-xs mr-2 my-auto"
                                                    id="togglePassword"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center  d-flex justify-items-start">
                                    <button type="submit" class="btn btn-sm btn-warning rounded px-3">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        &copy; {{ date('Y') }} Metashare <span class="text-muted">By Paralogy</span>
    </footer>

    <script src="{{ url('vendor/adminmart/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/adminmart/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('vendor/adminmart/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(".preloader ").fadeOut();

        // Show Toggle Password
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>
