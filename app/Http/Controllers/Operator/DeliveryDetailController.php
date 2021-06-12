<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\DeliveryDetail;
use Illuminate\Http\Request;

class DeliveryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($delivery_id)
    {
        $data['title'] = "PT.X | Delivery Details";
        $data['titleBread'] = 'Delivery Details';
        $data['delivery_details'] = DeliveryDetail::where('delivery_id', $delivery_id)->get();
        $data['delivery'] = Delivery::findOrFail($delivery_id);

        return view('operator.delivery_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($delivery_id, Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'qty' => 'required|numeric'
        ]);

        $data = $request->except('_token');
        $data += ['delivery_id' => $delivery_id];

        DeliveryDetail::insert($data);

        return redirect()->to('/operator/deliveries/' . $delivery_id . '/delivery_details')->with('message', 'Success inserted');
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
    public function edit($delivery_id, $id)
    {
        $data['title'] = "PT.X | Form Edit Delivery Detail";
        $data['titleBread'] = 'Form Edit Delivery Detail';
        $data['delivery_detail'] = DeliveryDetail::findOrFail($id);

        return view('operator.delivery_detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $delivery_id, $id)
    {
        $request->validate([
            'name_product' => 'required',
            'qty' => 'required|numeric'
        ]);

        $delivery_detail = DeliveryDetail::findOrFail($id);
        $delivery_detail->name_product = $request->name_product;
        $delivery_detail->qty = $request->qty;
        $delivery_detail->save();

        return redirect()->to('/operator/deliveries/' . $delivery_id . '/delivery_details')->with('message', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($delivery_id, $id)
    {
        $delivery_detail = DeliveryDetail::findOrFail($id);
        $delivery_detail->delete();

        return redirect()->to('/operator/deliveries/' . $delivery_id . '/delivery_details')->with('message', 'Success deleted');
    }
}
