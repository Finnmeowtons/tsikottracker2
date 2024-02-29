<?php

namespace App\Http\Controllers;

use App\Models\UserCompanyRelationship;
use Illuminate\Http\Request;

class UserCompanyRelationshipController extends Controller
{
    public function index()
    {
        $userCompanyRelationships = UserCompanyRelationship::get();
        return response()->json($userCompanyRelationships);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'role' => 'required',
            'company_id' => 'required|exists:companies,id'
        ]);

        $userCompanyRelationship = UserCompanyRelationship::create($validatedData);
        return response()->json($userCompanyRelationship, 201); // 201 Created status
    }
}
