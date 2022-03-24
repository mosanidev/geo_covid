<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Detail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }

  .div-row-1 {
    padding: 0px 10%;
  }

  .div-row-2 {
    padding: 0px 30%;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <p class="navbar-brand text-center">Detail Individu</p>
    </div>
  </div>
</nav>
<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Biodata</h3>
  <img src="{{ asset('storage/images/'.$foto) }}" class="img-responsive img-circle margin" style="display:inline" width="350" height="350">
  <div class="row">
    <div class="col-sm-3">
      <p class="h4">Nama</p>
      <p>{{$nama}}</p>
    </div>
    <div class="col-sm-2">
      <p class="h4">Jenis</p>
      <p>{{$jenis}}</p>
    </div>
    <div class="col-sm-3">
      <p class="h4">No KTP</p>
      <p>{{$no_ktp}}</p>
    </div>
    <div class="col-sm-4">
      <p class="h4">Alamat</p>
      <p>{{$alamat}}</p>
    </div>
  </div>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Lokasi Karantina</h3>
    <div class="row div-row-2">
      <div class="text-left col-sm-6">
        <p>Provinsi</p>
        <p>Kabupaten/Kota</p>
      </div>
      <div class="text-center col-sm-6">
        <p>{{$provinsi}}</p>
        <p>{{$kabupaten_kota}}</p>
      </div>
    </div>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <div class="row div-row-1">
    <div class="col-sm-6">
      <p>Keluhan Sakit</p>
      <p class="text-justify"> {{ $keluhan_sakit }} </p>
    </div>
    <div class="col-sm-6"> 
      <p>Riwayat Perjalanan</p>
      <p class="text-justify">{{ $riwayat_perjalanan }}</p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p> 
</footer>

</body>
</html>