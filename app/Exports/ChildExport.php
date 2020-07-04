<?php

namespace App\Exports;

use App\Heroes_skill;
use Maatwebsite\Excel\Concerns\FromQuery;

class ChildExport implements FromQuery
{
    public function __construct(int $l, int $p)
    {
        $this->l = $l;
        $this->p = $p;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Heroes_skill::query()->where('heroes_id', $this->l)->orWhere('heroes_id', $this->p);
    }
}
