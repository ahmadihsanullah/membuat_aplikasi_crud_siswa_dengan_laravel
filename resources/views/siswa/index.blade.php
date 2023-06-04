@extends('siswa.layout')

@section('aksi-siswa')
    <button type="button" class="btn btn-primary justify-content-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data Siswa
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="siswa/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="agama">
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" aria-label="Default select example" name="kelas">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="row">
        <div class="mt-2">
        </div>
        <table class="table table-striped table-hover">
            <tr>
                <thead>
                    <th>NAMA LENGKAP</th>
                    <th>JENIS KELAMIN</th>
                    <th>AGAMA</th>
                    <th>KELAS</th>
                    <th>AKSI</th>
                </thead>
            </tr>
            @foreach ($data_siswa as $siswa)
                <tr>
                    <tbody>
                        <td>{{ $siswa->nama_lengkap }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>{{ $siswa->agama }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>
                            <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">edit</a>
                            <form onclick="return confirm('Apakah kamu yakin akan menghapus siswa dengan id {{$siswa->id}}?')" method="POST" action="/siswa/{{$siswa->id}}/delete" style="display:inline">
                                @csrf
                                @method("DELETE")
                                <button  class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tbody>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
