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
        $companyName = $request->get('companyName'); 
        $contactName = $request->get('contactName');

        // Filter records based on companyName and contactName
        $records = Record::with(['offers', 'employee'])
                         ->whereHas('customer', function($query) use ($companyName, $contactName) {
                             $query->where('company_name', 'like', '%' . $companyName . '%') 
                                   ->where('customer_name', 'like', '%' . $contactName . '%');
                         })
                         ->get(); 
        return Excel::download(new RecordsExport, 'customer_data.xlsx');
    }
}