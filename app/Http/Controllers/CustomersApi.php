<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersApi extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return response()->json($customers);
    }

    public function getOwnCustomer(Request $request, $id){
        $customers = Customer::where('company_id', $id)
                  ->select('id', 'car_plate_number', 'name', 'company_id',)
                  ->get();

        return response()->json($customers); 
        
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_plate_number' => 'required',
            'name' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ]);

        $customer = Customer::create($validatedData);
        return response()->json($customer, 201); // 201 Created status
    }

    public function deleteUpdateRetrofit(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404); 
        }

        $customer->company_id = null;
        $customer->save();

        if ($request->company_id == null) {
            return response()->json($customer);
        }

        $validatedData = $request->validate([
            'car_plate_number' => 'required|max:255',
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $newCustomer = Customer::create($validatedData);
    
        return response()->json($newCustomer);

    }


    public function show(Customer $customer)
    {
        return response()->json($customer);
    }


    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'car_plate_number' => 'required',
            'name' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ]);

        $customer->update($validatedData); 
        return response()->json($customer);    

    }


    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json("Successfully Deleted", 204); // 204 No Content status
    }
}
