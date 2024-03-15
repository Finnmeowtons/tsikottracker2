<?php
namespace App\Exports;

use App\Models\Customer;
use App\Models\Record;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordsExport implements FromCollection, WithHeadings
{
    protected $customer_name;

    public function __construct($customer_name)
    {
        $this->customer_name = $customer_name;
    }
    public function collection()
    {
        $data = []; // Array to hold our formatted data
        Record::whereHas('customer', function($query) {
        $decodedName = str_replace('+', ' ', $this->customer_name);
            $query->where('name', $decodedName)
            ->orWhere('car_plate_number', $decodedName);
        })->cursor()->each(function (Record $record) use (&$data) {
            if ($record->customer_id || $record->company_id) {
                $data[] = [
                    'company_name' => $record->company->name,
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
