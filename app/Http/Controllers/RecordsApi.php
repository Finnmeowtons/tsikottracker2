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
            ->with(['customer', 'offer', 'employee'])
            ->get();

        $formattedRecords = $records->map(function ($record) {
            return [
                'customer_name' => $record->customer->name,
                'customer_car_plate_number' => $record->customer->car_plate_number,
                'offer_id' => $record->offer->id,
                'offer' => $record->offer->name,
                'offer_price' => $record->offer->price,
                'type' => $record->offer->type,
                'date' => $record->date,
                'company_id' => $record->company_id,
                'notes' => $record->notes,
                'employee_id' => $record->employee_id,
                'employee_name' => $record->employee->name,
                'employee_position' => $record->employee->position,
                'id' => $record->id,
                'time' => $record->created_at
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
                'type' => 'required',
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


            $employee = Employee::firstOrCreate([
                'name' => $request->employee_name,
                'position' => $request->employee_position,
                'company_id' => $request->company_id
            ]);

            $validatedData['customer_id'] = $customer->id;
            $validatedData['employee_id'] = $employee->id;

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
