<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Offer;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RecordsApi extends Controller
{
    public function index()
    {
        $records = Record::get();
        return response()->json($records);
    }

    public function getOwnRecord(Request $request, $id)
    {
        $records = Record::where('company_id', $id)
            ->with(['customer', 'offers', 'employee'])
            ->get();

        $formattedRecords = $records->map(function ($record) {
            $offersData = $record->offers->map(function ($offer) { // Iterate offers
                return [
                    'offer_id' => $offer->id,
                    'offer' => $offer->name,
                    'offer_price' => $offer->price,
                    'type' => $offer->type,
                    'company_id' => $offer->company_id
                ];
            });
            return [
                'customer_name' => $record->customer->name,
                'customer_car_plate_number' => $record->customer->car_plate_number,
                'company_id' => $record->company_id,
                'notes' => $record->notes,
                'employee_id' => $record->employee_id,
                'employee_name' => $record->employee ? $record->employee->name : null,
                'employee_position' => $record->employee ? $record->employee->position : null,
                'id' => $record->id,
                'time' => $record->created_at,
                'offers' => $offersData
            ];
        });

        return response()->json($formattedRecords);
    }

    public function storeRetrofit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'customer_name' => 'nullable',
                'customer_car_plate_number' => 'required',
                'notes' => 'nullable',
                'employee_name' => 'nullable|max:255',
                'employee_position' => 'nullable|max:255',
                'company_id' => 'required'
            ]);

            $customer = Customer::firstOrCreate([
                'name' => $request->customer_name,
                'car_plate_number' => $request->customer_car_plate_number,
                'company_id' => $request->company_id

            ]);


            if (
                $request->has('employee_name') && $request->has('employee_position') &&
                !empty($request->employee_name) && !empty($request->employee_position)
            ) {

                // First, attempt to find an existing employee
                $employee = Employee::where([
                    'name' => $request->employee_name,
                    'position' => $request->employee_position,
                    'company_id' => $request->company_id,
                ])->first();

                // If an existing employee isn't found, create a new one
                if (!$employee) {
                    $employee = Employee::create([
                        'name' => $request->employee_name,
                        'position' => $request->employee_position,
                        'company_id' => $request->company_id
                    ]);
                }

                $validatedData['employee_id'] = $employee->id;
            }

            $validatedData['customer_id'] = $customer->id;

            $record = Record::create($validatedData);

            $offersData = $request->get('offers');
            foreach ($offersData as $offerData) {
                // Attempt to find an existing offer with matching price
                $existingOffer = Offer::where([
                    'name' => $offerData['name'],
                    'type' => $offerData['type'],
                    'price' => $offerData['price'],
                    'company_id' => $request->company_id,
                ])->first();

                if ($existingOffer) {
                    $offer = $existingOffer; // Reuse the existing offer
                } else {
                    // Check for existing offer (same name, type, different price)
                    $oldOfferToRetire = Offer::where([
                        'name' => $offerData['name'],
                        'type' => $offerData['type'],
                        'company_id' => $request->company_id,
                    ])->where('price', '!=', $offerData['price'])->first(); // Different price

                    if ($oldOfferToRetire) {
                        $oldOfferToRetire->company_id = null;
                        $oldOfferToRetire->save();
                    }

                    // Create a new offer
                    $offer = Offer::create([
                        'name' => $offerData['name'],
                        'price' => $offerData['price'],
                        'type' => $offerData['type'],
                        'company_id' => $request->company_id
                    ]);
                }

                $record->offers()->attach($offer->id); // Attach (new or existing)
            }

            return response()->json($record, 201);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->validator->getMessageBag()
            ], 422);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'service_product_id' => 'required|exists:offers,id',
            'date' => 'date_format:Y-m-d h:i:s|nullable',
            'company_id' => 'required|exists:companies,id',
            'notes' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $record = Record::create($validatedData);

        $record->load('offer', 'company', 'employee', 'customer');

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
            'notes' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $record->update($validatedData);
        return response()->json($record);

    }

    public function updateAndRemoveOld(Request $request, $id) 
    {
    // Fetch existing record
    $oldRecord = Record::findOrFail($id);

    // Create new record (inherit values from old record where possible)
    $newRecord = Record::create($request->all() + ['company_id' => $oldRecord->company_id]); 

    // Update old record foreign keys
    $oldRecord->customer_id = null;
    $oldRecord->employee_id = null;
    $oldRecord->company_id = null; 
    $oldRecord->save();

    $oldRecord->offers()->detach();

    $offersData = $request->get('offers');
    foreach ($offersData as $offerData) {
         // Attempt to find an existing offer with matching price
         $existingOffer = Offer::where([
            'name' => $offerData['name'],
            'type' => $offerData['type'],
            'price' => $offerData['price'],
            'company_id' => $request->company_id,
        ])->first();

        if ($existingOffer) {
            $offer = $existingOffer; // Reuse the existing offer
        } else {
            // Check for existing offer (same name, type, different price)
            $oldOfferToRetire = Offer::where([
                'name' => $offerData['name'],
                'type' => $offerData['type'],
                'company_id' => $request->company_id,
            ])->where('price', '!=', $offerData['price'])->first(); // Different price

            if ($oldOfferToRetire) {
                $oldOfferToRetire->company_id = null;
                $oldOfferToRetire->save();
            }

            // Create a new offer
            $offer = Offer::create([
                'name' => $offerData['name'],
                'price' => $offerData['price'],
                'type' => $offerData['type'],
                'company_id' => $request->company_id
            ]);
        }

        $newRecord->offers()->attach($offer->id); // Attach to the new record
    }

    if ($request->has('employee_name') && $request->has('employee_position') &&
        !empty($request->employee_name) && !empty($request->employee_position)) {

        $oldEmployee = $oldRecord->employee; // Fetch existing employee (if any)

        // Find or create employee (with company_id of the new record)
        $newEmployee = Employee::firstOrCreate([
            'name' => $request->employee_name,
            'position' => $request->employee_position,
        ], [
            'company_id' => $newRecord->company_id
        ]);

        $newRecord->employee_id = $newEmployee->id;
        $newRecord->save();

        // Retire old employee (if exists)
        if ($oldEmployee) {
            $oldEmployee->company_id = null;
            $oldEmployee->save();
        }
    }

    // Customer Handling (similar logic as employee)
    if ($request->has('customer_name') && $request->has('customer_car_plate_number')) {

        $oldCustomer = $oldRecord->customer; // Fetch existing customer (if any)

        // Find or create customer 
        $newCustomer = Customer::firstOrCreate([
            'name' => $request->customer_name,
            'car_plate_number' => $request->customer_car_plate_number,
        ], [
            'company_id' => $newRecord->company_id
        ]);

        $newRecord->customer_id = $newCustomer->id;
        $newRecord->save();

        // Retire old customer 
        if ($oldCustomer) {
            $oldCustomer->company_id = null;
            $oldCustomer->save();
        }
    }

    return response()->json($newRecord, 200); 
    }

    public function destroy(Record $record)
    {
        $record->delete();

        return response()->json("Successfully Deleted", 204); // 204 No Content status
    }
}
