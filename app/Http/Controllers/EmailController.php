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
            'email' => 'required|email' 
        ]);

        // Excel export
        $filePath = Excel::store(new RecordsExport, 'users_data.xlsx', 'public');
        $recipientEmail = $request -> email;

        Mail::send('emails.email', [], function($message) use ($filePath, $recipientEmail) {
            $message->to($recipientEmail)
                    ->subject('Users Data Excel Report')
                    ->attach(storage_path('app/public/users_data.xlsx'));  
        });

        return response()->json([
            'message' => 'Excel report sent successfully!'
        ]);
    }
}
