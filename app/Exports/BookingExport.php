<?php

namespace App\Exports;
use App\Booking;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class BookingExport implements  FromCollection,WithHeadings,ShouldAutoSize,WithEvents,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::select(['tb_cust_name','tb_cust_addr','tb_cust_mobile','tb_cust_email','tb_date','tb_time','tb_kids','tb_adult',
        'tb_reference','tb_category','tb_total','tb_user_name','created_at'])->get();
    }

    public function headings(): array
      {
        return [ 'Name','Address', 'Mobile', 'Email', 'Visit Date','Visit Time', 'Kids','Adults',
          'Reference','Category','Total Amount','User','Booking Date' ];
       }

       public function registerEvents(): array
       {
           return [
               AfterSheet::class    => function(AfterSheet $event) {
                   $cellRange = 'A1:M1'; // All headers
                   $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
               },
           ];
       }


       public function columnFormats(): array
       {
           return [
               'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,               
               'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
               'M' => NumberFormat::FORMAT_DATE_DDMMYYYY,                
               
           ];
       }

}
