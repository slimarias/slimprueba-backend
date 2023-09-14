<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage','10');
        $page = $request->input('page','1');
        $q = $request->input('q','');
        $hotels = Hotel::with('city')->paginate($perPage,['*'],'page',$page);
        if($q!=''){
            $hotels->where(function($query) use ($q){
                $query->where('name','like',"%$q%")
                    ->orWhere('document','like',"%$q%");
            });
        }
        return response()->json($hotels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHotelRequest $request)
    {
        try{
            $newHotel = Hotel::create($request->all());
            return response()->json(['message'=>'Hotel Creado Exitosamente']);
        }catch(Exception $e){
            return response()->json(['errors'=>['error'=>['Ha ocurrido un error al crear el hotel: '.$e->getMessage()]]],500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        try{
            $hotel->update($request->except(['id']));
            return response()->json(['message'=>'Hotel Actualizado Exitosamente']);
        }catch(Exception $e){
            return response()->json(['errors'=>['error'=>['Ha ocurrido un error al actualizar el hotel: '.$e->getMessage()]]],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
