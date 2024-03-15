<?php
namespace App\Exports;

use App\Models\Customer;
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
        return Record::whereHas('customer', function($query) {
            $query->where('name', 'like', '%' . $this->customer_name . '%'); // Note the use of 'like'
    })->get();
    }
}
