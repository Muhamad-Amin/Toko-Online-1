<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Online | Registrasi</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        .box-registrasi {
            padding: 15px;
            border-radius: 6px;
            border: 3px solid rgba(0, 0, 0, 0.5);
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>

    <main class="container-fluid py-5">
        <div class="container">
            <div class="box-registrasi col-sm-10 col-md-6 offset-sm-1 offset-md-3">
                <h1 class="text-center mb-5">Silahkan Registrasi</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"
                            class="form-control
                        @error('name')
                                is-invalid
                        @enderror
                        "
                            id="name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                            class="form-control
                        @error('email')
                                is-invalid
                        @enderror
                        "
                            id="email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                            class="form-control
                        @error('password')
                                is-invalid
                        @enderror
                        "
                            id="password" name="password" autocomplete="off" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_HP" class="form-label">No HP</label>
                        <input type="text"
                            class="form-control
                        @error('no_hp')
                                is-invalid
                        @enderror
                        "
                            id="no_HP" name="no_hp" value="{{ old('no_hp') }}" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select form-select-md" name="role_id" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Foto</label>
                        <input type="file"
                            class="form-control
                        @error('image')
                                is-invalid
                        @enderror
                        "
                            id="image" name="image" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="10"
                            class="form-control
                        @error('address')
                                is-invalid
                        @enderror
                        "
                            style="resize: none;">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Daftar</button>
                    </div>

                    <p class="text-center">
                        Sudah punya akun? silahkan <a href="/login">login</a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
