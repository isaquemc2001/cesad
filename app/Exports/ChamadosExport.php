<?php

namespace App\Exports;

use App\AppChamado;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChamadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AppChamado::all();
    }
}
