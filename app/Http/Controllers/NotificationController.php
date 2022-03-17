<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Models\NotificationStatus;
use App\Models\NotificationType;
use App\Models\NotificationUser;
use App\Models\User;
use App\Services\NotificationService;
use App\Services\NotificationCreateService;
use App\Services\NotificationUpdateService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{
    public function __construct(
        protected NotificationService $notificationService,
        protected NotificationCreateService $notificationCreateService,
        protected NotificationUpdateService $notificationUpdateService,
    ){}

    public function index(): View
    {
        /*if (! Gate::allows('Ver e Listar Notificationos')) {
            return abort(401);
        }*/

        try{
            //user notifications
            $notifications = Notification::with('users')->whereRelation('users', 'user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

            $statuses = NotificationStatus::orderBy('status', 'asc')->get();
            $types = NotificationType::orderBy('title', 'asc')->get();
            $users = User::with('person')->latest()->get(['id', 'email', 'people_id']);
            return view('admin.notification.index', compact('notifications', 'users', 'statuses', 'types'));
        } catch (\Throwable $throwable) {
            dd($throwable);
            flash('Erro ao buscar registro!')->error();
            session()->flash('error', ' Erro ao buscar o registro! ');
            return redirect()->back()->withInput();
        }
    }
    
    public function update(
        NotificationRequest $request
    ){
        /*if (! Gate::allows('Editar Notificationos')) {
            return abort(401);
        }*/

        try {
            DB::beginTransaction();
            $this->notificationUpdateService->update($request->toArray());

            flash('Registro editado com sucesso!')->success();
            session()->flash('success', ' Notificationo editado com sucesso! ');
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
        NotificationRequest $request
    ){
        /*if (! Gate::allows('Criar Notificationos')) {
            return abort(401);
        }*/
        try {
            DB::beginTransaction();
            $this->notificationCreateService->create($request->toArray());

            flash('Registro criado com sucesso!')->success();
            session()->flash('success', ' Registro criado com sucesso! ');
            DB::commit();
            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            flash('Erro ao adicionar registro!')->error();
            session()->flash('error', ' Erro ao criar o Notificationo! ');
            return redirect()->back()->withInput();
        }
    }
    

    public function destroy($notification)
    {
        /*if (! Gate::allows('Deletar Notificationos')) {
            return abort(401);
        }*/

        try{
            $notification = Notification::find($notification);
            $notification->delete();
            session()->flash('success', ' Deletado com Sucesso! ');
        } catch (\Exception $exception) {
            session()->flash('error', ' Erro ao Deletar! ');
        }
        return redirect()->back()->withInput();
    }
}
