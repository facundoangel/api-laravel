<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\sale;
use App\Http\Requests\saleRequest;
use App\Http\Resources\saleResource;

class saleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = sale::all();
        return saleResource::collection($sales);
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
    public function store(saleRequest $request):JsonResponse
    {
        $sale = sale::create($request->all());
        return response()->json(array('status' => 'success','message' => 'Venta creada correctamente','sale' => saleResource::collection(array($sale))));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = sale::find($id);
        return response()->json(array('status' => 'success','message' => 'Venta actualizada correctamente','sale' => $sale));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $sale = sale::find($id);
        $sale->customer_id = $request->customer_id;
        $sale->product_id = $request->product_id;
        if($request->quantity){
            $sale->quantity = $request->quantity;
        }
        $sale->price = $request->price;
        $sale->total = $request->total;
        $sale->save();

        return response()->json(array('status' => 'success','message' => 'Venta actualizada correctamente'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = sale::find($id);
        $sale->delete();
        return response()->json(array('status' => 'success','message' => 'Venta eliminada correctamente'));
    }
}
