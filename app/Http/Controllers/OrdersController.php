<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use Illuminate\Http\Request;
use App\Models\Tours;
use App\Models\Orders;
use App\Models\Statuses;
use Laravel\Prompts\Output\ConsoleOutput;

class OrdersController extends Controller
{

    public function getOrders()
    {
        $orders = Orders::all();

        return view('orders.index', ['orders' => $orders]);
    }

    public function createOrder()
    {
        $tours = Tours::all();
        return view('orders.create', ['tours' => $tours]);
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'tour_id' => 'required',
            'email' => 'required'
        ]);
        $order = new Orders();
        $order->tour_id = $request->tour_id;
        $order->email = $request->email;
        $order->status_id = 2;
        $order->save();
        return redirect('/orders');
    }

    public function editOrder($id){
        $order = Orders::findOrFail($id);
        $tours = tours::all();
        $statuses = Statuses::all();
        return view('orders.edit', ['order' => $order, 'tours' => $tours, 'statuses' => $statuses]);
    }

    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'tour_id' => 'required',
            'email' => 'required',
            'status_id' => 'required'
        ]);
        $order = Orders::findOrFail($id);
        $order->tour_id = $request->tour_id;
        $order->email = $request->email;
        $order->status_id = $request->status_id;
        $order->save();
        return redirect('/orders');
    }

    public function deleteOrder($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect('/orders');
    }
    

    // API
    public function index(){
        $orders = [];
        foreach(Orders::all() as $order){
            $item =[
                "id" => $order->id,
                "tour_id" => $order->tour_id,
                "email" => $order->email,
                "status" => Statuses::find($order->status_id)->name
            ];
            array_push($orders, $item);
        }
        return response()->json($orders,200);
    }

    public function show($id){
        $item = Orders::findOrFail($id);
        $order = [
            "id" => $item->id,
            "tour_id" => $item->tour_id,
            "email" => $item->email,
            "status" => Statuses::find($item->status_id)->name
        ];
        return response()->json($order,200);
    }

    public function store(Request $request){
        $request->validate([
            'tour_id' => 'required',
            'email' => 'required'
        ]);
        $order = new Orders();
        $order->tour_id = $request->tour_id;
        $order->email = $request->email;
        $order->status_id = 2;
        $order->save();

        $tour = Tours::findOrFail($request->tour_id);
        $hotel = $tour->hotel;
        $hotel->free_count = $hotel->free_count - 1;
        $hotel->save();
        

        return response()->json($order, 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'tour_id' => 'required',
            'email' => 'required',
            'status_id' => 'required'
        ]);
        $order = Orders::findOrFail($id);
        $order->tour_id = $request->tour_id;
        $order->email = $request->email;
        $order->status_id = $request->status_id;
        $order->save();
        return response()->json($order,200);
    }

    public function destroy($id){
        $order = Orders::findOrFail($id);
        $order->delete();
        return response()->json([ "message"=>"Order deleted successfully"],200);
    }


}
