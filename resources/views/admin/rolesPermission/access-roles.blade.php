@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<h3>Lista de Regras</h3>
<p class="mb-2">
  As regras provém acesso determinados menus e ferramentas de acordo <br />
  no nível de acesso do usuário.
</p>

<!-- Role cards -->
<div class="row">
  @foreach($roles as $role)
    <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <span>Total {{ count($role->users) }} usuários</span>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
              @foreach($role->users as $user)
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="{{ isset($user->person) ? (isset($user->person->social_name) ? $user->person->social_name : $user->person->full_name) : $user->name }}"
                  class="avatar avatar-sm pull-up"
                >
                  <img class="rounded-circle" src="{{ isset($user->profile_photo_path) ? asset($user->profile_photo_path) : asset('images/portrait/small/avatar-icon.png') }}" alt="Avatar" />
                </li>
              @endforeach
            </ul>
          </div>
          <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
            <div class="role-heading">
              <h4 class="fw-bolder">{{ $role->name }}</h4>
              <a href="{{ route('roles.edit', $role) }}" class="role-edit-modal" >
                <small class="fw-bolder">Editar Regra</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="row">
        <div class="col-sm-5">
          <div class="d-flex align-items-end justify-content-center h-100">
            <img
              src="{{asset('images/illustration/faq-illustrations.svg')}}"
              class="img-fluid mt-2"
              alt="Image"
              width="85"
            />
          </div>
        </div>
        <div class="col-sm-7">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <a
              href="{{ route('roles.create') }}"
              class="stretched-link text-nowrap add-new-role"
            >
              <span class="btn btn-primary mb-1">Adicionar Nova Regra</span>
            </a>
            <p class="mb-0">Adicione uma regra, se ela não existir</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Role cards -->

<h3 class="mt-50">Todos os Usuários com suas Regras</h3>
<p class="mb-2">Encontre todos os usuários do sistema e suas respectivas regras.</p>
<!-- table -->
<div class="card">
  <div class="card-body">
    <div class="card-datatable">
      <div class="table-responsive">
        <table class="dt-advanced-search table">
          <thead class="">
            <tr>
              <th></th>
              <th>Usuário</th>
              <th>Regras</th>
              <th>Setor</th>
              <th>Status</th>
              <th>Registrado em</th>
              <th>Sistema</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th></th>
              <th>Nome</th>
              <th>Regras</th>
              <th>Setor</th>
              <th>Status</th>
              <th>Registrado em</th>
              <th>Sistema</th>
            </tr>
          </tfoot>
          <tbody>
            @php $i = 0; @endphp
            @foreach($users as $user)
              @if($i == 0)
                @php $i = 1; @endphp
                <tr class="odd">
              @else
                @php $i = 0; @endphp
                <tr class="even">
              @endif
                  <td class="control sorting_1" tabindex="0" ></td>
                  <td style="display: none;">
                    {{ isset($user->person) ? (isset($user->person->social_name) ? $user->person->social_name : ( isset($user->person->full_name) ? $user->person->full_name : $user->name ) ) : $user->name }}  
                  </td>
                  <td style="display: none;">
                    @foreach($user->roles as $role)
                      {{ $role->name }}
                    @endforeach
                  </td>
                  <td style="display: none;">
                    <div class="">
                      @if(isset($user->person))
                        @php $i = 1; @endphp
                        @foreach($user->person->departaments as $departament)
                          @if($i == 1)
                            <span class="badge rounded-pill bg-primary">{{ isset($departament->departament) ? $departament->departament : '' }}</span>
                          @endif
                          @if($i == 2)
                            <span class="badge rounded-pill bg-secondary">{{ isset($departament->departament) ? $departament->departament : '' }}</span>
                          @endif
                          @if($i == 3)
                            <span class="badge rounded-pill bg-success">{{ isset($departament->departament) ? $departament->departament : '' }}</span>
                            @php $i = 0; @endphp
                          @endif
                          @php $i++; @endphp
                        @endforeach
                      @else
                        <span class="badge rounded-pill bg-danger">{{ ' - ' }}</span>
                      @endif
                    </div>
                  </td>
                  <td style="display: none;">
                    <span class="badge bg-light-{{ isset($user->person->status) ? ( $user->person->status == 'active' ? 'success' : 'danger' ) : 'warning'}}">
                      {{ isset($user->person->status) ? ( $user->person->status == 'active' ? 'Ativo' : 'Bloqueado' ) : '-'}}
                    </span>
                  </td>
                  <td style="display: none;">{{($user->created_at)->format('d/M/y H:m:s')}}</td>
                  <td style="display: none;">
                    
                    <div class="btn-group">
                      <a href="{{ route('pessoas.show',  $user->id) }}" class="btn btn-icon btn-icon rounded-circle btn-flat-primary">
                        <i data-feather="edit"></i>
                      </a>
                      <button
                        class="btn btn-flat-primary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton100"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                      <i data-feather="menu"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton100">
                        <a class="dropdown-item" href="#">Bloquear</a>
                        <a class="dropdown-item" href="#">Relatório</a>
                      </div>
                    </div>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- table -->

@include('content/_partials/_modals/modal-add-role')
@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/tables/roles.js')) }}"></script>
@endsection
