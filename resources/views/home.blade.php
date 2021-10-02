<!DOCTYPE html>
<html lang="en">
<head>
 <title>SiPPP</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style>
body, html {
    height: 100%;
    margin: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
footer {
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: white;
}
</style>

</head>
<body background="img/bg.png">
  <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #ffffff;">
  <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="Logo" style="width:40px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#penyakit">Cari tahu penyakit</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#obat">Cari obat</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#kontak">Kontak rumah sakit</a>
    </li>
  </ul>
</div>
</nav>

{{-- cari penyakit --}}
<div class="container" style="margin-top: 100px;" id="penyakit">
  <div class="jumbotron" style="padding-top: 30px; padding-bottom: 30px; max-width: 500px;">
    <h4>Cari tahu penyakitmu disini!</h4>
    {{-- <img src="img/penyakit.png" style="position: absolute; width:170px; margin-left:200px;"> --}}
        <img src="img/penyakit.png" style="float:right; width:170px; ">
     <br>
     <form class="" action="{{ url('/selectGejala') }} " method="post">
    Gejala :
    <select name="sakitdd1">
      @foreach ($sakitdd as $sakit)
        <option>{{ $sakit}}</option>
      @endforeach
    </select>
    <br><br>
    Gejala :
    <select name="sakitdd2">
      @foreach ($sakitdd as $sakit)
        <option>{{ $sakit}}</option>
      @endforeach
    </select>
    <br><br>
    Gejala :
    <select name="sakitdd3">
      @foreach ($sakitdd as $sakit)
        <option>{{ $sakit}}</option>
      @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-success btn-block" style="margin-top: 50px;">Cari</button>
    {{ csrf_field() }}
    </form>
  </div>
</div>

{{-- tabel penyakit --}}
@if ($condition)
<div class="container">
  <div class="jumbotron" style="padding-top: 30px; padding-bottom: 30px;">
    @if ($max)
      <h5>Tolong pilih gejala terlebih dahulu</h5>
    @elseif ($sakits->count() > 0)
  <h2>Penyakit terdeteksi </h2>
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>Nama Penyakit</th>
        <th>Penjelasan</th>
        <th>Gejala</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sakits as $sakit)
        <tr>
          <td>{{ $sakit->namaPenyakit }}</td>
          <td>{{ $sakit->penjelasan }}</td>
          <td>{{ $sakit->gejala }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <h5>Data penyakit tidak ada yang sesuai dengan pencarian</h5>
      @endif
      @endif
  </div>
</div>

{{-- cari obat --}}
<div class="container" style="margin-top: 50px;" id="obat">
  <div class="jumbotron" style="padding-top: 30px; padding-bottom: 30px; max-width: 500px;">
    <h4>Cari obat</h4>
    {{-- <img src="img/obat.png" style="position: absolute; width:170px; margin-left:200px;"> --}}
    <img src="img/obat.png" style="float:right; width:170px;">
     <br>
    <form class="" action="{{ url('/selectGejala2') }} " method="post">
    Gejala :
    <select name="obatdd">
      @foreach ($obatdd as $obad)
        <option>{{ $obad}}</option>
      @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-success btn-block" style="margin-top: 50px;">Cari</button>
    {{ csrf_field() }}
    </form>
  </div>
</div>

{{-- tabel obat --}}
@if ($obats->count() > 0)
<div class="container">
  <div class="jumbotron" style="padding-top: 30px; padding-bottom: 30px;">
  <h2>Penyakit terdeteksi </h2>
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>Nama Obat</th>
        <th>Gejala</th>
        <th>Jenis Obat</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($obats as $obat)
        <tr>
          <td>{{ $obat->namaObat }}</td>
          <td>{{ $obat->gejala }}</td>
          <td>{{ $obat->jenisObat }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
      @endif
  </div>
</div>

{{-- cari nomer telpon --}}
<div class="container" style="margin-top: 50px;" id="kontak">
  <div class="jumbotron" style="padding-top: 30px; padding-bottom: 30px; max-width: 500px;">
  {{-- <img src="img/hospital.png" style="position: absolute; width:170px; margin-left:200px; margin-top:40px;"> --}}
  <h4>Bila penyakit parah, hubungi Rumah sakit sekarang!</h4>
    <img src="img/hospital.png" style="float:right; width:170px;">
         <br>
     <form class="" action="{{ url('/selectKota') }} " method="post">
    Kota :
    <select name="kota">
      @foreach ($nomerdd as $nomer)
        <option>{{ $nomer->kota}}</option>
      @endforeach
    </select>
    <br><br>
    <button type="submit" class="btn btn-success btn-block" style="margin-top: 50px;">Cari</button>
    {{ csrf_field() }}
    </form>
  </div>
</div>

{{-- tabel nomer telephone --}}
@if ($nomers->count() > 0))
<div class="container">
  <div class="jumbotron" style="padding-top: 30px; padding-bottom: 30px;">
  <h2>Rumah sakit</h2>
  <p>daftar rumah sakit yang tersedia di kota {{ $nomers->first()->kota }} </p>
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Nomor telephone</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($nomers as $value)
        <tr>
          <td>{{ $value->namaRS }}</td>
          <td>{{ $value->NmrTlpn }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
@endif

<footer>
<label>Jangan takut rugi untuk berkonsultasi dengan dokter, kesehatan tak ternilai harganya </label>
<a href=" login" style="color:#edeaf2;  text-align: right; float: right;"> are you admin ? </a>
</footer>
</body>
</html>
