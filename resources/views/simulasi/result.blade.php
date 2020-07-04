@extends('simulasi.index')

@section('result')
<h3>Maka Anaknya ({{$get_male->nama . ' & ' . $get_female->nama }}) Kemungkinan Akan Memiliki Keahlian Berikut:</h3>
<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Keahlian</th>
    </tr>
    @forelse ($child_skill as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item['nama_skill'] }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="2" class="text-center">Suami & Istri Belum Memiliki Keahlian</td>
    </tr>
    @endforelse
</table>
@endsection