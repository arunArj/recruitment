<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Management System</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
</head>




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
                                {{-- <input type="checkbox">
                                <span>Remember me</span> --}}
                            </div>
                            <div class="forget-pass">
                                {{-- <a href="#">Forgot Password ?</a> --}}
                            </div>

                            <button type="submit">LOG-IN</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>
