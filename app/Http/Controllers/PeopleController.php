<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\People\PeopleResource;
use Illuminate\Http\Request;
use App\Models\People;
use App\Services\PeopleService;
use App\Services\PeopleCreateService;
use App\Services\PeopleUpdateService;
use App\Http\Requests\PeopleCreateRequest;
use App\Http\Requests\PeopleUpdateRequest;
use App\Models\Audit;
use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\DocumentType;
use App\Models\Genre;
use App\Models\MatrialStatus;
use App\Models\Occupation;
use App\Models\State;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PeopleController extends Controller
{
    public function __construct(
        protected PeopleCreateService $peopleCreateService,
        protected PeopleUpdateService $peopleUpdateService,
        protected PeopleService $peopleService
    ){}

    public function index(): View
    {
        /*if (! Gate::allows('Ver e Listar Pessoas')) {
            return abort(401);
        }*/

        $pageConfigs = ['pageHeader' => false];

        $users = User::with('person')->latest()->get(['id', 'email', 'people_id']);
        return view('/admin/user/index', ['pageConfigs' => $pageConfigs], compact('users'));
    }

    public function show($user_id): View
    {
        try{
            $audits = Audit::where('user_id', $user_id)->get();
            $user = User::find($user_id);
            $genres = Genre::all();
            $matrial_statuses = MatrialStatus::all();
            $states = State::all();
            $cities = City::all();
            $countries = Country::all();
            return view('admin.user.show', compact('audits', 'user', 'genres', 'matrial_statuses',  'countries', 'states', 'cities' ));
        } catch (\Throwable $throwable) {
            session()->flash('error', ' Erro ao Buscar! ');
            return redirect()->back()->withInput();
        }
    }

    public function create(): View
    {
        /*if (! Gate::allows('Criar Pessoas')) {
            return abort(401);
        }*/

        $pageConfigs = ['pageHeader' => false];

        $genres = Genre::all();
        $matrial_statuses = MatrialStatus::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $units = Unit::all();
        $departaments = Departament::all();
        $occupations = Occupation::all();

        return view('admin.user.create', ['pageConfigs' => $pageConfigs], compact('occupations', 'units', 'departaments', 'genres', 'matrial_statuses', 'countries', 'states', 'cities'));

    }

    public function store(
        PeopleCreateRequest $request
    ){
        
        //dd($request->all());
        /*if (! Gate::allows('Criar Pessoas')) {
            return abort(401);
        }*/
        //dd($request->all());
        try {
            DB::beginTransaction();
            /*$request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
            ]);*/
            //dd($request->all());

            //sending to storage path
            $path = $request->file( key:'profile_photo')->store( path: 'public/images/profile');
            $path = str_replace("public/", "storage/", $path);
            
            $request->request->add(['profile_photo_path' => $path]);
            
            $this->peopleCreateService->create($request->toArray());
            session()->flash('success', ' Registro criado com sucesso! ');
            DB::commit();

            $pageConfigs = ['pageHeader' => false];
            $users = User::with('person')->latest()->get(['id', 'email', 'people_id']);
            return view('/admin/user/index', ['pageConfigs' => $pageConfigs], compact('users'));
        }catch (\Throwable $throwable){
            DB::rollBack();
            dd($throwable);
            session()->flash('error', ' Erro ao adicionar registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function update(
        PeopleUpdateRequest $request, $people_id
    ){
        /*if (! Gate::allows('Editar Pessoas')) {
            return abort(401);
        }*/
        
        try {
            DB::beginTransaction();
            $this->peopleUpdateService->update($request->toArray(), $people_id);

            session()->flash('success', ' Registro editado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            session()->flash('error', ' Erro ao editar registro! ');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($person)
    {
        /*if (! Gate::allows('Deletar Pessoas')) {
            return abort(401);
        }*/

        try{
            $person = People::find($person);
            $person->delete();
            session()->flash('success', ' Deletado com Sucesso! ');
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
        }
        $people = $this->peopleService->paginate(10);
        return view('admin.user.index', compact('people'));
    }
}
