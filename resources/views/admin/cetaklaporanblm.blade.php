<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sirebon</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
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
 
        <div class="col-sm-12 col-xl-11 mt-3">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Laporan Blm Bayar Kapal Wajib Retribusi</h6>
                <div class="row">
                    <div class="col-10">

                        <form class="d-none d-md-flex col-3">
                            <input class="form-control border-0" type="search" placeholder="Search">
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{route('LaporanBlmBayar')}}"  class="btn btn-sm btn-danger m-1 p-1"><i
                                class="fa-solid fa-print"></i> Kembali </a>
                        <button onclick="window.print()" class="btn btn-sm btn-success m-1 p-1"><i
                                class="fa-solid fa-print"></i> Cetak </button>

                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No.</th>
                            <th class="text-center" scope="col">Nama Pemilik</th>
                            <th class="text-center" scope="col">Nama Kapal</th>
                            <th class="text-center" scope="col">Jenis Kapal</th>
                            <th class="text-center" scope="col">Ukuran</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="col" class="text-center">1.</th>
                            <td scope="col" class="text-center">Fauzi
                            </td>
                            <td scope="col" class="text-center">Kapal Laut</td>
                            <td scope="col" class="text-center">Kapal Feri
                            </td>
                            <td scope="col" class="text-center">30</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Sales End -->



        <!-- Footer Start -->
        <div class="container-fluid p-1">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Sirebon</a> 2024, Dinas Komuikasi Informatika dan Statistika
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End --> 
</body>

</html>
