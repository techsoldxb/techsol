<?php

namespace App\Exports;

use App\Cashtopup;



use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;



class CashtopupExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cashtopup::select(['topup_dt','topup_amt','bank_name','cheque_no','remarks','emp_name','created_at'])
       ->where('comp_code', auth()->user()->company)
       ->get();
    }

    public function headings(): array
      {
        return [
          'Topup Date','Amount', 'Bank Name', 'Cheque No', 'Remarks','Employee Name', 'Tran Date'];
       }

       public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:G1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'B' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            
        ];
    }


}
