<?php

namespace App\Http\Controllers;

use App\Sanc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;

class SanctionsExport implements FromCollection
{
    use Exportable;

    public $fromdate = null;
    public $todate = null;

    public function __construct($fromdate, $todate)
    {
        $this->fromdate = $fromdate;
        $this->todate = $todate;
    }   

    public function collection()
    {
        $fromdate = $this->fromdate;
        $todate = $this->todate;
        return Sanc::all()->filter(function ($value, $key) use ($fromdate, $todate){
            $date = Carbon::createFromFormat('d/m/Y' ,Carbon::createFromFormat('d/m/Y H:i', $value->start_time)->format('d/m/Y'));
            return $fromdate->lte($date) && $date->lte($todate);
        }); ;
    }
}

?>