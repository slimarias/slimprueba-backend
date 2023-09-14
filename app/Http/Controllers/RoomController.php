<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotel = $request->input('hotel');
        $rooms = Room::where('hotel_id',$hotel)->with(['roomType','acomodation'])->get();
        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $hotelId = $request->input('hotel_id');
            $hotel = Hotel::where('id',$hotelId)->first();
            if($hotel){
                if(count($hotel->roomData) == $hotel->rooms){
                    return response()->json(['errors'=>['error'=>['No se pueden agregar más habitaciones, el hotel '.$hotel->name.' solo puede tener un máximo de '.$hotel->rooms]]],422);
                }else{    
                    $newRoom = Room::create($request->all());
                }
            }
            return response()->json(['message'=>'Habitacion Creada Exitosamente']);
        }catch(Exception $e){
            return response()->json(['errors'=>['error'=>['Ha ocurrido un error al crear la habitacion: '.$e->getMessage()]]],500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        try{
            $room->update($request->except(['id']));
            return response()->json(['message'=>'Habitacion Actualizada Exitosamente']);
        }catch(Exception $e){
            return response()->json(['errors'=>['error'=>['Ha ocurrido un error al actualizar la habitacion: '.$e->getMessage()]]],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
