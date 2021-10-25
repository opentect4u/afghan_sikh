<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonationExport implements FromCollection
{
    protected $data;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data)
    {
        $this->data = $data;
    }
  
    public function collection()
    {
        return collect($this->data);
    }

    public function headings() :array
    {
        // return [
        //     'Sl No',
        //     'Name',
        //     'Family Member Name',
        //     'Type of Amount',
        //     'Amount',
        //     'Date of Payment',
        // ];
        return [
            'ID',
            'Name',
            'Email',
        ];
    }
}
