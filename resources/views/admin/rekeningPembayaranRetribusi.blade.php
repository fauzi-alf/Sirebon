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
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">

                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img class="rounded-circle" src="{{ url('asset/img/klrrR.png') }} "
                            alt="" style="width: 60px; height: 60px;"></box-icon> Sirebon</h3>
                </a>
                <div class="d-flex align-items-center    ms-4 mb-4">

                </div>
                <div class="navbar-nav w-100 p-2">
                    @if (auth()->user()->level == 'administrator')
                        <a href="{{ url('/Home') }} " class="nav-item nav-link  "> <i
                                class="fa-brands fa-fort-awesome-alt"></i>
                            Beranda Admin </a>
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <a href="{{ url('/WajibRetribusi') }}" class="nav-item nav-link "><i
                                class='bx bxs-package'></i> Wajib
                            Retribusi</a>
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <a href="{{ url('/KapalWajibRetribusi') }}" class="nav-item nav-link "><i
                                class='bx bxs-ship'></i> Kapal Wajib
                            Retribusi </a>
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <a href="{{ url('/RekeningPembayaranRetribusi') }}" class="nav-item nav-link active"><i
                                class='bx bx-money-withdraw'></i> Rekening
                            Pembayaran Retribusi</a>
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <a href="{{ url('/PembayaranRetribusi') }}" class="nav-item nav-link"><i
                                class="fa-solid fa-money-check-dollar"></i>
                            Pembayaran Retribusi</a>
                    @endif


                    @if (auth()->user()->level == 'wajibretribusi')
                        <a href="{{ url('/Profile') }}" class="nav-item nav-link "> <i class='bx bxs-user-account'></i>
                            Profile </a>
                    @endif

                    @if (auth()->user()->level == 'wajibretribusi')
                        <a href="{{ url('/Kapalku') }}" class="nav-item nav-link active"><i
                                class="fa-solid fa-ship"></i>
                            Kapalku</a>
                    @endif
                    @if (auth()->user()->level == 'wajibretribusi')
                        <a href="{{ url('KapalWajibRetribusi') }}" class="nav-item nav-link"><i
                                class='bx bxs-ship'></i> Kapal Wajib
                            Retribusi </a>
                    @endif
                    <a href="{{ url('/KategoriRetribusi') }}" class="nav-item nav-link "><i
                            class='bx bxs-category'></i> Kategori
                        Retribusi
                    </a>
                    @if (auth()->user()->level == 'wajibretribusi')
                        <a href="{{ url('/KonfirmasiPembayaranretribusi') }}" class="nav-item nav-link"><i
                                class="fa-solid fa-user-check"></i> Konfirmasi
                            Pembayaran Retribusi</a>
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class='bx bxs-report'></i> Laporan</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{ url('/LaporanRetribusi') }}" class="dropdown-item"><i
                                        class="fa-solid fa-list-check"></i>
                                    Retribusi</a>
                                <a href="{{ url('/LaporanBlmBayar') }}" class="dropdown-item"><i
                                        class="fa-solid fa-file-circle-exclamation"></i> Belum Membayar Retribusi</a>
                            </div>
                        </div>
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <a href="{{ url('logout') }}" class="nav-item nav-link"><i class='bx bx-log-out'></i>
                            Logout</a>
                    @endif

                    @if (auth()->user()->level == 'wajibretribusi')
                        <a href="{{ url('Laporan') }}" class="nav-item nav-link"><i class='bx bxs-report'></i>
                            Laporan</a>
                    @endif
                    @if (auth()->user()->level == 'wajibretribusi')
                        <a href="{{ url('logout') }}" class="nav-item nav-link"><i class='bx bx-log-out'></i>
                            Logout</a>
                    @endif

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="position-end">
                    @if (auth()->user()->level == 'wajibretribusi')
                        <img class="rounded-circle" src="{{ url('asset/img/userpro.png') }} " alt=""
                            style="width: 40px; height: 40px;">
                    @endif
                    @if (auth()->user()->level == 'administrator')
                        <img class="rounded-circle" src="{{ url('asset/img/adminpro.png') }} " alt=""
                            style="width: 40px; height: 40px;">
                    @endif
                    {{-- <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div> --}}
                </div>
                <div class="ms-3 ">

                    @if (auth()->user()->level == 'administrator')
                        <span>Admin</span>
                    @endif
                    @if (auth()->user()->level == 'wajibretribusi')
                        <span>Wajib Retribusi</span>
                    @endif
                </div>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">


                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            {{-- <img class="rounded-circle me-lg-2" src="{{ url('asset/img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;"> --}}
                            <i class='bx bx-cog'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                            <a href="{{ route('logout') }}" class="dropdown-item"><i class='bx bx-log-out'></i> Log
                                Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->





            {{-- <!-- Recent Sales Start --> Content isi web --}}

            @if (auth()->user()->level == 'administrator')
                <div class="col-sm-12 col-xl-11 mt-3">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Rekening Pembayaran</h6>
                        <a href="{{route('RekeningPembayaranRetribusi.create')}}"  class="btn btn-primary rounded-pill m-2"><i
                                class='bx bx-plus-medical'></i> Tambah Data </a>
                        <form class="d-none d-md-flex col-2">
                            <input class="form-control border-0" type="search" placeholder="Search">
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">No.</th>
                                    <th class="text-center" scope="col">Jenis Bank</th>
                                    <th class="text-center" scope="col">Nma Pemilik</th>
                                    <th class="text-center" scope="col">Nomor Rekening</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekening as $index => $data)
                                <tr>
                                    <td scope="col" class="text-center">{{ $index + 1 }}.</td>
                                    <td scope="col" class="text-center">
                                        {{ $data->refBank->nama_bank }}</td>
                                    <td scope="col" class="text-center">{{ $data->nama_akun }}</td>
                                    <td scope="col" class="text-center">{{ $data->no_rekening }}</td>
                                    <td scope="col" class="text-center">
                                        <a href="{{ route('RekeningPembayaranRetribusi.edit', $data->id) }}"
                                            class="btn btn-primary btn-sm m-1">Ubah</a>

                                        <form action="{{ route('RekeningPembayaranRetribusi.destroy', $data->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if (auth()->user()->level == 'wajibretribusi')
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Single Line Chart</h6>
                                <canvas id="line-chart" width="526" height="262"
                                    style="display: block; box-sizing: border-box; height: 209.6px; width: 420.8px;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Multiple Line Chart</h6>
                                <canvas id="salse-revenue" width="526" height="262"
                                    style="display: block; box-sizing: border-box; height: 209.6px; width: 420.8px;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Single Bar Chart</h6>
                                <canvas id="bar-chart" width="526" height="262"
                                    style="display: block; box-sizing: border-box; height: 209.6px; width: 420.8px;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Multiple Bar Chart</h6>
                                <canvas id="worldwide-sales" width="526" height="262"
                                    style="display: block; box-sizing: border-box; height: 209.6px; width: 420.8px;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Pie Chart</h6>
                                <canvas id="pie-chart" width="526" height="526"
                                    style="display: block; box-sizing: border-box; height: 420.8px; width: 420.8px;"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Doughnut Chart</h6>
                                <canvas id="doughnut-chart" width="526" height="526"
                                    style="display: block; box-sizing: border-box; height: 420.8px; width: 420.8px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

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


    </div>

    <!-- JavaScript Libraries -->
    <script src=" {{ url('https://code.jquery.com/jquery-3.4.1.min.js') }} "></script>
    <script src=" {{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }} "></script>
    <script src=" {{ url('asset/lib/chart/chart.min.js') }} "></script>
    <script src=" {{ url('asset/lib/easing/easing.min.js') }} "></script>
    <script src=" {{ url('asset/lib/waypoints/waypoints.min.js') }} "></script>
    <script src=" {{ url('asset/lib/owlcarousel/owl.carousel.min.js') }} "></script>
    <script src=" {{ url('asset/lib/tempusdominus/js/moment.min.js') }} "></script>
    <script src=" {{ url('asset/lib/tempusdominus/js/moment-timezone.min.js') }} "></script>
    <script src=" {{ url('asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }} "></script>
    <script src=" {{ url(' https://unpkg.com/boxicons@2.1.4/dist/boxicons.js ') }} "></script>
    <script src=" {{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

    <!-- Template Javascript -->
    <script src=" {{ url('asset/js/main.js') }} "></script>
</body>

</html>
