<?php

namespace App\Http\Controllers;

use App\Heroes_skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;



class Heroes_SkillController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $heroes_id = Crypt::decrypt($request->hero_token);
        } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid Hero Token!');
        };
        $request->validate([
            'nama_skill' => 'bail|required|max:255',
        ]);
        Heroes_skill::create(['heroes_id' => $heroes_id, 'nama_skill' => $request->nama_skill]);
        return redirect()->back()->with('success', 'Skill Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Heroes_skill::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Skill Berhasil Dihapus!');
    }
}
