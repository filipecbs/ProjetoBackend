<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Room;

class PatientController extends Controller
{
    public function createPatient(Request $request) {

        $paciente = new Patient;

        $paciente->name = $request->name;
        $paciente->cpf = $request->cpf;
        $paciente->admission = $request->admission;
        $paciente->room_id = $request->room_id;
        $paciente->doctor_id = $request->doctor_id;
        $paciente->save();

        return response()->success($paciente);
    }

    public function listPatient() {
        return Patient::all();
    }

    public function showPatient($id) {
        $paciente = Patient::find($id);
        if($paciente){
            return response()->success($paciente);
        } else{
            $data = "Paciente não encontrado, verifique o id novamente";
            return response()->error($data, 400);
        }
    }

    public function updatePatient(Request $request, $id) {
        $paciente = Patient::findOrFail($id);
        if($request->name)
            $paciente->name = $request->name;
        if ($request->cpf)
            $paciente->cpf = $request->cpf;
        if ($request->admission)
            $paciente->admission = $request->admission;
        if($request->room_id)
            $paciente->room_id = $request->room_id;
        if($request->doctor_id)
            $paciente->doctor_id = $request->doctor_id;
        $paciente->save();
        return response()->success($paciente);
    }

    public function deletePatient($id) {
        Patient::destroy($id);
        return response()->json(['Dados do paciente deletados']);
    }
}
