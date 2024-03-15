<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Excel;

class EmailController extends Controller
{
    public function sendExcelReport(Request $request)
    {
        $request->validate([
            'email' => 'required|email' 
        ]);

        $data = User::all(); // Get data from your database

        Excel::create('database_export', function ($excel) use ($data) {
            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->store('xlsx', public_path('exports'));

        $filePath = public_path('exports/database_export.xlsx');
        $recipient = $request->input('email');

        Mail::send([], [], function($message) use ($filePath, $recipient) {
            $message->to($recipient)
                    ->subject('Database Export')
                    ->setBody('Hello, Please find the attached database export. Regards, Your Application Name') // Plain text message body
                    ->attach($filePath); 
        });
    }
}
