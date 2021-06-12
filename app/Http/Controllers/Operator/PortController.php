<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "PT.X | Ports";
        $data['titleBread'] = 'Ports';
        $data['ports'] = Port::with('country')->get();

        return view('operator.port.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "PT.X | Form Insert Port";
        $data['titleBread'] = 'Form Insert Port';
        $data['countries'] = Country::all();

        return view('operator.port.insert', $data);
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
            'name' => 'required',
            'country_id' => 'required|integer|exists:countries,id',
            'address' => 'required'
        ]);

        Port::create($request->all());

        return redirect()->to('/operator/ports')->with('message', 'Success inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port = Port::findOrFail($id);
        dd($port);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "PT.X | Form Edit Port";
        $data['titleBread'] = 'Form Edit Port';
        $data['countries'] = Country::all();
        $data['port'] = Port::findOrFail($id);

        return view('operator.port.edit', $data);
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
            'name' => 'required',
            'country_id' => 'required|integer|exists:countries,id',
            'address' => 'required'
        ]);

        $port = Port::findOrFail($id);
        $port->name = $request->name;
        $port->country_id = $request->country_id;
        $port->address = $request->address;
        $port->save();

        return redirect()->to('/operator/ports')->with('message', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $port = Port::findOrFail($id);
        $port->delete();

        return redirect()->to('/operator/ports')->with('message', 'Success deleted');
    }
}
