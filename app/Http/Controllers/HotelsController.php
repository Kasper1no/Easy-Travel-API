<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Cities;
use App\Models\Features;

class HotelsController extends Controller
{
    public function getHotels(){
        $hotels = Hotels::all();
        return view('hotels.index',['hotels'=>$hotels]);
    }

    public function createHotel(){
        $cities = Cities::all();
        $features = Features::all();
        return view('hotels.create', ['cities' => $cities, 'features' => $features]);
    }

    public function storeHotel(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|exists:cities,id',
            'description' => 'required|string',
            'room_desc' => 'nullable|string',
            'meal_desc' => 'nullable|string',
            'location_desc' => 'nullable|string',
            'beach_desc' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'rooms_desc' => 'nullable|string',
            'free_count' => 'nullable|integer',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
        ]);

        $hotel = new Hotels();
        $hotel->name = $validatedData['name'];
        $hotel->id_city = $validatedData['city'];
        $hotel->id_country = Cities::find($validatedData['city'])->country->id;
        $hotel->description = $validatedData['description'];
        $hotel->room_desc = $validatedData['room_desc'];
        $hotel->meal_desc = $validatedData['meal_desc'];
        $hotel->location_desc = $validatedData['location_desc'];
        $hotel->beach_desc = $validatedData['beach_desc'];
        $hotel->address = $validatedData['address'];
        $hotel->phone = $validatedData['phone'];
        $hotel->email = $validatedData['email'];
        $hotel->rooms_desc = $validatedData['rooms_desc'];
        $hotel->free_count = $validatedData['free_count'];
        $hotel->save();

        if (isset($validatedData['features'])) {
            $features = Features::whereIn('id', $validatedData['features'])->get();
            $hotel->features()->attach($features);
        }

        return redirect('/hotels');
    }

    public function editHotel($id){
        $hotel = Hotels::findOrFail($id);
        $cities = Cities::all();
        $features = Features::all();
        return view('hotels.edit', ['hotel' => $hotel, 'cities' => $cities, 'features' => $features]);
    }

    public function updateHotel(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'required|exists:cities,id',
        'description' => 'required|string',
        'room_desc' => 'nullable|string',
        'meal_desc' => 'nullable|string',
        'location_desc' => 'nullable|string',
        'beach_desc' => 'nullable|string',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'rooms_desc' => 'nullable|string',
        'free_count' => 'nullable|integer|min:0',
        'features' => 'nullable|array',
        'features.*' => 'exists:features,id',
    ]);

    $hotel = Hotels::findOrFail($id);

    $hotel->name = $validatedData['name'];
    $hotel->id_city = $validatedData['city'];
    $hotel->id_country = Cities::find($validatedData['city'])->country->id;
    $hotel->description = $validatedData['description'];
    $hotel->room_desc = $validatedData['room_desc'];
    $hotel->meal_desc = $validatedData['meal_desc'];
    $hotel->location_desc = $validatedData['location_desc'];
    $hotel->beach_desc = $validatedData['beach_desc'];
    $hotel->address = $validatedData['address'];
    $hotel->phone = $validatedData['phone'];
    $hotel->email = $validatedData['email'];
    $hotel->rooms_desc = $validatedData['rooms_desc'];
    $hotel->free_count = $validatedData['free_count'];
    $hotel->features()->sync($validatedData['features'] ?? []);

    $hotel->save();

    return redirect('/hotels');
}


    public function deleteHotel($id){
        $hotel = Hotels::findOrFail($id);
        $hotel->delete();
        return redirect('/hotels');
    }

    // API

    public function index()
    {
        $hotels = Hotels::all();
        foreach($hotels as $hotel){
            $hotel['features'] = $hotel->features()->pluck('name')->toArray();
        }
        return response()->json($hotels, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|exists:cities,id',
            'description' => 'required|string',
            'room_desc' => 'nullable|string',
            'meal_desc' => 'nullable|string',
            'location_desc' => 'nullable|string',
            'beach_desc' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'rooms_desc' => 'nullable|string',
            'free_count' => 'nullable|integer',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
        ]);
        $hotel = new Hotels();
        $hotel->name = $validatedData['name'];
        $hotel->id_city = $validatedData['city'];
        $hotel->id_country = Cities::find($validatedData['city'])->country->id;
        $hotel->description = $validatedData['description'];
        $hotel->room_desc = $validatedData['room_desc'];
        $hotel->meal_desc = $validatedData['meal_desc'];
        $hotel->location_desc = $validatedData['location_desc'];
        $hotel->beach_desc = $validatedData['beach_desc'];
        $hotel->address = $validatedData['address'];
        $hotel->phone = $validatedData['phone'];
        $hotel->email = $validatedData['email'];
        $hotel->rooms_desc = $validatedData['rooms_desc'];
        $hotel->free_count = $validatedData['free_count'];
        $hotel->save();

        if (isset($validatedData['features'])) {
            $features = Features::whereIn('id', $validatedData['features'])->get();
            $hotel->features()->attach($features);
        }

        return response()->json($hotel);
        
    }

    public function show($id)
    {
        $hotel = Hotels::find($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|exists:cities,id',
            'description' => 'required|string',
            'room_desc' => 'nullable|string',
            'meal_desc' => 'nullable|string',
            'location_desc' => 'nullable|string',
            'beach_desc' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'rooms_desc' => 'nullable|string',
            'free_count' => 'nullable|integer|min:0',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
        ]);
    
        $hotel = Hotels::findOrFail($id);
    
        $hotel->name = $validatedData['name'];
        $hotel->id_city = $validatedData['city'];
        $hotel->id_country = Cities::find($validatedData['city'])->country->id;
        $hotel->description = $validatedData['description'];
        $hotel->room_desc = $validatedData['room_desc'];
        $hotel->meal_desc = $validatedData['meal_desc'];
        $hotel->location_desc = $validatedData['location_desc'];
        $hotel->beach_desc = $validatedData['beach_desc'];
        $hotel->address = $validatedData['address'];
        $hotel->phone = $validatedData['phone'];
        $hotel->email = $validatedData['email'];
        $hotel->rooms_desc = $validatedData['rooms_desc'];
        $hotel->free_count = $validatedData['free_count'];
        $hotel->features()->sync($validatedData['features'] ?? []);
    
        $hotel->save();
    
        return response()->json($hotel);
    }

    public function destroy($id)
    {
        $hotel = Hotels::find($id);
        $hotel->delete();
        return response()->json([ "message"=>"Hotel deleted successfully"],200);
    }

}
