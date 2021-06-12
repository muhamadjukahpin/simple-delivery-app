<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\CargoShip;
use App\Models\Port;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CargoShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "PT.X | Cargo Ships";
        $data['titleBread'] = 'Cargo Ships';
        $data['cargo_ships'] = CargoShip::with('port')->with('toPortId')->get();

        return view('operator.cargo_ship.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "PT.X | Form Insert Cargo Ship";
        $data['titleBread'] = 'Form Insert Cargo Ship';
        $data['ports'] = Port::with('country')->get();

        return view('operator.cargo_ship.insert', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruleToPortId = '';
        if ($request->to_port_id) {
            $ruleToPortId = 'integer|exists:ports,id';
        }
        $request->validate([
            'name' => 'required',
            'port_id' => 'required|integer|exists:ports,id',
            'to_port_id' => $ruleToPortId,
            'status' => 'required|in:sailing,not sailing'
        ]);

        $data = $request->except('_token');
        $data += ['is_available' => 'false'];
        CargoShip::insert($data);

        return redirect()->to('/operator/cargo_ships')->with('message', 'Success inserted');
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
        $data['title'] = "PT.X | Form Edit Cargo Ship";
        $data['titleBread'] = 'Form Edit Cargo Ship';
        $data['ports'] = Port::with('country')->get();
        $data['cargo_ship'] = CargoShip::findOrFail($id);

        return view('operator.cargo_ship.edit', $data);
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
        $ruleToPortId = '';
        if ($request->to_port_id) {
            $ruleToPortId = 'integer|exists:ports,id';
        }
        $request->validate([
            'name' => 'required',
            'port_id' => 'required|integer|exists:ports,id',
            'to_port_id' => $ruleToPortId,
            'status' => 'required|in:sailing,not sailing',
            'is_available' => 'required|in:true,false',
        ]);

        $cargo_ship = CargoShip::findOrFail($id);
        $cargo_ship->name = $request->name;
        $cargo_ship->port_id = $request->port_id;
        $cargo_ship->to_port_id = $request->to_port_id;
        $cargo_ship->status = $request->status;
        $cargo_ship->is_available = $request->is_available;
        $cargo_ship->save();

        return redirect()->to('/operator/cargo_ships')->with('message', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo_ship = CargoShip::findOrFail($id);
        $cargo_ship->delete();

        return redirect()->to('/operator/cargo_ships')->with('message', 'Success deleted');
    }
}
