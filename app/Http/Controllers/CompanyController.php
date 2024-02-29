<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{

    public function get(){
        $companies = Company::get();
        return view('settings', compact('companies'));
    }

    public function index(){
        $companies = Company::with('owner')->get();
        return response()->json($companies);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'owner_id' => 'nullable|exists:users,id', // Allow null for owner_id
        ]);

        $company = Company::create($validatedData);
        return response()->json($company, 201); // 201 Created status
    }

    public function show(Company $company){
        return response()->json($company->load('owner')); // Load owner relationship
    }

    public function update(Request $request, Company $company){
        $validatedData = $request->validate([
            'name' => [
                'required', 
                'max:255',
                Rule::unique('companies')->ignore($company->id),
            ],
            'owner_id' => 'nullable|exists:users,id',
        ]);

        $company->update($validatedData);
        return response()->json($company);
    }

    public function destroy(Company $company){
        $company->delete();
        return response()->json(null, 204); // 204 No Content status
    }
}