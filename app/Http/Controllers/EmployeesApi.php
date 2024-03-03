<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeesApi extends Controller
{
    
    public function index()
    {
        $employees = Employee::with('company')->get();
        return response()->json($employees); 
    }

    public function getOwnEmployee(Request $request, $id){
        $offers = Employee::where('company_id', $id)
                  ->select('id', 'name', 'contact_details', 'position')
                  ->get();

        return response()->json($offers); 
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'contact_details' => 'nullable',
            'position' => 'required',
            'company_id' => 'required|exists:companies,id', 
        ]);

        $employee = Employee::create($validatedData);
        return response()->json($employee, 201); // 201 Created status
    }

    
    public function show(Employee $employee)
    {
        return response()->json($employee->load('company'));
    }


    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'contact_details' => 'nullable',
            'position' => 'required',
            'company_id' => 'required|exists:companies,id', 
        ]);

        $employee->update($validatedData);
        return response()->json($employee);
    }



    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(null, 204); // 204 No Content status
    }
}
