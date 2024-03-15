<?php

namespace App\Http\Controllers;

use App\Exports\RecordsExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EmailController extends Controller
{
    public function sendExcelReport(Request $request, $customer_name)
    {
        $request->validate([
            'email' => 'required|email' 
        ]);


        Excel::store(new RecordsExport($customer_name), 'users_data.xlsx', 'public');
        $recipientEmail = $request -> email;

        Mail::send('emails.email', [], function($message) use ($recipientEmail) {
            $message->to($recipientEmail)
                    ->subject('Test')
                    ->attach(storage_path('app/public/users_data.xlsx'));  
        });

        return response()->json([
            'message' => 'Excel report sent successfully!'
        ]);
    }
}
