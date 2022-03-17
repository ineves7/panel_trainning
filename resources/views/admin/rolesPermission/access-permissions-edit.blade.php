@extends('admin/layouts/contentLayoutMaster')

@section('title', 'permissions')

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
<h3 class="mt-50">Editar Permissão</h3>
<p class="mb-2">...</p>
<!-- table -->
<div class="card col-6">
  <div class="card-body ">
    <!-- Add role form -->
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
          <label class="form-label" for="name">Nome da permissão</label>
          <input
              type="text"
              id="name"
              name="name"
              class="form-control"
              placeholder="digite o nome da permissão"
              tabindex="-1"
              data-msg="Por favor, digite o nome da permissão"
              value="{{ old('name', isset($permission) ? $permission->name : '') }}" required
          />
        </div>
        <div class="col-md-12">
          <label class="form-label" for="description">Descrição</label>
          <input
              type="text"
              id="description"
              name="description"
              class="form-control"
              placeholder="digite a descrição"
              tabindex="-1"
              data-msg="Por favor, digite a descrição"
              value="{{ old('description', isset($permission) ? $permission->information->description : '') }}" required
          />
        </div>
        <div class="col-12 text-center mt-2">
        <button type="submit" class="btn btn-primary me-1"  style="position: relative; float: left;">Salvar</button>
    </form>
        
          <form method="POST" name="form-delete" action="{{ route('permissions.destroy', $permission->id) }}">
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
      $('.select-all').click(function () {
          let $select2 = $(this).parent().siblings('.select2')
          $select2.find('option').prop('selected', 'selected')
          $select2.trigger('change')
      });
      $('.deselect-all').click(function () {
          let $select2 = $(this).parent().siblings('.select2')
          $select2.find('option').prop('selected', '')
          $select2.trigger('change')
      });
      $(".select2").select2({
      });
      
      })
  </script>
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
