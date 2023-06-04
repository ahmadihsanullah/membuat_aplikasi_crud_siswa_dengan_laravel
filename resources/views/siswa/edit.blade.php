@extends('siswa.layout')
@section('aksi-siswa')
    <a href={{route("siswa")}} class="btn btn-success">kembali </a>
@endsection

@section('content')
    <form action="/siswa/{{$siswa->id}}/update" method="POST">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$siswa->nama_lengkap}}">
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" >
                <option value="L" @if($siswa->jenis_kelamin == "L") selected @endif>Laki-laki</option>
                <option value="P" @if($siswa->jenis_kelamin == "P") selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" aria-label="Default select example" name="agama" value="{{$siswa->agama}}"> 
                <option value="Islam" @if($siswa->agama == "Islam") selected @endif>Islam</option>
                <option value="Katolik" @if($siswa->agama == "Katolik") selected @endif>Katolik</option>
                <option value="Protestan" @if($siswa->agama == "Protestan") selected @endif>Protestan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" aria-label="Default select example" name="kelas" value="{{$siswa->kelas}}">
                <option value="1"  @if($siswa->kelas == "1") selected @endif>1</option>
                <option value="2"  @if($siswa->kelas == "2") selected @endif>2</option>
                <option value="3"  @if($siswa->kelas == "3") selected @endif>3</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
