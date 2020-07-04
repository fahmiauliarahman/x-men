@extends('layouts.master')
@php
$hero_male_id = $hero_male_id ?? '';
$hero_female_id = $hero_female_id ?? '';
@endphp
@section('konten')
<form action="" method="post">
    <div class="d-flex">
        <div class="mr-auto p-2">
            <h3>Simulasi Jika Hero Menikah</h3>
        </div>
        <div class="p-2">
            <button type="submit" class="btn btn-primary">Proses</button>
        </div>
    </div>
    @csrf
    <table class="table table-bordered">
        <tr>
            <td>Suami</td>
            <td>
                <select name="hero_male" id="hero_male" class="form-control" required>
                    <option>---Pilih---</option>
                    @foreach ($hero_male as $item)
                    @if ($get_male ?? '')
                    <option value="{{ $item->id }}" @if($item->id === $get_male->id) selected @endif>{{ $item->nama }}
                    </option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Istri</td>
            <td>
                <select name="hero_female" id="hero_female" class="form-control" required>
                    <option>---Pilih---</option>
                    @foreach ($hero_female as $item)
                    @if ($get_female ?? '')
                    <option value="{{ $item->id }}" @if($item->id === $get_female->id) selected @endif>{{ $item->nama }}
                    </option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
</form>
@yield('result')
@endsection