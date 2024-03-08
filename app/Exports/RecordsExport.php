<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection; // Add this line
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordsExport implements FromCollection, WithHeadings
{
    private $records; // To hold your records

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        $data = []; // Initialize an array to hold Excel data

        foreach ($this->records as $record) {
            $offersData = $record->offers->pluck('name', 'price', 'type')->toArray();

            $data[] = [ 
                'offers' => json_encode($offersData), // Or format how you like
                'employee_name' => $record->employee->name ? $record->employee->name : 'N/A',
                'created_at' => $record->created_at,
            ];
        }

        return collect($data); // Return as a collection
    }

    public function headings(): array
    {
        return [
            'offers',
            'employee_name',
            'created_at',
            // ... more headers if needed
        ];
    }
}
