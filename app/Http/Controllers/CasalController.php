<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\City;
use App\Http\Requests\StoreCasalRequest;
use App\Http\Requests\UpdateCasalRequest;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class CasalController extends Controller
{
    public function main(){
        $casals = Casal::all();
        $cities = City::all();
        return view("main", compact("casals", "cities"));
    }

    public function addCasalForm()
    {
        $cities = City::all();
        return view("addCasalForm", compact("cities"));

    }

    public function showEditForm($id){
        $casal = Casal::getById($id);
        $cities = City::all();
        return view("editCasalForm", compact("casal", "cities"));
    }

    public function eliminarCasal($id){
        Casal::deleteCasal($id);

        return redirect()->route('main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        return Casal::store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Casal $casal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'f_ini' => 'required|date',
            'f_fin' => 'required|date|after:f_ini',
            'n_plazas' => 'required',
            'ciudad' => 'required',
        ]);

        $updatedata = [
            "name" => $request->input("name"),
            "d_inici" => $request->input("f_ini"),
            "d_final" => $request->input("f_fin"),
            "n_plazas" => $request->input("n_plazas"),
            "city_id" => $request->input("ciudad"),
        ];

        return Casal::editar($updatedata, $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCasalRequest $request, Casal $casal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Casal $casal)
    {
        //
    }
}
