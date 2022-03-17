<?php

namespace App\Http\Controllers;

use App\Http\Requests\OccupationRequest;
use App\Models\City;
use App\Models\Departament;
use App\Models\Occupation;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\OccupationService;
use App\Services\OccupationCreateService;
use App\Services\OccupationUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OccupationController extends Controller
{
    public function __construct(
        protected OccupationService $occupationService,
        protected OccupationCreateService $occupationCreateService,
        protected OccupationUpdateService $occupationUpdateService,
    ){}

    public function index(): View
    {
        /*if (! Gate::allows('occupation-show')) {
            return abort(401);
        }*/

        try{
            $pageConfigs = ['pageHeader' => false];

            $departaments = Departament::all();
            $occupations = $this->occupationService->get();
            return view('admin.occupation.index', ['pageConfigs' => $pageConfigs], compact('occupations', 'departaments'));
        } catch (\Throwable $throwable) {
            dd($throwable);
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        OccupationRequest $request
    ){
        /*if (! Gate::allows('occupation-create')) {
            return abort(401);
        }*/

        try {
            DB::beginTransaction();
            $this->occupationCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Ocupação criada com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao adicionar o Occupationo! ');
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

    public function show($occupation_id)
    {
        /*if (! Gate::allows('occupation-update')) {
            return abort(401);
        }*/

        try{
            $occupations = $this->occupationService->get();
            $departaments = Departament::all();
            $occupation_selected = $this->occupationService->show($occupation_id);
            return view('admin.occupation.show', compact('occupation_selected', 'occupations', 'departaments'));
        } catch (\Exception $exception) {
            dd($exception);
            session()->flash('error', ' Erro ao Editar! ');
            return redirect()->back()->withInput();
        }
    }

    public function update(
        OccupationRequest $request, $occupation_id
    ){
        /*if (! Gate::allows('occupation-update')) {
            return abort(401);
        }*/

        try {
            DB::beginTransaction();
            $this->occupationUpdateService->update($request->toArray(), $occupation_id);

            flash('Registro editado com sucesso!')->success();
            session()->flash('success', ' Occupationo editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao editar registro!')->error();
            session()->flash('error', ' Erro ao editar! ');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($occupation)
    {
        /*if (! Gate::allows('occupation-delete')) {
            return abort(401);
        }*/

        try{
            $occupation = Occupation::find($occupation);
            $occupation->delete();
            $pageConfigs = ['pageHeader' => false];
            session()->flash('success', ' Deletado com Sucesso! ');
            $departaments = Departament::all();
            $occupations = $this->occupationService->get();
            return view('admin.occupation.index', ['pageConfigs' => $pageConfigs], compact('occupations', 'Departaments'));
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
            return redirect()->back()->withInput();
        }
    }
}
