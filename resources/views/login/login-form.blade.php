<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login untuk melanjutkan</title>
    <link rel="stylesheet" href="{{ url('assets/style.css') }}">
    <link href="{{ url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css') }}" rel='stylesheet'>
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper align-center">

        <form method="post" action="{{ route('postlogin') }}">
            @csrf
            <img style="height:256px ; width:256px;" src="{{ url('asset/img/klrrR.png') }}" class="logo">
            <h1 class="text-primary"> Login Sirebon </h1>
            @session('success')
                <div class="alert alert-success p-2 m-2">
                    Berhasil Logout
                </div>
            @endsession
            @session('failedd')
                <div class="alert alert-danger p-2 m-2">
                    Username Atau Password Salah
                </div>
            @endsession
            @session('rs-completed')
                <div class="alert alert-success p-2 m-2">
                    Reset Password Berhasil, Silahkan Login
                </div>
            @endsession
            <div class="input-box">
                <input name="username" type="text" placeholder="Username" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="remember-forgot">
                <a href="{{ url('/forgot-password') }}">Lupa Password</a>
            </div>
            <button type="submit" class="btn">LOGIN</button>
        </form>
    </div>

    <script src=" {{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
