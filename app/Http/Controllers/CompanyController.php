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

    public function getOwnCompany(Request $request, $id){
        $companies = Company::where('owner_id', $id)
                  ->select('id', 'name', 'owner_id', 'invitation_code') // Select specific fields
                  ->get();

        return response()->json($companies); 
        
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'owner_id' => 'nullable|exists:users,id', // Allow null for owner_id
        ]);

        $company = Company::create($validatedData);
        return response()->json([
            'company' => $company,
            'invitation_code' => $company->invitation_code,
            'id' => $company->id
        ], 201);
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
        return response()->json([ 'message' => "Deleted" ]); 
    }

    public function destroyRetrofit(Request $request, $id) {
        $userId = $request->user_id; 

        $company = Company::where('id', $id)
                          ->where('user_id', $userId)
                          ->firstOrFail(); 
    
        $company->delete();
    
        $nextCompany = Company::where('user_id', $userId)->first(); // Replace if needed
    
        if ($nextCompany) {
            return response()->json([ 
                'message' => 'Deleted',
                'nextCompanyId' => $nextCompany->id,
                'navigateToSetup' => false 
        ]);
        } else {
            return response()->json([ 
                'message' => 'Deleted',
                'nextCompanyId' => null,
                'navigateToSetup' => true
        ]);
        }
    } 
}
