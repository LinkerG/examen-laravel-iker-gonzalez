<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Casal extends Model
{
    use HasFactory;

    public static function store($request){
        request()->validate([
            'name' => 'required',
            'f_ini' => 'required|date',
            'f_fin' => 'required|date|after:f_ini',
            'n_plazas' => 'required',
            'ciudad' => 'required',
        ]);

        $casal = new Casal;
        $casal->name = $request->input("name");
        $casal->d_inici = $request->input("f_ini");
        $casal->d_final = $request->input("f_fin");
        $casal->n_plazas = $request->input("n_plazas");
        $casal->city_id = $request->input("ciudad");

        $casal->save();
        return redirect()->route('main');
    }

    public static function getById($id){
        return $casal = Casal::where("id", $id)->first();
    }

    public static function editar($updateData, $id){
        $casal = Casal::where("id", $id)->update($updateData);

        return redirect()->route('main');
    }

    public static function deleteCasal($id){
        $casal = Casal::where("id", $id)->delete();
    }
}
