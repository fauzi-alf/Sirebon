<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Rekening Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href=" {{ url('asset/img/favicon.ico') }} " rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href=" {{ url('https://fonts.googleapis.com') }} ">
    <link rel="preconnect" href=" {{ url('https://fonts.gstatic.com') }} " crossorigin>
    <link href=" {{ url('https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap') }} "
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href=" {{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }} "
        rel="stylesheet">
    <link href="{{ url('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') }}"
        rel='stylesheet'>
    <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css') }}"
        rel='stylesheet'>
    <!-- Libraries Stylesheet -->
    <link href=" {{ url('asset/lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">
    <link href=" {{ url('asset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }} " rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{ url('asset/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href=" {{ url('asset/css/style.css') }} " rel="stylesheet">
</head>

<body>
    <div class="container-fluid justify-content-center align-item-center">
        <div class="row">
            <div class="col-sm-4 col-xl-4  ">

            </div>
            <div class="col-sm-3 col-xl-3  pt-5 ps-2 ms-5 ">
                <div class="card shadow">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Edit Data Rekenning Pembayaran</h6>
                        <form action="{{ route('RekeningPembayaranRetribusi.update', $rekening->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_akun" class="form-control" id="floatingInput"
                                    value="{{$rekening->nama_akun}}">
                                <label for="floatingInput">Nama Pemilik </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="id_ref_bank"
                                    aria-label="Floating label select example">
                                    <option selected="">Pilih Bank</option>
                                    @foreach ($refBanks as $bank)
                                        <option value="{{ $bank->id }}"
                                            {{ $bank->id == $rekening->id_ref_bank ? 'selected' : '' }}>
                                            {{ $bank->nama_bank }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Nama Bank</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="no_rekening" value="{{$rekening->no_rekening}}" class="form-control" id="floatingInput">
                                <label for="floatingInput">No Rekening </label>
                            </div>
                            <button class="btn btn-primary btn-sm p-1" type="submit">Simpan</button>
                            <a href="{{ route('RekeningPembayaranRetribusi.index') }}"
                                class="btn btn-danger btn-sm p-1" type="submit">Kembali</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-xl-4  ">
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
