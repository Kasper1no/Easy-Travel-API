<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Countries;

class CitiesController extends Controller
{

    public function getCities(){
        $cities = Cities::all();
        return view('cities.index',['cities'=>$cities]);
    }

    public function createCity()
    {
        $countries = Countries::all();
        return view('cities.create',['countries'=>$countries]);
    }

    public function storeCity(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_country' => 'required|exists:countries,id'
        ]);

        $city = new Cities();
        $city->name = $validatedData['name'];
        $city->id_country = $validatedData['id_country'];
        $city->save();

        return redirect('/cities');
    }

    public function editCity($id)
    {
        $city = Cities::findOrFail($id);
        $countries = Countries::all();
        return view('cities.edit', ['city' => $city, 'countries' => $countries]);
    }

    public function updateCity(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_country' => 'required|exists:countries,id'
        ]);

        $city = Cities::findOrFail($id);
        $city->name = $validatedData['name'];
        $city->id_country = $validatedData['id_country'];
        $city->save();

        return redirect('/cities');
    }

    public function deleteCity($id)
    {
        $city = Cities::findOrFail($id);
        $city->delete();

        return redirect('/cities');
    }

    // API

    public function index()
    {
        $cities = Cities::all();
        return response()->json($cities,200);
    }

    public function show($id){
        $city = Cities::findOrFail($id);
        return response()->json($city,200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_country' => 'required|exists:countries,id'
        ]);

        $city = new Cities();
        $city->name = $validatedData['name'];
        $city->id_country = $validatedData['id_country'];
        $city->save();
        return response()->json($city,200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_country' => 'required|exists:countries,id'
        ]);

        $city = Cities::findOrFail($id);
        $city->name = $validatedData['name'];
        $city->id_country = $validatedData['id_country'];
        $city->save();
        return response()->json($city,200);
    }

    public function destroy($id)
    {
        $city = Cities::findOrFail($id);
        $city->delete();
        return response()->json([ "message"=>"City deleted successfully"],200);
    }
    
}
