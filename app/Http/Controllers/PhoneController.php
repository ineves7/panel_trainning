<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\phoneCreateRequest;
use App\Models\Phone;
use App\Services\PeopleService;
use App\Services\PhoneService;
use App\Services\PhoneCreateService;
use App\Services\PhoneUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PhoneController extends Controller
{
    public function __construct(
        protected PeopleService $peopleService,
        protected PhoneService $phoneService,
        protected PhoneCreateService $phoneCreateService,
        protected PhoneUpdateService $phoneUpdateService,
    ){}

    public function index_people_phone($person_id): View
    {
        if (! Gate::allows('Ver e Listar Telefones')) {
            return abort(401);
        }

        try{
            $person = $this->peopleService->show($person_id);
            return view('admin.phone.people_phone', compact('person'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        PhoneCreateRequest $request
    ){
        if (! Gate::allows('Criar Telefones')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->phoneCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Registro criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao criar registro! ');
            return redirect()->back()->withInput();
        }
    }
    public function update(
        PhoneCreateRequest $request
    ){
        if (! Gate::allows('Editar Telefones')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->phoneUpdateService->update($request->toArray());

            flash('Registro editado com sucesso!')->success();
            session()->flash('success', ' Registro editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao editar registro!')->error();
            session()->flash('error', ' Erro ao editar registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($phone)
    {
        if (! Gate::allows('Deletar Telefones')) {
            return abort(401);
        }

        try{
            $phone = Phone::find($phone);
            $phone->delete();
            session()->flash('success', ' Deletado com Sucesso! ');
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
        }
        return redirect()->back()->withInput();
    }
}
