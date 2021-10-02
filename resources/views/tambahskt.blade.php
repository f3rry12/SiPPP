@extends('layouts.admins')
@section('title','Tambah data penyakit')
@section('content')

  @if(count($errors)>0)
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

<h1> Tambah data Penyakit </h1> <br>
<form action="{{ url('/sktpost') }}" method="post">
  <div class="form-group">
      <label for="Username">Nama Penyakit:</label>
      <input type="text" class="form-control" id="namaPenyakit" name="namaPenyakit" value="{{ old('namaPenyakit') }}" required maxlength="99">
  </div>
  <div class="form-group">
      <label for="Kota">Gejala:</label>
      <h6 style="color:red">*Setiap gejala dipisah dengan spasi</h6>
      <input type="textarea" class="form-control" id="gejala" name="gejala" value="{{ old('gejala') }}" required maxlength="250">
  </div>
  <div class="form-group">
      <label for="telephone">Penjelasan:</label>
      <input type="textarea" class="form-control" id="penjelasan" name="penjelasan" value="{{ old('penjelasan') }}" maxlength="250">
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-md btn-primary">Submit</button>
      <button type="reset" class="btn btn-md btn-danger">Cancel</button>
  </div>
  {{csrf_field()}}
</form>
@endsection
