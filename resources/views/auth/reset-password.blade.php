<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="modal modal-sheet position-static d-block  p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-5 pt-0">
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    @if (session()->has('status'))
                        <div class="alert alert-success mt-2">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    <form class="mt-4" method="post" action="{{route('password.update')}}">
                        @csrf
                        <h3>Reset Password</h3>
                        <div class="form-floating mb-3">
                            <input type="hidden"name="email" value="{{request()->email}}">
                            <input type="hidden" name="token" value="{{request()->token}}">
                            <input type="password" name="password" class="form-control rounded-3" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Password Baru</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control rounded-3" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">konfirmasi Password Baru</label>
                        </div>
                        <button  class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Simpan Password Baru</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
