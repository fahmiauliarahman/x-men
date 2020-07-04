<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heroes_skill extends Model
{
    protected $fillable = ['heroes_id', 'nama_skill'];

    public function heroes()
    {
        return $this->belongsTo(Heroes::class);
    }
}
