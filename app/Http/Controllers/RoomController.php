<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        return Room::all();
    }

    public function show($id)
    {

        $room = Room::findOrFail($id);
        return $room;
    }

    public function store(Request $request)
    {

        $request->validate([
            'num_of_room'=>'required|unique:rooms',
            'count_of_beds'=>'required',
           


        ]);
        $room = Room::create($request->all());

        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {

        $room=Room::findOrFail($id);
        $room->update($request->all());
    
        return response()->json($room, 200);
    }

    public function delete($id)
    {
        $room = Room::find(1);
        $room->delete();

        return response()->json(null, 204);
    }
}
