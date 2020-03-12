<?php

namespace App\Exports;

use App\Survey;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurveyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Survey::all();
    }
}
