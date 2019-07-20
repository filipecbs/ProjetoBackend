<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function createRoom(Request $request) {

        $quarto = new Room;

        $quarto->number = $request->number;
        $quarto->vacancy = $request->vacancy;
        $quarto->save();

        return response()->success($quarto);
    }

    public function listRoom() {
        return Room::all();
    }

    public function showRoom($id) {
        $quarto = Room::find($id);
        if($quarto){
            return response()->success($quarto);
        } else{
            $data = "Quarto não encontrado, verifique o id novamente";
            return response()->error($data, 400);
        }
    }

    public function updateRoom(Request $request, $id) {
        $quarto = Room::findOrFail($id);
        if($request->number)
            $quarto->number = $request->number;
        if ($request->vacancy)
            $quarto->vacancy = $request->vacancy;
        $quarto->save();
        return response()->success($quarto);
    }

    public function deleteRoom($id) {
        Room::destroy($id);
        return response()->json(['Dados do quarto deletados']);
    }
}
