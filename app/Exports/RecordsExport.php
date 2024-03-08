<?php
namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromCollection; // Add this line
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordsExport implements FromCollection
{
    public function collection()
    {
        $records = Record::with(['offers', 'employee'])->get(); 

        $data = $records->map(function($record) {
            return [
                'employee_name' => $record->employee ? $record->employee->name : 'N/A',
                'offers' => $this->formatOffers($record->offers), 
                'created_at' => $record->created_at->format('Y-m-d'), // Customize date format if needed 
            ];
        });

        return $data; 
    }

    public function headings(): array
    {
        return [
            'employee_name',
            'offers',
            'created_at',
        ];
    }

    private function formatOffers($offers) 
    {
        // Logic to format your offers data into a suitable string for a single cell
        $offerStrings = $offers->map(function ($offer) {
            return $offer->name . ' - ' . $offer->price; // Example
        });

        return $offerStrings->implode(', '); // Join offer strings with commas
    }
}
