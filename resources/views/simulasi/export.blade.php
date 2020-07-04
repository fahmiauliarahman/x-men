{{-- @extends('layouts.master') --}}

{{-- @section('konten') --}}
<h3>Maka Anaknya ({{$get_male->nama . ' & ' . $get_female->nama }}) Kemungkinan Akan Memiliki Keahlian Berikut:</h3>
<table style="border: 1px solid black" cellpadding=10 cellspacing=0>
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
{{-- @endsection --}}