<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentRequest;
use App\Models\City;
use App\Models\Departament;
use App\Models\Occupation;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\DepartamentService;
use App\Services\DepartamentCreateService;
use App\Services\DepartamentUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class DepartamentController extends Controller
{
    public function __construct(
        protected DepartamentService $departamentService,
        protected DepartamentCreateService $departamentCreateService,
        protected DepartamentUpdateService $departamentUpdateService,
    ){}

    public function index(): View
    {
        /*if (! Gate::allows('Ver e Listar Departamentos')) {
            return abort(401);
        }*/

        try{
            $pageConfigs = ['pageHeader' => false];

            $units = Unit::all();
            $departaments = $this->departamentService->get();
            return view('admin.departament.index', ['pageConfigs' => $pageConfigs], compact('departaments', 'units'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        DepartamentRequest $request
    ){
        /*if (! Gate::allows('Criar Departamentos')) {
            return abort(401);
        }*/
        
        try {
            DB::beginTransaction();
            $this->departamentCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Departamento criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao adicionar o Departamento! ');
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

    public function show($departament_id)
    {
        /*if (! Gate::allows('Editar Departamentos')) {
            return abort(401);
        }*/

        try{
            $departaments = $this->departamentService->get();
            $units = Unit::all();
            $departament_selected = $this->departamentService->show($departament_id);
            return view('admin.departament.show', compact('departament_selected', 'departaments', 'units'));
        } catch (\Exception $exception) {
            dd($exception);
            session()->flash('error', ' Erro ao Editar! ');
            return redirect()->back()->withInput();
        }
    }

    public function update(
        DepartamentRequest $request, $departament_id
    ){
        if (! Gate::allows('Editar Departamentos')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->departamentUpdateService->update($request->toArray(), $departament_id);

            flash('Registro editado com sucesso!')->success();
            session()->flash('success', ' Departamento editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao editar registro!')->error();
            session()->flash('error', ' Erro ao editar! ');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($departament)
    {
        /*if (! Gate::allows('Deletar Departamentos')) {
            return abort(401);
        }*/

        try{
            $departament = Departament::find($departament);
            $departament->delete();
            $pageConfigs = ['pageHeader' => false];
            session()->flash('success', ' Deletado com Sucesso! ');
            $units = Unit::all();
            $departaments = $this->departamentService->get();
            return view('admin.departament.index', ['pageConfigs' => $pageConfigs], compact('departaments', 'units'));
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
            return redirect()->back()->withInput();
        }
    }
    
    public function getDepartamentos(int $idUnit): JsonResponse
    {
        $departaments = Departament::where('unit_id', $idUnit)->orderBy('departament')->get();
        return Response::json($departaments);
    }
    
    public function getOccupations(int $idDepartament): JsonResponse
    {
        $occupations = Occupation::where('departament_id', $idDepartament)->orderBy('title')->get();
        return Response::json($occupations);
    }
}
