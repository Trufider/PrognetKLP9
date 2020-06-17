<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>Praktikum - Halaman Masuk User</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/floating-labels/">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Favicons -->
        <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">

        <style>
        html, body {
            background-color: lightgreen;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>
    <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.4/examples/floating-labels/floating-labels.css" rel="stylesheet">
        </head>
    <body>
        <div class="container">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">
                    <b> Masuk </b> |
                    <a class="text-decoration-none" href="{{ url('/') }}">
                    Praktikum Prognet
                </a>
            </h1>
		
            <p>Mulai Berbelanja Online. Tidak Punya Akun? Mari <a href="{{ url('/registeruser') }}"> <b><b>Buat Akun Baru</b></b> </a></p>
            </div>
            <form class="form-signin" method="POST" action="{{ route('loginuser') }}">
                @csrf
                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                    <label for="inputEmail"> Email Address </label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Ingatkan saya
                    </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>

                <div class="text-center">
                <p class="mt-2">Lupa Password? Silahkan <a href="{{ url('/registeruser') }}">Reset password</a></p>
<small>Jika Terjadi Masalah Login Silahkan Mengulangi Login Kembali</small>
                </div>
                <p class="mt-5 mb-3 text-muted text-center"> </p>
            </form>
        </div>
    </body>
</html>
