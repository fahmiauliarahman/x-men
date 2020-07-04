@extends('simulasi.index')

@section('result')
<h3>Maka Anaknya ({{$get_male->nama . ' & ' . $get_female->nama }}) Kemungkinan Akan Memiliki Keahlian Berikut:</h3>
<table class="table table-bordered">
    <tr>
        <td colspan="2" class="text-center">
            <form action="{{ route('exportpdf') }}" method="post" class="d-inline">
                @csrf
                <input type="hidden" name="hero_male_id" value="{{ $get_male->id }}">
                <input type="hidden" name="hero_female_id" value="{{ $get_female->id }}">
                <button type="submit" class="btn btn-primary">Export PDF</button>
            </form>
            <form action="{{ route('exportexcel') }}" method="post" class="d-inline">
                @csrf
                <input type="hidden" name="hero_male_id" value="{{ $get_male->id }}">
                <input type="hidden" name="hero_female_id" value="{{ $get_female->id }}">
                <button type="submit" class="btn btn-success">Export Excel</button>
            </form>
        </td>
    </tr>
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