@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Permission')

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
<h3>Lista de Permissões</h3>
<p>detlhar.</p>

<!-- Role cards -->
<div class="row">
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
              href="{{ route('permissions.create') }}"
              class="stretched-link text-nowrap add-new-role"
            >
              <span class="btn btn-primary mb-1">Adicionar Nova Permissão</span>
            </a>
            <p class="mb-0">Adicione .., se ela não existir</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Role cards -->

<!-- Permission Table -->
<div class="card">
  <div class="card-body">
    <div class="card-datatable">
        <div class="table-responsive">
          <table class="dt-advanced-search table">
            <thead class="">
              <tr>
                <th></th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Acesso</th>
                <th>Registrado em</th>
                <th>Sistema</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Acesso</th>
                <th>Registrado em</th>
                <th>Sistema</th>
              </tr>
            </tfoot>
            <tbody>
              @php $i = 0; @endphp
              @foreach($permissions as $permission)
                @if($i == 0)
                  @php $i = 1; @endphp
                  <tr class="odd">
                @else
                  @php $i = 0; @endphp
                  <tr class="even">
                @endif
                    <td class="control sorting_1" tabindex="0" ></td>
                    <td style="display: none;">{{ $permission->name }}</td>
                    <td style="display: none;">{{ $permission->information->description }}</td>
                    <td style="display: none;" class="row">
                      <div class="">
                        @php $i = 1; @endphp
                        @foreach($permission->roles as $role)
                          @if($i == 1)
                            <span class="badge rounded-pill bg-primary">{{ isset($role->name) ? $role->name : '' }}</span>
                          @endif
                          @if($i == 2)
                            <span class="badge rounded-pill bg-secondary">{{ isset($role->name) ? $role->name : '' }}</span>
                          @endif
                          @if($i == 3)
                            <span class="badge rounded-pill bg-success">{{ isset($role->name) ? $role->name : '' }}</span>
                            @php $i = 0; @endphp
                          @endif
                          @php $i++; @endphp
                        @endforeach
                      </div>
                    </td>
                    <td style="display: none;">{{($permission->created_at)->format('d/M/y H:m:s')}}</td>
                    <td style="display: none;">
                      
                      <div class="btn-group">
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-icon btn-icon rounded-circle btn-flat-primary">
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
<!--/ Permission Table -->

@include('content/_partials/_modals/modal-add-permission')
@include('content/_partials/_modals/modal-edit-permission')
@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/modal-add-permission.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-permission.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/tables/permission.js')) }}"></script>
@endsection
