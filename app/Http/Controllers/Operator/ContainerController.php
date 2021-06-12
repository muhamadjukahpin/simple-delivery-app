<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Country;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "PT.X | Container";
        $data['titleBread'] = 'Container';
        $data['containers'] = Container::all();

        return view('operator.container.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "PT.X | Form Insert Container";
        $data['titleBread'] = 'Form Insert Container';
        $data['countries'] = Country::all();

        return view('operator.container.insert', $data);
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
            'number_plate' => 'required|unique:containers',
            'country_id' => 'required|integer|exists:countries,id',
            'is_available' => 'required|in:true,false'
        ]);

        Container::create($request->all());

        return redirect()->to('/operator/containers')->with('message', 'Success inserted');
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
        $data['title'] = "PT.X | Form Edit Container";
        $data['titleBread'] = 'Form Edit Container';
        $data['container'] = Container::findOrFail($id);
        $data['countries'] = Country::all();

        return view('operator.container.edit', $data);
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
        $container = Container::findOrFail($id);
        $ruleNumberPlate = 'required';
        if ($container->number_plate != $request->number_plate) {
            $ruleNumberPlate = 'required|unique:containers';
        }

        $request->validate([
            'name' => 'required',
            'number_plate' => $ruleNumberPlate,
            'country_id' => 'required|integer|exists:countries,id',
            'is_available' => 'required|in:true,false'
        ]);

        $container->name = $request->name;
        $container->number_plate = $request->number_plate;
        $container->country_id = $request->country_id;
        $container->is_available = $request->is_available;
        $container->save();

        return redirect()->to('/operator/containers')->with('message', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $container = Container::findOrFail($id);
        $container->delete();
        return redirect()->to('/operator/containers')->with('message', 'Success deleted');
    }
}
