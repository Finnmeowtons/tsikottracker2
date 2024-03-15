<?php
namespace App\Exports;

use App\Models\Record;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class RecordsExport implements FromCollection
{
    protected $name;

    public function __construct($customer_name)
    {
        $this->name = $customer_name;
    }
    public function collection()
    {
        return Record::where('customer_name', $this->name)->get();
    }
}
