<?php

use Maatwebsite\Excel\Facades\Excel;


namespace App\Exports;
use App\Locker;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use RegistersEventListeners;
use PHPExcel_Style_Border;



class LockerExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Locker::select(['lockerid','name','title','department','lockerno','issued_date','remarks','updated_userid',
        'updated_at'])->get();
    }

    public function headings(): array
      {
        return [ 'Locker ID','Name', 'Job Title', 'Department', 'Locker Number','Issued Date', 'Remarks','Updated User',
          'Last Update'];
       }

       public function registerEvents(): array
       {
        

        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // All headers - set font size to 14
                $cellRange = 'A1:I1'; 
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    
                
            },
        ];
       }

       public static function afterSheet(AfterSheet $event)
    {
        
        
    }


       public function columnFormats(): array
       {
           return [
               
               
               'F' => 'dd-mm-yyyy',
               'I' => 'dd-mm-yyyy'
               
            
               
           ];
       }

}
