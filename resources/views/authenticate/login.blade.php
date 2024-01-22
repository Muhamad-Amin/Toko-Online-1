<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Online | Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        .pembungkus-box-login {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-login {
            border: 3px solid rgba(0, 0, 0, 0.5);
            height: 500px;
            width: 450px;
            border-radius: 6px;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>

    <main class="container-fluid">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="pembungkus-box-login">
                <div class="box-login p-5">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <h1 class="text-center">Login</h1>

                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control
                            @error('email')
                                is-invalid
                            @enderror" ">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Login</button>
                        </div>
                        <p class="text-center">
                            belum punya akun? silahkan <a href="/registrasi">registrasi</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </main>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
