<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordsApi extends Controller
{
    public function index()
    {
        $records = Record::get();
        return response()->json($records);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'service_product_id' => 'required|exists:offers,id', 
            'price' => 'nullable|numeric|min:0', 
            'date' => 'date_format:Y-m-d h:i:s|nullable',
            'company_id' => 'required|exists:companies,id',
            'notes' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $record = Record::create($validatedData);
        return response()->json($record, 201); // 201 Created status
    }

    public function show(Record $record)
    {
        return response()->json($record); 
    }

    public function update(Request $request, Record $record)
    {
        $validatedData = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'service_product_id' => 'required|exists:offers,id',
            'price' => 'nullable|numeric|min:0',
            'date' => 'date_format:Y-m-d h:i:s|nullable',
            'company_id' => 'required|exists:companies,id',
            'notes' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $record->update($validatedData); 
        return response()->json($record);    

    }

    public function destroy(Record $record)
    {
        $record->delete();

        return response()->json("Successfully Deleted", 204); // 204 No Content status
    }
}
