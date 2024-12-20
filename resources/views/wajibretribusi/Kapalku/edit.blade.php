<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Kapalku</title>
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
                        <h6 class="mb-4">Edit Data Kapalku</h6>
                       
                        <form action="{{ route('kapalku.update', $kapal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="nama_pemilik">Pemilik Kapal</label>
                                <div class="col-sm-9">
                                    <input type="text" id="nama_pemilik" class="form-control" 
                                        value="{{ $kapal->wajibRetribusi->nama ?? 'N/A' }}" readonly>
                                </div>
                            </div>                                
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama Kapal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_kapal" class="form-control" value="{{ $kapal->nama_kapal }}">
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="id_jenis_kapal">Jenis Kapal</label>
                                <div class="col-sm-9">
                                    <select name="id_jenis_kapal" id="id_jenis_kapal" class="form-select">
                                        @foreach($jeniskapal as $jenis)
                                            <option value="{{ $jenis->id }}" {{ $kapal->id_jenis_kapal == $jenis->id ? 'selected' : '' }}>
                                                {{ $jenis->jenis_kapal }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Ukuran</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ukuran" class="form-control" value="{{ $kapal->ukuran }}">
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            <a href="{{ route('kapalku.index') }}" class="btn btn-danger btn-sm p-1"
                                type="submit">Kembali</a>
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