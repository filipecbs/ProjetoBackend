<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function createDoctor(Request $request) {

        $doutor = new Doctor;

        $doutor->name = $request->name;
        $doutor->email = $request->email;
        $doutor->specialty = $request->specialty;
        $doutor->address = $request->address;
        $doutor->phone = $request->phone;
        $doutor->save();

        return response()->success($doutor);
    }

    public function listDoctor() {
        return Doctor::all();
    }

    public function showDoctor($id) {
        $doutor = Doctor::find($id);
        if($doutor){
            return response()->success($doutor);
        } else{
            $data = "Doutor não encontrado, verifique o id novamente";
            return response()->error($data, 400);
        }
    }

    public function updateDoctor(Request $request, $id) {
        $doutor = Doctor::findOrFail($id);
        if($request->name)
            $doutor->name = $request->name;
        if ($request->email)
            $doutor->email = $request->email;
        if ($request->specialty)
            $doutor->specialty = $request->specialty;
        if($request->address)
            $doutor->address = $request->address;
        if($request->phone)
            $doutor->phone = $request->phone;
        $doutor->save();
        return response()->success($doutor);
    }

    public function deleteDoctor($id) {
        Doctor::destroy($id);
        return response()->json(['Dados do doutor deletados']);
    }
}
