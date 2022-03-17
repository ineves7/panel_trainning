<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5 px-sm-5 pt-50">
        <div class="text-center mb-2">
          <h1 class="mb-1">Editar Informações do Usuário</h1>
          <p>altere no formulário os dados do usuário.</p>
        </div>
        <form id="editUserForm" action="{{ route('pessoas.update', $user->person->id) }}" class="row gy-1 pt-75">
          @csrf()
          @method('PUT')
          <div class="col-12">
            <label class="form-label" for="full_name">Nome Completo</label>
            <input
              type="text"
              id="full_name"
              name="full_name"
              class="form-control"
              placeholder="digite o nome"
              value="{{ $user->person->full_name }}"
              data-msg="Please enter your first name"
            />
          </div>
          <div class="col-12">
            <label class="form-label" for="social_name">Nome Social (apelido, alcunha, designação, etc)</label>
            <input
              type="text"
              id="social_name"
              name="social_name"
              class="form-control"
              placeholder="digite o nome social"
              value="{{ $user->person->social_name }}"
              data-msg="Please enter your last name"
            />
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label" for="genre">Gênero</label>
            <select
              id="genre"
              name="genre"
              class="form-select"
              aria-label="Default select example"
            >
            <option value="" class="">Tipos</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $user->person->genre===$genre->id ? 'selected' : '' }} >{{ $genre->type }}</option>
            @endforeach
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label" for="matrial_status">Estado Cívil</label>
            <select
              id="matrial_status"
              name="matrial_status"
              class="form-select"
              aria-label="Default select example"
            >
            <option value="" class="">Tipos</option>
            @foreach($matrial_statuses as $matrial_status)
                <option value="{{ $matrial_status->id }}" {{ $user->person->matrialStatus===$matrial_status->id ? 'selected' : '' }} >{{ $matrial_status->type }}</option>
            @endforeach
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label" for="birthdate">Data de Nascimento</label>
            <input
              type="date"
              id="birthdate"
              name="birthdate"
              class="form-control"
              value="{{ date('Y-m-d',strtotime($user->person->peopleable->birthdate)) }}"
            />
          </div>
          @foreach($user->person->documents as $document)
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserEmail">{{ $document->document_type->type }}:</label>
                <input type="number" class="form-control" name="documents[id][]" value="{{ $document->id }}" disabled hidden>
                <input type="text" class="form-control" name="documents[document_type][]" value="{{ $document->document_type_id }}" disabled hidden>
                <input type="text" class="form-control input-admin" value="{{ $document->document }}" id="{{ $document->document_type->type }}" name="documents[document][]">
            </div>
          @endforeach
          @foreach($user->person->phones as $phone)
            <div class="col-12 col-md-6">
              <label class="form-label" for="phone">Celular</label>
              <input
                type="text"
                id="phone"
                name="phone"
                class="form-control"
                value="{{ $phone->phone }}"
              />
            </div>
          @endforeach
          @foreach($user->person->addresses as $address)
            <div class="col-12 col-md-8">
              <label class="form-label" for="street">Endereço</label>
              <input
                type="text"
                id="street"
                name="street"
                class="form-control"
                value="{{ $address->street }}"
              />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label" for="number">Número</label>
              <input
                type="text"
                id="number"
                name="number"
                class="form-control"
                value="{{ $address->number }}"
              />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="complement">Complemento</label>
              <input
                type="text"
                id="complement"
                name="complement"
                class="form-control"
                value="{{ $address->complement }}"
              />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="neighborhood">Bairro</label>
              <input
                type="text"
                id="neighborhood"
                name="neighborhood"
                class="form-control"
                value="{{ $address->neighborhood }}"
              />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="postal_code">Código Postal</label>
              <input
                type="text"
                id="postal_code"
                name="postal_code"
                class="form-control"
                value="{{ $address->postal_code }}"
              />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="city_id">Cidade</label>
              <input
                type="text"
                id="city_id"
                name="city_id"
                class="form-control"
                value="{{ $address->city->name }}"
              />
            </div>
          @endforeach


          
          <div class="col-12 text-center mt-2 pt-50">
            <button type="submit" class="btn btn-primary me-1">Editar</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              Fechar sem Salvar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->
