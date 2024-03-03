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
                  ->select('car_plate_number', 'name', 'company_id',)
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
