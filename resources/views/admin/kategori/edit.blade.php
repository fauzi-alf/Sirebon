<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container-fluid">

        <a href="{{route('KategoriRetribusi.index')}}" class="btn btn-danger btn-sm py-2 mt-1 " type="submit"><i class='bx bx-arrow-back'></i>Kembali</a>
        <main class="form-signin w-25 m-auto mt-4">
            <div class="card p-3 m-2 ">

                <form method="post" action="{{route('KategoriRetribusi.update', $kategori->id)}}"> 
                    @csrf
                    @method('PUT')
                  <h1 class="h3 mb-3 fw-normal">Edit Kategori</h1>
              
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{$kategori->kategori}}" name="kategori" placeholder="Kategori 10">
                    <label for="floatingInput">Kategori Retribusi</label>
                  </div> 
                  
                  <button class="btn btn-primary w-50 py-2 " type="submit">Simpan</button>
<br>
                </form>
            </div>
            <p class=" text-body-secondary ">2024 &copy; SiRepal. Dinas Komunikasi, Informatika & Statistik.</p>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>