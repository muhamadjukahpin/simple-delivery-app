<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\CargoShip;
use App\Models\Container;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\Port;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "PT.X | Deliveries";
        $data['titleBread'] = 'Deliveries';
        $data['deliveries'] = Delivery::all();

        return view('operator.delivery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "PT.X | Form insert Delivery";
        $data['titleBread'] = 'Form insert Delivery';
        $data['countries'] = Country::all();
        $data['containers'] = Container::all();
        $data['ports'] = Port::with('country')->get();

        return view('operator.delivery.insert', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'sender_country' => 'required|integer|exists:countries,id',
            'sender_address' => 'required',
            'receiver' => 'required',
            'receiver_country' => 'required|integer|exists:countries,id',
            'receiver_address' => 'required',
            'port' => 'required|integer|exists:ports,id',
            'to_port' => 'required|integer|exists:ports,id',
            'cargo_ship_id' => 'required|integer|exists:cargo_ships,id',
            'container_id' => 'required|integer|exists:containers,id',
            'ppn' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $total = $request->ppn + $request->price;
        $data = $request->except('_token');
        $data += ['total' => $total];
        $data += ['status' => 'pending'];
        $container = Container::findOrFail($request->container_id);
        $container->is_available = 'false';
        $container->save();
        $cargo_ship = CargoShip::findOrFail($request->cargo_ship_id);
        $cargo_ship->to_port_id = $request->to_port;
        $cargo_ship->is_available = 'false';
        $cargo_ship->save();
        $delivery_id = Delivery::insertGetId($data);

        return redirect()->to('/operator/deliveries/' . $delivery_id . '/delivery_details')->with('message', 'Success ordered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "PT.X | Form insert Delivery";
        $data['titleBread'] = 'Form insert Delivery';
        $data['countries'] = Country::all();
        $data['containers'] = Container::all();
        $data['ports'] = Port::with('country')->get();
        $data['delivery'] = Delivery::findOrFail($id);

        return view('operator.delivery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sender' => 'required',
            'sender_country' => 'required|integer|exists:countries,id',
            'sender_address' => 'required',
            'receiver' => 'required',
            'receiver_country' => 'required|integer|exists:countries,id',
            'receiver_address' => 'required',
            'port' => 'required|integer|exists:ports,id',
            'to_port' => 'required|integer|exists:ports,id',
            'cargo_ship_id' => 'required|integer|exists:cargo_ships,id',
            'container_id' => 'required|integer|exists:containers,id',
            'ppn' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required'
        ]);

        $total = $request->ppn + $request->price;
        $delivery = Delivery::findOrFail($id);
        $delivery->sender = $request->sender;
        $delivery->sender_country = $request->sender_country;
        $delivery->sender_address = $request->sender_address;
        $delivery->receiver = $request->receiver;
        $delivery->receiver_country = $request->receiver_country;
        $delivery->receiver_address = $request->receiver_address;
        $delivery->port = $request->port;
        $delivery->to_port = $request->to_port;
        $delivery->cargo_ship_id = $request->cargo_ship_id;
        $delivery->container_id = $request->container_id;
        $delivery->ppn = $request->ppn;
        $delivery->price = $request->price;
        $delivery->total = $total;
        $delivery->status = $request->status;
        $delivery->save();

        return redirect()->to('/operator/deliveries/')->with('message', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        return redirect()->to('/operator/deliveries')->with('message', 'Success deleted');
    }

    public function track(Request $request)
    {
        $data['title'] = 'PT.X | Track';
        $data['delivery'] = Delivery::findOrFail($request->no_track);

        return view('track', $data);
    }
}
