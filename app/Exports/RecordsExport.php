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
        $data = []; // Array to hold our formatted data

        Record::cursor()->each(function (Record $record) use (&$data) {
                $data[] = [
                    'customer_name' => $record->customer ? $record->customer->name : 'No Customer',
                    'employee_name' => $record->employee->name,
                'price' => $record->offers->price, // Assuming offers relationship is valid
                'created_at' => $record->created_at
                ];
            
        });

        return collect($data); // Return as a collection
    }

    public function headings(): array
    {
        return [
            'customer_name'
        ];
    }
}
