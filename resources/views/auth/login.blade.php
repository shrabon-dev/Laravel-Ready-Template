
<!DOCTYPE html>
<html lang="en"
      dir="ltr" class="dark-mode">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>JobTime login</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/vendor/spinkit.css"
              rel="stylesheet">
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/preloader.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/app.css"
              rel="stylesheet">

        <!-- Dark Mode CSS (optional) -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/dark-mode.css"
              rel="stylesheet">

    </head>

    <body class="layout-app layout-sticky-subnav" >

        <div class="container" style="width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;">
            <div class="row" style="width: 45%">
                <div class="col-md-12">
                    <div class="card mb-0 p-2">
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error )
                                    <div class="alert bg-slate-50 alert-danger" role="alert">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                @endforeach
                            @endif



                            <form  method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="email">Your email:</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Your email address ...">
                                </div>
                                <div class="form-group mb-24pt">
                                    <label class="form-label" for="password">Password:</label>
                                    <input id="password" name='password' type="password" class="form-control" placeholder="Your password ...">
                                </div>
                                <div class="block mt-4 d-flex justify-content-between">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                     <div class="forgot_password d-inline">
                                        @if (Route::has('password.request'))
                                        <a class="text-primary" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                         @endif
                                     </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-accent">Login account</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- jQuery -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/popper.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="{{ asset('assets/frontAssets') }}/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="{{ asset('assets/frontAssets') }}/js/hljs.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{ asset('assets/frontAssets') }}/js/app-settings.js"></script>
    </body>

</html>
