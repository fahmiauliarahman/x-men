@extends('layouts.master')

@section('konten')
<div class="d-flex">
    <div class="mr-auto p-2">
        <h3>Daftar Superhero</h3>
    </div>
    <div class="p-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHero">Tambah Baru</button>
    </div>
</div>

<table class="table table-bordered display" id="hero">
    <thead>
        <tr class="text-center">
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($collection as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis_kel }}</td>
            <td>
                <a href="{{ route('hero.show', ['hero'=>$item->id]) }}" class="btn btn-primary">View Detail</a>
                <form action="{{ route('hero.destroy', ['hero'=>$item->id]) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda Yakin? ingin menghapus hero ini? Semua Skill Nya Juga Akan Terhapus!')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Data Tidak Ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="addHero" tabindex="-1" role="dialog" aria-labelledby="addHeroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHeroLabel">Tambah Hero Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('hero.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Masukkan Nama</label>
                        <input type="text" autofocus class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kel">Masukkan Jenis Kelamin</label>
                        <select name="jenis_kel" id="jenis_kel" class="form-control">
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
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

@section('js')
<script>
    $(document).ready( function () {
    $('#hero').DataTable();
} );
</script>
@endsection