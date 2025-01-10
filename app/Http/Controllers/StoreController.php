<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function get_all_stores()
    {
        $stores=Store::all();
        return response()->json($stores);
    }

    public function get_one_store($storeId)
    {
        $store=Store::find($storeId);
        if (!$store) {
            return response()->json(['message' => 'لا يوجد هكذا متجر لدينا'], 404);
        }
        return response()->json($store);
    }

    public function search($storename)
    {
        $stores = Store::where('name', 'like', "%$storename%")->get();

        if ($stores->isEmpty()) {
            return response()->json(['message' => 'عفواً ليس لدينا منتجات كهذه'], 404);
        }

        return response()->json( $stores);
    }

    public function mostfamous()
    {
        $stores = Store::where('id', '>=', 1)
            ->where('id', '<=', 4)
            ->get();
        return response()->json($stores);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
