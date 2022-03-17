@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Form Layouts')

@section('content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Cadastrar Canecas</h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal" method="POST" action="">
          @csrf()
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="first-name-column">Nome</label>
                  <input
                    type="text"
                    id="name"
                    class="form-control"
                    placeholder="Nome da Caneca"
                    name="name"
                    value= "{{ $mug->name }}"
                    autofocus
                  />

                  <label class="form-label" for="first-name-column">Valor</label>
                  <input
                    type="text"
                    id="cost"
                    class="form-control"
                    placeholder="Nome da Caneca"
                    name="cost"
                    value= "{{ $mug->cost }}"

                  />

                  <label class="form-label" for="first-name-column">Tamanho</label>
                  <input
                    type="number"
                    id="size"
                    class="form-control"
                    placeholder="Nome da Caneca"
                    name="size"
                    value= "{{ $mug->size }}"
                    
                  />

                  <label class="form-label" for="first-name-column">Data de Fabricação</label>
                  <input
                    type="text"
                    id="making"
                    class="form-control"
                    placeholder="Nome da Caneca"
                    name="making"
                    value= "{{ $mug->making }}"
                    
                  />

                  <label class="form-label" for="first-name-column">Descrição</label>
                  <input
                    type="text"
                    id="description"
                    class="form-control"
                    placeholder="Nome da Caneca"
                    name="description"
                    value= "{{ $mug->description }}"
                    
                  />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Basic Floating Label Form section end -->
@endsection



