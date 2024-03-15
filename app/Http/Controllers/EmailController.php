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
        $request->validate([
            'email' => 'required|email',
            'customer_name' => 'required'
        ]);
        $customerName = $request->customer_name;
        $recipientEmail = $request->email; 


        Excel::store(new RecordsExport($customerName), 'users_data.xlsx', 'public');

        Mail::send('emails.email', [], function($message) use ($recipientEmail) {
            $message->to($recipientEmail)
                    ->subject('Test')
                    ->attach(storage_path('app/public/users_data.xlsx'));  
        });

    }
}
