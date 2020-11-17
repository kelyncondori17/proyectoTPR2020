<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Position;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal=Personal::with("position")->paginate(15);
        return view("personal.index", compact("personal"),[
            "positions"=>Position::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions=Position::get();
        $personal=new Personal;
        $title= __("Añadir Personal");
        $textButton=__("Crear");
        $route=route("personal.store");
        return view("personal.create", compact("title", "textButton", "route","personal","positions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|max:90",
            "surname"=>"required",
            "id_position"=>"required",
            "direction"=>"required",
            "CI"=>"required",
            "password"=>"required",
            "phone"=>"required",
            "salary"=>"required",
            "schedule"=>"required"
        ]);
        Personal::create($request->only("name","surname","id_position","direction","CI","password","phone","salary","schedule"));
        return redirect(route("personal.index"))
            ->with("success", __("Personal registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        $update=true;
        $title= __("Editar datos del Personal");
        $positions=Position::get();
        $textButton= __("Actualizar");
        $route=route("personal.update",["personal"=>$personal]);
        return view("personal.edit", compact("update","title","positions","personal","textButton","route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        $this->validate($request,[
            "name"=>"required|max:90",
            "surname"=>"required",
            "id_position"=>"required",
            "direction"=>"required",
            "CI"=>"required",
            "password"=>"required",
            "phone"=>"required",
            "salary"=>"required",
            "schedule"=>"required"
        ]);
        $personal->fill($request->only("name","surname","id_position","direction","CI","password","phone","salary","schedule"))->save();
        return redirect(route("personal.index"))->with("success", __("Datos actualizados"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return back()->with("success", __("Datos del articulo eliminados"));
        
    }
}
