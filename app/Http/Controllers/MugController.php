<?php

namespace App\Http\Controllers;

use App\Models\Mug;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class MugController extends Controller
{
    
    public function index(): View
    {
        /*if (! Gate::allows('Ver e Listar Canecas')) {
            return abort(401);
        }*/

        try{
            $mugs = Mug::all();

            return view('admin.form.index', compact('mugs'));
        } catch (\Throwable $throwable) {
            dd($throwable);
            flash('Erro ao procurar os plantões Cadastrados!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function store(
        Request $request
    ){
//dd($request->all());

        try {
            DB::beginTransaction();

                $mug = new Mug;
    
                $mug->name = $request->name;

                $mug->cost = $request->cost;

                $mug->size = $request->size;

                $mug->making = $request->making;

                $mug->description = $request->description;

                $mug->save();

            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

    public function show( $mug_id ){
    
        //dd($request->all());

        try {
            $mug = Mug::find($mug_id);

//dd($mug);
            
            return view ('admin.form.show', compact('mug'));
        }catch (\Throwable $throwable){
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

}
