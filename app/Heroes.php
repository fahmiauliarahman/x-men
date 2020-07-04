<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heroes extends Model
{
    protected $fillable = ['nama', 'jenis_kel'];
    public function heroes_skill()
    {
        return $this->hasMany(Heroes_skill::class);
    }
}
