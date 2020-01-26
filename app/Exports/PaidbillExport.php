<?php

namespace App\Exports;
use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;



class PaidbillExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Account::select(['th_tran_no','created_at','th_supp_name','th_bill_dt','th_bill_no',
        'th_bill_amt','th_purpose','th_emp_name','th_pay_name','th_pay_remarks','th_exp_cat_name'])
       ->where('th_comp_code', auth()->user()->company)->where('th_pay_status', 1)
       ->get();
    }

    public function headings(): array
    {
       
      return [
        'Transaction No','Transaction Date', 'Supplier Name', 'Bill Date', 'Bill Number', 'Bill Amount','Justification','Employee Name','Paid By','Payment Remarks','Category'];
        
     }

     public function registerEvents(): array
  {
      return [
          AfterSheet::class    => function(AfterSheet $event) {
              $cellRange = 'A1:K1'; // All headers
              $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
              
              
          },
      ];
  }

  public function columnFormats(): array
  {
      return [
          
          'B' => 'dd-mm-yyyy',
          'F' => '0.000',          
          
      ];
  }





}
