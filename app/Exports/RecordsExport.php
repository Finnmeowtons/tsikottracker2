<?php
namespace App\Exports;

use App\Models\Record;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class RecordsExport implements FromCollection
{
    protected $customer_name;

    public function __construct($customer_name)
    {
        $this->customer_name = $customer_name;
    }
    public function collection()
    {
        return Record::where('customer_name', $this->customer_name)->get();
    }
}
