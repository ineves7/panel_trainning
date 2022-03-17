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
          <form class="form form-horizontal" method="POST" action="{{ route('cadastrocaneca.store') }}" autocomplete="off">
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
                    autofocus
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Preço</label>
                  <input
                    type="number"
                    id="last-name-column"
                    class="form-control"
                    placeholder="Preço"
                    name="cost" 
                    list="numberspreco"
                  />

                  <datalist id="numberspreco">
                    <option value="10">
                    <option value="20">
                    <option value="30">
                    <option value="40">
                    <option value="50">
                  </datalist>


                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="city-column">Tamanho</label>
                  <input 
                  type="number" 
                  id="city-column" 
                  class="form-control" 
                  placeholder="Selecione o Tamanho" 
                  name="size" 
                  list = "numbers" />

                  <datalist id="numbers">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                    <option value="4">
                    <option value="5">
                  </datalist>

                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="country-floating">Data de Fabricação</label>
                  <input
                    type="date"
                    id="country-floating"
                    class="form-control"
                    name="making"
                    value="<?php
                            // Return current date from the remote server
                            $date = date('d-m-y h:i:s');
                          ?>"
                    placeholder="Data de Fabricação"
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="company-column">Descrição da Caneca</label>
                  <input
                    type="text"
                    id="company-column"
                    class="form-control"
                    name="description"
                    placeholder="Descrição da Caneca"
                  />
                </div>
              </div>
              
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1">Confirmar</button>
                <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
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

@component('admin.form.show')
@endcomponent


