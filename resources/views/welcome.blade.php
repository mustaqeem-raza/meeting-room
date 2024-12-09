<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meeting PRO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>

<body class="sidebar-dark">
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <!-- Access Calendar Button aligned above the login form -->
                    <div class="col-12 text-center mb-4">
                        <a href="{{ route('calendar') }}" class="btn btn-primary">
                            Access Calendar
                        </a>
                    </div>
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">Meeting <span>PRO</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="Email"
                                                    autocomplete="email"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                    required
                                                    autofocus>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="exampleInputPassword1"
                                                    autocomplete="current-password"
                                                    placeholder="Password"
                                                    name="password"
                                                    required>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>
                                            </div>
                                            <a href="#" class="d-block mt-3 text-muted">Forgot password?</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="{{asset('assets/vendors/core/core.js')}}"></script>
    <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- endinject -->
</body>

</html>