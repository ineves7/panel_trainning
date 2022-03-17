@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection
@section('content')
<h3 class="mt-50">Editar Regra</h3>
<p class="mb-2">selecione as permissões a serem vinculadas a uma nova regra.</p>
<!-- table -->
<div class="card col-6">
  <div class="card-body ">
    <!-- Add role form -->
    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
          <label class="form-label" for="name">Nome da Regra</label>
          <input
              type="text"
              id="name"
              name="name"
              class="form-control"
              placeholder="digite o nome da regra"
              tabindex="-1"
              data-msg="Por favor, digite o nome da regra"
              value="{{ old('name', isset($role) ? $role->name : '') }}" required
          />
        </div>
        <div class="col-12">
        <h4 class="mt-2 pt-50">Permissões</h4>
        
          <div class="col-12">
            <h4 class="mt-2 pt-50">Permissões</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="fw-bolder">
                      Acesso Master
                      <span data-bs-toggle="tooltip" data-bs-placement="top" title="Permitir acesso a todo o sistema">
                        <i data-feather="info"></i>
                      </span>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checktAll" />
                        <label class="form-check-label" for="checktAll"> Todos </label>
                      </div>
                    </td>
                  </tr>
                    @foreach($permissions as $id => $permissions)
                      <tr>
                        <td class="fw-bolder">{{ $permissions }}</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input check-input" value="{{$id}}" type="checkbox" name="permissions[]" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('id', 'name')->contains($id)) ? 'checked' : '' }}/>
                              <label class="form-check-label" for="userManagementCreate"> Selecionar </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>

        </div>
        <div class="col-12 text-center mt-2">
        <button type="submit" class="btn btn-primary me-1"  style="position: relative; float: left;">Salvar</button>
    </form>
        
          <form method="POST" name="form-delete" action="{{ route('roles.destroy', $role->id) }}">
              @csrf()
              @method('delete')
              <button type="submit" class="btn btn-danger"  style="position: relative; float: left;"
                onclick="return confirm('Tem certeza que deseja deletar?');">Deletar
              </button>
          </form>
        </div>
    <!--/ Add role form -->
  </div>
</div>
<!-- table -->

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
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script>
      $(document).ready(function () {
      $('.check-all').click(function () {
          let $checkInput = document.getElementsByClassName("check-input");
          for (var i = 0; i < $checkInput.length; i++) {
            if($checkInput[i].checked === true){
              $checkInput[i].checked = false;
            }
            else{
              $checkInput[i].checked = true;
            }
          }
      });
      })
  </script>
@endsection
