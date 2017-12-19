<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Login - Pug Ventures, LLC</title>

        <link href="{{ URL::asset('css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/amanda.css') }}">
    </head>

    <body>

        <div class="am-signin-wrapper">
            <div class="am-signin-box">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div>
                            <h1><i class="fas fa-hand-paper"></i></h1>
                            <p>Access to this page is restricted</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <h5 class="tx-gray-800 mg-b-25">Login To Your Account</h5>
                        <form action="{{ url('/login') }}" method="POST">
                            {{ csrf_field() }}
                            
                            @foreach ($errors->all() as $message)
                            <div class="alert alert-danger" role="alert">
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                    <span>{{ $message }}</span>
                                </div><!-- d-flex -->
                            </div><!-- alert -->
                            @endforeach
                            
                            <div class="form-group">
                                <label class="form-control-label">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email address">
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="form-control-label">Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div><!-- form-group -->

                            <div class="form-group mg-b-20"><a href="">Reset password</a></div>

                            <button type="submit" class="btn btn-block">Sign In</button>
                        </form>
                    </div><!-- col-7 -->
                </div><!-- row -->
                <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; {{ date('Y') }}. All Rights Reserved. Pug Ventures, LLC</p>
            </div><!-- signin-box -->
        </div><!-- am-signin-wrapper -->

        <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/popper.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
        <script src="{{ URL::asset('js/toggles.min.js') }}"></script>
        <script src="{{ URL::asset('js/perfect-scrollbar.jquery.js') }}"></script>
        <script src="{{ URL::asset('js/amanda.js') }}"></script>
    </body>
</html>
