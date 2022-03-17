<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\City;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\UnitService;
use App\Services\UnitCreateService;
use App\Services\UnitUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UnitController extends Controller
{
    public function __construct(
        protected UnitService $unitService,
        protected UnitCreateService $unitCreateService,
        protected UnitUpdateService $unitUpdateService,
    ){}

    public function index(): View
    {
        /*if (! Gate::allows('Ver e Listar Unidades')) {
            return abort(401);
        }*/

        try{
            $pageConfigs = ['pageHeader' => false];

            $cities = City::all();
            $units = $this->unitService->get();
            return view('admin.unit.index', ['pageConfigs' => $pageConfigs], compact('cities', 'units'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        UnitRequest $request
    ){
        /*if (! Gate::allows('Criar Unidades')) {
            return abort(401);
        }*/

        try {
            DB::beginTransaction();
            $this->unitCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Registro criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao cadastrar! ');
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

    public function update(
        UnitRequest $request, $unit_id
    ){
        /*if (! Gate::allows('Editar Unidades')) {
            return abort(401);
        }*/
        //dd($request->all());
        try {
            DB::beginTransaction();
            $this->unitUpdateService->update($request->toArray(), $unit_id);

            flash('Registro editado com sucesso!')->success();
            session()->flash('success', ' Registro editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao editar registro!')->error();
            session()->flash('success', 'Erro ao editar registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function show($unit_id)
    {
        /*if (! Gate::allows('Editar Departamentos')) {
            return abort(401);
        }*/

        try{
            $cities = City::all();
            $units = $this->unitService->get();
            $unit_selected = $this->unitService->show($unit_id);
            return view('admin.unit.show', compact('unit_selected', 'units', 'cities'));
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Editar! ');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($unit)
    {
        if (! Gate::allows('Deletar Unidades')) {
            return abort(401);
        }

        try{
            $unit = Unit::find($unit);
            $unit->delete();
            $pageConfigs = ['pageHeader' => false];

            $cities = City::all();
            $units = $this->unitService->get();
            session()->flash('success', ' Deletado com Sucesso! ');
            return view('admin.unit.index', ['pageConfigs' => $pageConfigs], compact('cities', 'units'));
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
            return redirect()->back()->withInput();
        }
    }
}
