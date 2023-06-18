<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
    <section class="login">
        <div class="login-container">
            <div class="login-title">
                <h1>Register</h1>
                <p>Silahkan buat user baru</p>
            </div>
            <div>
            <form action="/register" method="post" class="form-login">
                @csrf
                <div class="input-container">
                    <p>Nama Lengkap</p>
                    <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap" class="@error('name') invalid-input @enderror" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-message">
                        <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-container">
                    <p>Username</p>
                    <input type="text" name="username" id="username" placeholder="Masukkan username" class="@error('username') invalid-input @enderror" value="{{ old('username') }}" required>
                    @error('username')
                    <div class="invalid-message">
                        <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-container">
                    <p>Password</p>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" class="@error('password') invalid-input @enderror" required>
                    @error('password')
                    <div class="invalid-message">
                        <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit">Register</button>
            </form>
            <p class="dialog-barrier">atau</p>
            <a href="/login"><button type="submit" class="register-button">Login</button></a>
            </div>
        </div>
        <div class="introduction">
            <h1 class="top-title">Bersosial</h1>
            <p class="description">Bersosial adalah platform media sosial mini<br>yang memungkinkan pengguna dapat memposting<br>teks dan gambar dengan mudah.
            <br>Sesuai dengan namanya<br>dengan Bersosial pengguna saling berbagi postingan<br>dan tentu juga dapat saling berinteraksi dengan komentar.
            <br>Jadi skuy gas Bersosial...</p>
            <p class="footer-watermark">Made with <iconify-icon icon="devicon:laravel" style="color: white;" width="24" ></iconify-icon> by Mike</p>
        </div>
    </section>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
</body>
</html>