<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\DocumentResource;
use App\Http\Requests\DocumentCreateRequest;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Services\PeopleService;
use App\Services\DocumentService;
use App\Services\DocumentCreateService;
use App\Services\DocumentUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DocumentController extends Controller
{
    public function __construct(
        protected PeopleService $peopleService,
        protected DocumentService $documentService,
        protected DocumentCreateService $documentCreateService,
        protected DocumentUpdateService $documentUpdateService,
    ){}

    public function index_people_document($person_id): View
    {
        if (! Gate::allows('Ver e Listar Documentos')) {
            return abort(401);
        }

        try{
            $type_documents = DocumentType::all();
            $person = $this->peopleService->show($person_id);
            return view('admin.document.people_document', compact('person', 'type_documents'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o registro! ');
            return redirect()->back()->withInput();
        }
    }
    
    public function update(
        DocumentCreateRequest $request
    ){
        if (! Gate::allows('Editar Documentos')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->documentUpdateService->update($request->toArray());

            flash('Registro editado com sucesso!')->success();
            session()->flash('success', ' Documento editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao editar registro!')->error();
            session()->flash('error', ' Erro ao editar! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        DocumentCreateRequest $request
    ){
        if (! Gate::allows('Criar Documentos')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->documentCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Registro criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao criar o documento! ');
            return redirect()->back()->withInput();
        }
    }
    

    public function destroy($document)
    {
        if (! Gate::allows('Deletar Documentos')) {
            return abort(401);
        }

        try{
            $document = Document::find($document);
            $document->delete();
            session()->flash('success', ' Deletado com Sucesso! ');
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
        }
        return redirect()->back()->withInput();
    }
}
