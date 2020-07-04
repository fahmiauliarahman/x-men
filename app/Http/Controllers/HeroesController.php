<?php

namespace App\Http\Controllers;

use App\Heroes;
use App\Heroes_skill;
use Illuminate\Http\Request;

class HeroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "X-MEN";
        $collection = Heroes::all();
        // ->with(session()->flash('success', 'Task was successful!'))
        return view('heroes.index', compact('judul', 'collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Heroes::create($request->all());
        return redirect()->route('heroes.index')->with('success', 'Hero Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = "X-MEN";
        $data = Heroes::with('heroes_skill')->where('id', $id)->first();
        // dd($data->heroes_skill);
        return view('heroes.show', compact('data', 'judul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Heroes::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'jenis_kel' => $request->jenis_kel,
            ]);
        return redirect()->back()->with('success', 'Hero Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Heroes::where('id', $id)->delete();
        $skill = Heroes_skill::where('heroes_id', $id)->delete();
        return redirect()->route('heroes.index')->with('success', 'Hero Berhasil Dihapus!');
    }

    // public function simulasi()
    // {
    //     $judul = 'Simulasi';
    //     $hero_male = Heroes::where('jenis_kel', 'Laki - Laki')->get();
    //     $hero_female = Heroes::where('jenis_kel', 'Perempuan')->get();
    //     return view('simulasi.index', compact('judul', 'hero_male', 'hero_female'));
    // }

    public function simulasi(Request $request)
    {
        // dd(count($request->all()));
        $judul = 'Simulasi';
        $hero_male = Heroes::where('jenis_kel', 'Laki - Laki')->get();
        $hero_female = Heroes::where('jenis_kel', 'Perempuan')->get();
        if (count($request->all()) === 3) {
            $hero_male_id = $request->hero_male;
            $hero_female_id = $request->hero_female;
            $get_male = Heroes::where('id', $hero_male_id)->first();
            $get_female = Heroes::where('id', $hero_female_id)->first();
            if ($get_male->jenis_kel === "Laki - Laki" && $get_female->jenis_kel === "Perempuan") {
                $a1 = Heroes_skill::where('heroes_id', $hero_male_id)->get()->toArray();
                $a2 = Heroes_skill::where('heroes_id', $hero_female_id)->get()->toArray();
                $child_skill = array_merge($a1, $a2);
                // dd($child_skill);
                return view('simulasi.result', compact('child_skill', 'judul', 'hero_male', 'hero_female', 'get_male', 'get_female'));
            } else {
                return redirect()->back()->with('error', 'Invalid Request! Masa jeruk makan jeruk...');
            }
        } elseif (count($request->all()) !== 0) {
            return redirect()->back()->with('error', 'Harap Masukkan Suami & Istri');
        }
        return view('simulasi.index', compact('judul', 'hero_male', 'hero_female'));
    }
}
