<html lang="en">
<head>
 <title>dashboard admin</title>
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
 </style>
 <body>
   <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #ffffff;">
   <a class="navbar-brand btn btn-danger btn-sm" href=" logout" style=" margin-left:auto;">Logout</a>
 </nav>
  <div class="" style="margin:80px;">
<h1>Halaman dashboard admin</h1>

{{-- data penyakit --}}
<hr>
<a class="btn btn-primary btn-sm" href="{{ url('/admin/tambahskt') }}" style="position: absolute; margin-left:220px;">tambah</a>
<h2>Tabel penyakit</h2>
<table class="table table-condensed table-hover table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Gejala</th>
      <th>Penjelasan</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
@foreach ($sakits as $sakit)
  <tr>
    <td>{{ $sakit->namaPenyakit }}</td>
    <td>{{ $sakit->gejala }}</td>
    <td>{{ $sakit->penjelasan }}</td>
    <td>  <form class="" action="{{ url('/admin/hapusskt/'.$sakit->namaPenyakit) }} " method="post">
          <input type="submit" name="submit" value="delete" class="btn btn-danger btn-md">
           {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
          </form></td>
    </tr>
@endforeach
</tbody>
</table>
<br>
{{-- end code data penyakit --}}

{{-- data obat --}}
<hr>
<a class="btn btn-primary btn-sm" href="{{ url('/admin/tambahobt') }}" style="position: absolute; margin-left:180px;">tambah</a>
<h2>Tabel obat</h2>
<table class="table table-condensed table-hover table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Gejala</th>
      <th>Jenis obat</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
@foreach ($obats as $obat)
  <tr>
    <td>{{ $obat->namaObat }}</td>
    <td>{{ $obat->gejala }}</td>
    <td>{{ $obat->jenisObat }}</td>
    <td>  <form class="" action="{{ url('/admin/hapusobat/'.$obat->namaObat) }} " method="post">
          <input type="submit" name="submit" value="delete" class="btn btn-danger btn-md">
           {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
          </form></td>
    </tr>
@endforeach
</tbody>
</table>
<br>
{{-- end code data obat --}}

{{-- data rumah sakit --}}
<hr>
<a class="btn btn-primary btn-sm" href="{{ url('/admin/tambahrs') }}" style="position: absolute; margin-left:300px;">tambah</a>
<h2>Tabel rumah sakit</h2>
<table class="table table-condensed table-hover table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Kota</th>
      <th>Nomor telephone</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
@foreach ($nomers as $nomer)
  <tr>
    <td>{{ $nomer->namaRS }}</td>
    <td>{{ $nomer->kota }}</td>
    <td>{{ $nomer->NmrTlpn }}</td>
    <td>  <form class="" action="{{ url('/admin/hapusrs/'.$nomer->namaRS) }} " method="post">
          <input type="submit" name="submit" value="delete" class="btn btn-danger btn-md">
           {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
          </form></td>
    </tr>
@endforeach
</tbody>
</table>
{{-- end code data rumah sakit --}}

 </div>


 </body>
