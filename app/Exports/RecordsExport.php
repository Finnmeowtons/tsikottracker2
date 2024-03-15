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
            if ($record->customer_id) {
                $data[] = [
                    'customer_name' => $record->customer ? $record->customer->name : '',
                    'customer_car_plate_number' => $record->customer ? $record->customer->car_plate_number : '',
                    'employee_name' => $record->employee ? $record->employee->name : '',
                    'offers' => $record->offers->pluck('name')->implode(', '), 
                    'price' => $record->offers->sum('price'), // Handle empty offers
                    'created_at' => $record->created_at
                ];
            }
        });

        return collect($data); // Return as a collection
    }

    public function headings(): array
    {
        return [
            'Customer Name',
            'Plate Number',
            'Employee Name',
            'Price',
            'Added'
        ];
    }
}
