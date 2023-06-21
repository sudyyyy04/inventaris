<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Inventaris</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Open+Sans:300,400,600,700"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
            urls: ['/assets/css/fonts.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Silahkan Register</h3>

            <form method="POST" action="register" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-floating-label">
                    <input id="name" name="name" type="text"
                        class="form-control input-border-bottom @error('name') is-invalid @enderror" required
                        value="{{old('name')}}">
                    <label for="name" class="placeholder">Name</label>
                    @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group form-floating-label">
                    <input id="nik" name="nik" type="text"
                        class="form-control input-border-bottom @error('nik') is-invalid @enderror" required
                        value="{{old('nik')}}">
                    <label for="nik" class="placeholder">NIK</label>
                    @error('nik')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input type="email" name="email" id="email"
                            class="form-control input-border-bottom @error('email') is-invalid @enderror" autofocus
                            required value="{{old('email')}}">
                        <label for="email" class="placeholder">Email</label>
                        @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                    <input type="hidden" id="level" class="form-control" name="level">

                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password"
                            class="form-control input-border-bottom @error('password') is-invalid @enderror" required>
                        <label for="password" class="placeholder">Password</label>
                        @error('password')
                        <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror

                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Register</button>
                    </div>

                    <div class="form-action mb-3">
                        <a href="/" class="btn btn-primary btn-rounded">Back Login</a>

                    </div>
                </div>
            </form>

        </div>
    </div>


    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/ready.js"></script>


</body>


</html>
