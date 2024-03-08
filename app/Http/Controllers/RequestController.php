<?php
namespace App\Http\Controllers;

use App\Exports\RecordsExport;
use App\Models\Record;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class RequestController extends Controller
{
    public function exportRecords()
    {
        // 1. Fetch your records (Adapt this part)
        $records = Record::with(['offers', 'employee'])->get(); 

        // 2. Initiate the download
        return Excel::download(new RecordsExport($records), 'customer_data.xlsx'); 
    }
}