<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OffersApi extends Controller
{

    public function index()
    {
        $offers = Offer::with('company')->get();
        return response()->json($offers);
    }

    public function getOwnOffer(Request $request, $id){
        $offers = Offer::where('company_id', $id)
                  ->select('id', 'name', 'price', 'type')
                  ->get();

        return response()->json($offers); 
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'type' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $offer = Offer::create($validatedData);
        return response()->json($offer->load('company'));
    }


    public function show(Offer $offer)
    {
        return response()->json($offer->load('company'));
    }

    public function update(Request $request, Offer $offer)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'type' => 'required'
        ]);

        $offer->update($validatedData); 
        return response()->json($offer);    

    }

    public function deleteUpdateRetrofit(Request $request, $id)
    {
        $offer = Offer::find($id);
        if (!$offer) {
            return response()->json(['error' => 'Offer not found'], 404); 
        }

        $offer->company_id = null;
        $offer->save();

        if ($request->company_id == null) {
            return response()->json($offer);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'type' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $newOffer = Offer::create($validatedData);
    
        return response()->json($newOffer);

    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return response()->json("Successfully Deleted", 204); // 204 No Content status
    }
}
