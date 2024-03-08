<?php
namespace App\Http\Controllers;

use App\Exports\RecordsExport;
use App\Models\Record;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class RequestController extends Controller
{
    public function export() 
    {
        return Excel::download(new RecordsExport, 'users.xlsx');
    }
}