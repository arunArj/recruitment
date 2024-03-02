<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
</head>

<body>
    {{-- <div id="auth">

<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/favicon.svg" height="48" class='mb-4'>
                        <h3>Sign In</h3>
                        <p>Please sign in to continue to Vaidhya Accounts APP.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input  class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                               @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                {{-- @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class='float-end'>
                                    <small>Forgot password?</small>
                                </a>
                                @endif --}}
    {{-- </div>
                            <div class="position-relative">
                                <input type="password"  name="password" required autocomplete="current-password" class="form-control" id="password">
                                     @if ($errors->has('password'))
                                     <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-start">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">Remember me</label>
                            </div>
                            <div class="float-end">
                                <a href="/register">Don't have an account?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end">  {{ __('Log in') }}</button>
                        </div>
                    </form>
                    <div class="divider">
                        <div class="divider-text">OR</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="{{ URL::asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script> --}}

    <body>
        <div class="parent clearfix">
            <div class="bg-illustration">
                {{-- <img src="assets/images/p-logo.jpg" alt="logo"> --}}

                <div class="burger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>

            <div class="login">
                <div class="container">
                    <h1 class="logi-head">Login to access <br />your account</h1>

                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input placeholder="E-mail Address" id="email" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username">
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                            <input type="password" placeholder="Password" name="password" required
                                autocomplete="current-password" id="password">
                            @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                            <div class="remember-form">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </div>
                            <div class="forget-pass">
                                <a href="#">Forgot Password ?</a>
                            </div>

                            <button type="submit">LOG-IN</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>
