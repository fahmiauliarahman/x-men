@extends('layouts.master')

@section('konten')
<form action="{{ route('hero.update', ['hero'=>$data->id]) }}" method="post">
    <div class="d-flex">
        <div class="mr-auto p-2">
            <h3>Detail Superhero: {{ $data->nama }}</h3>
        </div>
        <div class="p-2">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
    @csrf
    @method('put')
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td><input type="text" class="form-control" value="{{ $data->id }}"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select name="jenis_kel" id="jenis_kel" class="form-control">
                    <option value="Laki - Laki" @if($data->jenis_kel !== "Perempuan") selected @endif>Laki - Laki
                    </option>
                    <option value="Perempuan" @if($data->jenis_kel === "Perempuan") selected @endif>Perempuan</option>
                </select>
            </td>
        </tr>
    </table>
</form>

<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Keahlian</th>
        <th>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSkill">Tambah
                Baru</button>
        </th>
    </tr>
    @foreach ($data->heroes_skill as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_skill }}</td>
        <td>
            <form action="{{ route('hero_skill.destroy', ['hero_skill'=>$item->id]) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda Yakin? ingin menghapus skill hero ini?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{-- modal add skill --}}

<!-- Modal -->
<div class="modal fade" id="addSkill" tabindex="-1" role="dialog" aria-labelledby="addSkillLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillLabel">Tambah Keahlian Untuk {{ $data->nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('hero_skill.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="hero_token" value="{{ Crypt::encrypt($data->id) }}">
                    <div class="form-group">
                        <label for="nama_skill">Masukkan Keahlian</label>
                        <input type="text" class="form-control" id="nama_skill" name="nama_skill">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection