<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\City;
use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Services\AddressService;
use App\Services\AddressCreateService;
use App\Services\AddressUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;

class AddressController extends Controller
{
    public function __construct(
        protected AddressService $addressService,
        protected AddressCreateService $addressCreateService,
        protected AddressUpdateService $addressUpdateService,
    ){}

    public function index_travel($travel_id)
    {
        if (! Gate::allows('Ver e Listar Endereços')) {
            return abort(401);
        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
        try{
            $states = State::all();
            $cities = City::all();
            $countries = Country::all();
            return view('admin.travel.address', compact('travel', 'addresses', 'states', 'cities', 'countries'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao listar os endereços! ');
            return redirect()->back()->withInput();
        }
    }

    public function show_travel($address_id)
    {
        if (! Gate::allows('Ver e Listar Endereços')) {
            return abort(401);
        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
        try{
            $states = State::all();
            $cities = City::all();
            $countries = Country::all();
            return view('admin.travel.address_show', compact('states', 'cities', 'countries'));
        } catch (\Throwable $throwable) {
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o endereço! ');
            return redirect()->back()->withInput();
        }
    }

    public function store(
        AddressRequest $request
    ){
        if (! Gate::allows('Criar Endereços')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->addressCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('address-success', ' Endereço criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('address-error', ' Erro ao adicionar o endereço! ');
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

    public function update(
        AddressRequest $request, $address_id
    ){
        if (! Gate::allows('Editar Endereços')) {
            return abort(401);
        }

        try {
            DB::beginTransaction();
            $this->addressTravelUpdateService->update($request->toArray(), $address_id);

            flash('Registro editado com sucesso!')->success();
            session()->flash('address-success', ' Endereço editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            dd($throwable);
            flash('Erro ao editar registro!')->error();
            session()->flash('address-error', ' Erro ao editar o endereço! ');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($address)
    {
        if (! Gate::allows('Deletar Endereços')) {
            return abort(401);
        }

        try{
            $address = Address::find($address);
            $address->delete();
            session()->flash('address-success', ' Deletado com Sucesso! ');
        } catch (\Exception $exception) {
            session()->flash('address-error', ' Erro ao Deletar! ');
        }
        return redirect()->back()->withInput();
    }
    
    public function getCidades(int $idEstado): JsonResponse
    {
        $cidades = City::where('state_id', $idEstado)->orderBy('name')->get();
        return Response::json($cidades);
    }
}
