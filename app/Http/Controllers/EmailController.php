<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailCreateRequest;
use App\Models\Email;
use App\Services\PeopleService;
use App\Services\EmailService;
use App\Services\EmailCreateService;
use App\Services\EmailUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EmailController extends Controller
{
    public function __construct(
        protected PeopleService $peopleService,
        protected EmailService $emailService,
        protected EmailCreateService $emailCreateService,
        protected EmailUpdateService $emailUpdateService,
    ){}

    public function index_people_email($person_id): View
    {
        if (! Gate::allows('Ver e Listar E-mails')) {
            return abort(401);
        }

        try{
            $person = $this->peopleService->show($person_id);
            return view('admin.email.people_email', compact('person'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        EmailCreateRequest $request
    ){
        if (! Gate::allows('Criar E-mails')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->emailCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Registro criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao adicionar registro! ');
            return redirect()->back()->withInput();
        }
    }
    public function update(
        EmailCreateRequest $request
    ){
        if (! Gate::allows('Editar E-mails')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->emailUpdateService->update($request->toArray());

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

    public function destroy($email)
    {
        if (! Gate::allows('Deletar E-mails')) {
            return abort(401);
        }

        try{
            $email = Email::find($email);
            $email->delete();
            session()->flash('success', ' Deletado com Sucesso! ');
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
        }
        return redirect()->back()->withInput();
    }
}
