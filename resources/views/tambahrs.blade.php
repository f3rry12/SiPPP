@extends('layouts.admins')
@section('title','Tambah nomer telephone RS')
@section('content')

  @if(count($errors)>0)
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

<h1> Tambah data Rumah sakit </h1> <br>
<form action="{{ url('/rspost') }}" method="post">
  <div class="form-group">
      <label for="Username">Nama Rumah sakit:</label>
      <input type="text" class="form-control" id="namaRS" name="namaRS" value="{{ old('namaRS') }}" required maxlength="99">
  </div>
  <div class="form-group">
      <label for="Kota">Kota:</label>
      <input type="text" class="form-control" id="kota" name="kota" value="{{ old('kota') }}" required maxlength="99">
  </div>
  <div class="form-group">
      <label for="telephone">Nomer telephone:</label>
      <input type="number" class="form-control" id="NmrTlpn" name="NmrTlpn" value="{{ old('NmrTlpn') }}" required maxlength="12">
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-md btn-primary">Submit</button>
      <button type="reset" class="btn btn-md btn-danger">Cancel</button>
  </div>
  {{csrf_field()}}
</form>
@endsection
