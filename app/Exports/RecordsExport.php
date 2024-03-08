<?php
namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromCollection; // Add this line
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordsExport implements FromCollection
{
    public function collection()
    {
        return Record::all();
    }
}
