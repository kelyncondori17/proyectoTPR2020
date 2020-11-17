<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Employee;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sale::with("personal","user")->paginate(15);
        return view("sales.index", compact("sales"),[
            "employees"=>Employee::get()
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees=Employee::get();
        $sale=new Sale;
        $title= __("Añadir Sale");
        $textButton=__("Crear");
        $route=route("sales.store");
        return view("sales.create", compact("title", "textButton", "route","sale","employees"));
    
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
            "id_employee"=>"required|max:90",
            "quantity"=>"required",
            "date"=>"required"
        ]);
        Sale::create($request->only("id_employee","quantity","date"));
        return redirect(route("sales.index"))
            ->with("success", __("Sale registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
