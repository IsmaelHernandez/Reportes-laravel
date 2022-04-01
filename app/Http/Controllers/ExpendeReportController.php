<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReport;
use Illuminate\Http\Request;

class ExpendeReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expend             =      ExpenseReport::all();
        return view('ExpenseReport.index', compact('expend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //crear un nuevo elemento
        return view('ExpenseReport.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required'
        ]);

        ExpenseReport::create($request->all());

        return redirect()->route('expense.index')->with('succes', 'Reporte guardado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mostrar un solo elemento
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $idReporte          = ExpenseReport::find($id);
        return view('ExpenseReport.edit', compact('idReporte')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'titulo' => 'required'
        ]);
        $reporteUpdate      =    ExpenseReport::find($id); 
        $reporteUpdate->update($request->all());

        return redirect()->route('expense.index')->with('success','Reporte actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reporteDelete  =   ExpenseReport::find($id);
        $reporteDelete->delete();

        return redirect()->route('expense.index')->with('success','Reporte borrado correctamente');
    }
}
