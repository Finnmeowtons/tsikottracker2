<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function processRequest(Request $request)
    {
        // 1. Validation
        $validator = Validator::make($request->all(), [
            'contactName' => 'required|string',
            'companyName' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator); // Or custom error response
        }

        $customer = Customer::where('company_name', $request->companyName)
                            ->where('customer_name', $request->contactName)
                            ->first();

        if (!$customer) {
            // Handle customer not found ...
        }

        // 2. Fetch Records
        $records = Record::where('customer_id', $customer->id)->get();

        // 3. Excel Generation (Spout)
        $writer = Writer::createXLSXWriter(); 
        $filePath = 'customer_data.xlsx';
        $writer->openToFile($filePath);

        // ... Add data to Excel (rows, headers, etc.) ...

        $writer->close();

        // 4. Send Email with Attachment
        Mail::to('recipient@gmail.com')->send(new CustomerDataMail($filePath));

        // ... Success Response ... 
    }
    
}
