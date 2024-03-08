<?php
namespace App\Http\Controllers;

use App\Exports\RecordsExport;
use App\Models\Record;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequestController extends Controller
{
    public function export(Request $request) 
    {
        
        return Excel::download(new RecordsExport, 'customer_data.xlsx');
    }
}