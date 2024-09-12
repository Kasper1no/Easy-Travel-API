<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Images;
use App\Models\TourImages;

class ToursController extends Controller
{

    public function getTours(){
        $tours = tours::all();
        $hotels = Hotels::all();
        $cities = Cities::all();
        $countries = Countries::all();
        return view('tours.index',['tours'=>$tours,'hotels'=>$hotels,'cities'=>$cities,'countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTour()
    {
        $hotels = Hotels::all();
        $pictures = Images::all();
        return view('tours.create', ['hotels' => $hotels, 'pictures' => $pictures]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeTour(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'id_hotel' => 'required|exists:hotels,id',
        'count_persons' => 'required|integer|min:1',
        'transport' => 'required|string',
        'price' => 'required|numeric|min:0',
        'time_from' => 'required|date',
        'time_to' => 'required|date|after:time_from',
        'visa' => 'required|boolean',
        'insurance' => 'required|boolean',
        'transfer' => 'required|boolean',
        'img' => 'required'
    ]);
    

    $tour = new Tours();
    $tour->name = $validatedData['name'];
    $tour->description = $validatedData['description'];
    $tour->id_country = Hotels::find($validatedData['id_hotel'])->id_country;
    $tour->id_city = Hotels::find($validatedData['id_hotel'])->id_city;
    $tour->id_hotel = $validatedData['id_hotel'];
    $tour->count_persons = $validatedData['count_persons'];
    $tour->transport = $validatedData['transport'];
    $tour->price = $validatedData['price'];
    $tour->time_from = $validatedData['time_from'];
    $tour->time_to = $validatedData['time_to'];
    $tour->visa = $validatedData['visa'];
    $tour->insurance = $validatedData['insurance'];
    $tour->transfer = $validatedData['transfer'];
    $tour->img = $validatedData['img'];
    $tour->save();
    
    if($request->has("images")){
        foreach($request["images"] as $image_id){
            $tourImage = new TourImages();
            $tourImage->tour_id = $tour->id;
            $tourImage->image_id = $image_id;
            $tourImage->save();
        }
    }

    return redirect('/tours');
}


    public function editTour($id)
    {
        $tour = Tours::findOrFail($id);
        $images = Images::all();
        return view('tours.edit', ['tour' => $tour, 'pictures' => $images]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTour(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'count_persons' => 'required|integer|min:1',
        'transport' => 'required|string',
        'price' => 'required|numeric|min:0',
        'time_from' => 'required|date',
        'time_to' => 'required|date|after:time_from',
        'visa' => 'required|boolean',
        'insurance' => 'required|boolean',
        'transfer' => 'required|boolean',
        'img' => 'sometimes|required'
    ]);

    $tour = Tours::findOrFail($id);
    $tour->name = $validatedData['name'];
    $tour->description = $validatedData['description'];
    $tour->count_persons = $validatedData['count_persons'];
    $tour->transport = $validatedData['transport'];
    $tour->price = $validatedData['price'];
    $tour->time_from = $validatedData['time_from'];
    $tour->time_to = $validatedData['time_to'];
    $tour->visa = $validatedData['visa'];
    $tour->insurance = $validatedData['insurance'];
    $tour->transfer = $validatedData['transfer'];
    
    if (isset($validatedData['img'])) {
        $tour->img = $validatedData['img'];
    }

    $tour->save();

    if ($request->has('images')) {
        TourImages::where('tour_id', $tour->id)->delete();
        
        foreach ($request['images'] as $image_id) {
            $tourImage = new TourImages();
            $tourImage->tour_id = $tour->id;
            $tourImage->image_id = $image_id;
            $tourImage->save();
        }
    }

    return redirect('/tours');
}


    /**
     * Remove the specified resource from storage.
     */
    public function deleteTour($id)
    {
        Tours::find($id)->delete();
        return redirect('/tours');
    }

    // API
    
    public function index()
    {
        $tours = Tours::all();
        foreach($tours as $tour){
            $tour["hotel_images"] = $tour->images()->pluck("name")->toArray();
        }
        return response()->json($tours,200);
    }

    public function show($id)
    {
        $tour = Tours::find($id);
        $tour["hotel_images"] = $tour->images()->pluck("name")->toArray();
        return response()->json($tour,200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'count_persons' => 'required|integer|min:1',
            'transport' => 'required|string',
            'price' => 'required|numeric|min:0',
            'time_from' => 'required|date',
            'time_to' => 'required|date|after:time_from',
            'visa' => 'required|boolean',
            'insurance' => 'required|boolean',
            'transfer' => 'required|boolean',
            'img' => 'required'
        ]);
    
        $tour = new Tours();
        $tour->name = $validatedData['name'];
        $tour->description = $validatedData['description'];
        $tour->count_persons = $validatedData['count_persons'];
        $tour->transport = $validatedData['transport'];
        $tour->price = $validatedData['price'];
        $tour->time_from = $validatedData['time_from'];
        $tour->time_to = $validatedData['time_to'];
        $tour->visa = $validatedData['visa'];
        $tour->insurance = $validatedData['insurance'];
        $tour->transfer = $validatedData['transfer'];
        $tour->img = $validatedData['img'];
        $tour->save();

    if ($request->has('images')) {
        TourImages::where('tour_id', $tour->id)->delete();
        
        foreach ($request['images'] as $image_id) {
            $tourImage = new TourImages();
            $tourImage->tour_id = $tour->id;
            $tourImage->image_id = $image_id;
            $tourImage->save();
        }
    }
    
        return response()->json($tour,200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'count_persons' => 'required|integer|min:1',
            'transport' => 'required|string',
            'price' => 'required|numeric|min:0',
            'time_from' => 'required|date',
            'time_to' => 'required|date|after:time_from',
            'visa' => 'required|boolean',
            'insurance' => 'required|boolean',
            'transfer' => 'required|boolean',
            'img' => 'required'
        ]);
    
        $tour = Tours::findOrFail($id);
        $tour->name = $validatedData['name'];
        $tour->description = $validatedData['description'];
        $tour->count_persons = $validatedData['count_persons'];
        $tour->transport = $validatedData['transport'];
        $tour->price = $validatedData['price'];
        $tour->time_from = $validatedData['time_from'];
        $tour->time_to = $validatedData['time_to'];
        $tour->visa = $validatedData['visa'];
        $tour->insurance = $validatedData['insurance'];
        $tour->transfer = $validatedData['transfer'];
        $tour->img = $validatedData['img'];
        $tour->save();
    
        if ($request->has('images')) {
            TourImages::where('tour_id', $tour->id)->delete();
            
            foreach ($request['images'] as $image_id) {
                $tourImage = new TourImages();
                $tourImage->tour_id = $tour->id;
                $tourImage->image_id = $image_id;
                $tourImage->save();
            }
        }
    
        return response()->json($tour,200);
    }

    public function destroy($id)
    {
        $tour = Tours::findOrFail($id);
        $tour->delete();
        return response()->json([ "message"=>"Tour deleted successfully"],200);
    }
}


