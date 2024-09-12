<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;

class CountriesController extends Controller
{
    public function getCountries(){
        $countries = Countries::all();
        return view('countries.index',['countries'=>$countries]);
    }

    public function createCountry()
    {
        return view('countries.create');
    }

    public function storeCountry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country = new Countries();
        $country->name = $request->input('name');
        $country->save();

        return redirect('/countries')->with('success', 'Country created successfully');
    }

    public function editCountry($id)
    {
        $country = Countries::findOrFail($id);
        return view('/countries.edit', ['country' => $country]);
    }

    public function updateCountry(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country = Countries::findOrFail($id);
        $country->name = $request->input('name');
        $country->save();

        return redirect('/countries')->with('success', 'Country updated successfully');
    }

    public function deleteCountry($id)
    {
        $country = Countries::findOrFail($id);
        $country->delete();

        return redirect('/countries')->with('success', 'Country deleted successfully');
    }

    // API
    
    /**
     * api\countries
     */
    public function index(){
        $countries = Countries::all();
        return response()->json($countries,200);
    }

    public function show($id){
        $country = Countries::findOrFail($id);
        return response()->json($country,200);
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        
        $country = new Countries();
        $country['name'] = $request->name;
        $country->save();

        return response()->json($country,200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country = Countries::findOrFail($id);
        $country->name = $request->input('name');
        $country->save();

        return response()->json($country,200);
    }

    public function destroy($id){
        $country = Countries::findOrFail($id);
        $country->delete();
        return response()->json([ "message"=>"Country deleted successfully"],200);
    }
}
