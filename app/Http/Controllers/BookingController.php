<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(Request $request ,$roomId){

        $room = Room::findOrFail($roomId);
        
        // $book = Booking::create([
        //     // 'user_id' => $request->user()->id,
        //     'user_id' => $request->user_id,
        //     'from_date' => $request->from_date,
        //     'to_date' => $request->to_date,
        //     'room_id'=>$roomId,
        //     'actual_price'=>$request->actual_price,
        //   ]);
    

        $book=DB::table('room_user')->insert([
            // 'user_id' => $request->user()->id,
            'user_id' => $request->user_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'room_id'=>$roomId,
            'actual_price'=>$request->actual_price,
        ]);

        $room = Room::findOrFail($roomId);
        $room->is_available=0;
        $room->save();
          return  $book;
    }
}
