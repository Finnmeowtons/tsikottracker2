<?php

namespace App\Http\Controllers;

use App\Exports\RecordsExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EmailController extends Controller
{
    public function sendExcelReport(Request $request)
    {
        return Excel::download(new RecordsExport, 'users.xlsx');
    }
}
