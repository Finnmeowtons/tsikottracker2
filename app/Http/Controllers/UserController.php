<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAuthenticatedUser(Request $request): JsonResponse
    {
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'id' => $user->id,
                // You can include other user details if needed
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401); 
        }
    }

    public function getUserCompanies(Request $request, $userId): JsonResponse
 {
     // Validate user ID (optional, but recommended)
     if (!is_numeric($userId)) {  
         return response()->json([
             'error' => 'Invalid user ID'
         ], 400); // Bad Request
     }

     $user = User::find($userId);  

     if (!$user) {
         return response()->json([
             'error' => 'User not found'
         ], 404); // Not Found
     }

     // Fetch companies with optimized eager loading
     $companies = $user->companies()->with(['offer', 'customers'])->get(); 

     return response()->json([
         'companies' => $companies
     ], 200);
 }
}
