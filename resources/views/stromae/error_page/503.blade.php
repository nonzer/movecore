<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Core App</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/master/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/master/dist/css/adminlte.min.css">
</head>
<body class="login-page">
    <div class="login-box">
        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-danger"> 503</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page non autorisée.</h3>

                    <p>
                        Vous n'êtes pas autorisés à accéder à cette page.
                        Il est préférable de retourner.
                        <br>
                        <a class="mt-2 text-center btn btn-danger" href="{{ route('home') }}"><i class="fas fa-home"></i> Retour</a>
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error_page -->
        </section>
        <!-- /.content -->
    </div>
</body>
</html>