<?php
namespace App\Exports;

use App\Models\Customer;
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
        return Customer::where('name', $this->name)->get();
    }
}
