@extends('admin/layouts/contentLayoutMaster')

@section('title', 'User View - Account')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <a
                data-bs-toggle="collapse"
                href="#editPhoto"
                role="button"
                aria-expanded="false"
                aria-controls="editPhoto"
              >
                <img
                  class="img-fluid rounded mt-3 mb-2"
                  src="{{ isset($user->profile_photo_path) ? asset($user->profile_photo_path) : asset('images/portrait/small/avatar-icon.png') }}"
                  height="110"
                  width="110"
                  alt="User avatar"
                  data-bs-toggle="tooltip" title="Editar Foto"
                />
              </a>
              <div class="collapse mb-2" id="editPhoto">
                <div class="d-flex p-1 border">
                  <form id="formChangePhoto" method="POST" action="{{ route('update-photo') }}"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{ $user->id }}" id="user_photo" name="user_photo" />

                    <div class="row">
                      <div class="mb-2 col-md-12 ">
                        <label class="form-label" for="password">Alterar Foto de Perfil</label>
                        <div class="input-group ">
                          <input type="file" class="form-control" id="profile_photo" name="profile_photo" >
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-primary me-2">Alterar Foto</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="user-info text-center">
                <h4>{{ isset($user->person) ? (isset($user->person->social_name) ? $user->person->social_name : ( isset($user->person->full_name) ? $user->person->full_name : $user->name ) ) : $user->name }}</h4>
                <span class="badge bg-light-secondary">
                  @php $i = 0; @endphp
                  @foreach($user->occupations as $occupation)
                    @if($i == 0)
                      @php $i = 1; @endphp
                      {{ $occupation->title }}
                    @else
                      @php $i = 0; @endphp
                      {{ ', ' . $occupation->title }}
                    @endif
                  @endforeach
                </span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-around my-2 pt-75">
            <div class="d-flex align-items-start me-2">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="check" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">1.23k</h4>
                <small>Diárias Feitas</small>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="briefcase" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">568</h4>
                <small>Diárias Agendadas</small>
              </div>
            </div>
          </div>
          <h4 class="fw-bolder border-bottom pb-50 mb-1">Detalhes</h4>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-75">
                <span class="fw-bolder me-25">Nome de Usuário:</span>
                <span>{{$user->name}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">E-mail de Cadastro:</span>
                <span>{{$user->email}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Status:</span>
                <span class="badge bg-light-{{ isset($user->person->status) ? ( $user->person->status == 'active' ? 'success' : 'danger' ) : 'warning'}}">
                {{ isset($user->person->status) ? ( $user->person->status == 'active' ? 'Ativo' : 'Bloqueado' ) : '-'}}
                </span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Gênero:</span>
                <span>{{ isset($user->person->genreData) ? $user->person->genreData->type : '' }}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Estado Cívil:</span>
                <span>{{ isset($user->person->matrialStatus->type) ? $user->person->matrialStatus->type : '' }}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Funções:</span>
                <span>
                  @php $i = 0; @endphp
                  @foreach($user->occupations as $occupation)
                    @if($i == 0)
                      @php $i = 1; @endphp
                      {{ $occupation->departament->departament . ' (' . $occupation->title . ')' }}
                    @else
                      @php $i = 0; @endphp
                      {{ ', ' . $occupation->departament->departament . ' (' . $occupation->title . ')' }}
                    @endif
                  @endforeach
                </span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Contato:</span>
                <span>
                  @if(isset($user->person->phones))
                    @php $i = 0; @endphp
                    @foreach($user->person->phones as $phone)
                      @if($i == 0)
                        @php $i = 1; @endphp
                        {{ $phone->phone }}
                      @else
                        @php $i = 0; @endphp
                        {{ ', ' . $phone }}
                      @endif
                    @endforeach
                  @else
                  {{'-'}}
                  @endif
                </span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Endereço:</span>
                <span>
                  @if(isset($user->person->addresses))
                    @php $i = 0; @endphp
                    @foreach($user->person->addresses as $address)
                      @if($i == 0)
                        @php $i = 1; @endphp
                        {{  $address->city->name . ' - ' . 
                            $address->street . ' - ' . 
                            $address->number . ' - ' . 
                            $address->complement . ' - ' .
                            $address->neighborhood . ' - ' .
                            $address->postal_code 
                        }}
                      @else
                        @php $i = 0; @endphp
                        {{ ', ' . $phone }}
                      @endif
                    @endforeach
                  @else
                  {{'-'}}
                  @endif
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User menu e dados Start -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="sistem-tab-justified"
                data-bs-toggle="pill"
                href="#sistem-justified"
                aria-expanded="true"
                >Sistema</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="edit-tab-justified"
                data-bs-toggle="pill"
                href="#edit-justified"
                aria-expanded="false"
                >Editar</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="security-tab-justified"
                data-bs-toggle="pill"
                href="#security-justified"
                aria-expanded="false"
                >Segurança</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="notification-tab-justified"
                data-bs-toggle="pill"
                href="#notification-justified"
                aria-expanded="false"
                >Notificações</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <!-- Sistema -->
            <div role="tabpanel" class="tab-pane active" id="sistem-justified" aria-labelledby="sistem-tab-justified" aria-expanded="true" >
              <!-- Project table -->
              <div class="card">
                <h4 class="card-header">Lista de de Datas Agendadas</h4>
                <div class="table-responsive">
                  <table class="table datatable-project">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Agenda</th>
                        <th class="text-nowrap">Total Task</th>
                        <th>Progress</th>
                        <th>Data / Turno</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              <!-- /Project table -->

              <!-- Activity Timeline -->
              <div class="card">
                <h4 class="card-header">Linha do Tempo de Atividades</h4>
                <div class="card-body pt-1">
                  <ul class="timeline ms-50">
                    <li class="timeline-item">
                      <span class="timeline-point timeline-point-indicator"></span>
                      <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                          <h6>User login</h6>
                          <span class="timeline-event-time me-1">12 min ago</span>
                        </div>
                        <p>User login at 2:12pm</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                      <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                          <h6>Meeting with john</h6>
                          <span class="timeline-event-time me-1">45 min ago</span>
                        </div>
                        <p>React Project meeting with john @10:15am</p>
                        <div class="d-flex flex-row align-items-center mb-50">
                          <div class="avatar me-50">
                            <img
                              src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                              alt="Avatar"
                              width="38"
                              height="38"
                            />
                          </div>
                          <div class="user-info">
                            <h6 class="mb-0">Leona Watkins (Client)</h6>
                            <p class="mb-0">CEO of pixinvent</p>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                      <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                          <h6>Create a new react project for client</h6>
                          <span class="timeline-event-time me-1">2 day ago</span>
                        </div>
                        <p>Add files to new design folder</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                      <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                          <h6>Create Invoices for client</h6>
                          <span class="timeline-event-time me-1">12 min ago</span>
                        </div>
                        <p class="mb-0">Create new Invoices and send to Leona Watkins</p>
                        <div class="d-flex flex-row align-items-center mt-50">
                          <img class="me-1" src="{{asset('images/icons/pdf.png')}}" alt="data.json" height="25" />
                          <h6 class="mb-0">Invoices.pdf</h6>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /Activity Timeline -->
            </div>
            <!-- edição -->
            <div role="tabpanel" class="tab-pane" id="edit-justified" aria-labelledby="edit-tab-justified" aria-expanded="false" >
              <!-- Editar Informações do Usuário -->
              <div class="card">
                <h4 class="card-header">Editar Informações do Usuário</h4>
                <div class="card-body pt-1">
                  @if(isset($user->person))
                    <form id="editUserForm" method="POST" action="{{ route('pessoas.update', $user->person->id) }}" class="row gy-1 pt-75">
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
                            <option value="{{ $matrial_status->id }}" {{ $user->person->matrial_status===$matrial_status->id ? 'selected' : '' }} >{{ $matrial_status->type }}</option>
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
                            <input type="number" class="form-control" name="documents[id][]" value="{{ $document->id }}"  hidden>
                            <input type="text" class="form-control" name="documents[document_type][]" value="{{ $document->document_type_id }}"  hidden>
                            <input type="text" class="form-control input-admin" value="{{ $document->document }}" id="{{ $document->document_type->type }}" name="documents[document][]">
                        </div>
                      @endforeach
                      @foreach($user->person->phones as $phone)
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Celular</label>
                          <input type="number" class="form-control" name="phones[id][]" value="{{ $phone->id }}" hidden>
                          <input
                            type="text"
                            id="{{ 'phone-' . $phone->id }}"
                            name="phones[phone][]"
                            class="form-control"
                            value="{{ $phone->phone }}"
                          />
                        </div>
                      @endforeach
                      @foreach($user->person->addresses as $address)
                          <input type="number" class="form-control" name="address_id" value="{{ $address->id }}" hidden>
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
                          <select
                            id="{{ 'city-' . $address->id }}"
                            name="city_id"
                            class="form-select"
                            aria-label="Default select example"
                          >
                          <option value="" class="">Tipos</option>
                          @foreach($cities as $city)
                              <option value="{{ $city->id }}" {{ $city->id === $address->city->id ? 'selected' : '' }} >{{ $city->state->uf . ' - ' . $city->name }}</option>
                          @endforeach
                          </select>
                        </div>
                      @endforeach


                      
                      <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1" style="position: relative; float: left;">Editar</button>
                    </form>
                    <form method="POST" name="form-delete" action="{{ route('pessoas.destroy', $user->person->id) }}">
                        @csrf()
                        @method('delete')
                        <button type="submit" class="btn btn-danger"  style="position: relative; float: left;"
                          onclick="return confirm('Tem certeza que deseja deletar?');">Deletar
                        </button>
                    </form>
                    </div>
                  @endif
                </div>
              </div>
              <!-- /Editar Informações do Usuário -->
            </div>
            <!-- segurança -->
            <div class="tab-pane" id="security-justified" role="tabpanel" aria-labelledby="security-tab-justified" aria-expanded="false" >

              <!-- Change Password -->
              <div class="card">
                <h4 class="card-header">Alterar Senha</h4>
                <div class="card-body">
                  <form id="formChangePassword" method="POST" action="{{ route('update-password') }}">
                    @csrf
                    <input type="text" value="{{ $user->id }}" id="user_id" name="user_id" hidden/>

                    <div class="alert alert-warning mb-2" role="alert">
                      <h6 class="alert-heading">Garanta que estes requerimentos sejam atendidos.</h6>
                      <div class="alert-body fw-normal">Mínimo de 8 caracteres, letras maiúsculas, minúsculas e símbolo.</div>
                    </div>

                    <div class="row">
                      <div class="mb-2 col-md-6 form-password-toggle">
                        <label class="form-label" for="password">Nova Senha</label>
                        <div class="input-group input-group-merge form-password-toggle">
                          <input
                            class="form-control"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          />
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                          </span>
                        </div>
                      </div>

                      <div class="mb-2 col-md-6 form-password-toggle">
                        <label class="form-label" for="password_confirmation">Confirmar Nova Senha</label>
                        <div class="input-group input-group-merge">
                          <input
                            class="form-control"
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          />
                          <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-primary me-2">Alterar Senha</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Change Email -->
              <div class="card">
                <h4 class="card-header">Alterar E-mail</h4>
                <div class="card-body">
                  <form id="formChangeEmail" method="POST" action="{{ route('update-email') }}">
                    @csrf
                    <input type="text" value="{{ $user->id }}" id="user" name="user" hidden/>

                    <div class="row">
                      <div class="mb-2 col-md-6 form-password-toggle">
                        <label class="form-label" for="password">Novo E-mail</label>
                        <div class="input-group input-group-merge ">
                          <input
                            class="form-control"
                            type="email"
                            id="email"
                            name="email"
                          />
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                          </span>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-primary me-2">Alterar E-mail</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!--/ Change Password -->
              <!--/ Change Password --><!-- two-step verification -->
              <div class="card">
                <div class="card-header border-bottom">
                  <h4 class="card-title">Autentificação de dois fatores</h4>
                </div>
                <div class="card-body my-2 py-25"> 
                  <form action="/user/two-factor-authentication" method="post">
                    @csrf
                      @if(auth()->user()->two_factor_secret)
                        @method('DELETE')
                        <p class="fw-bolder">A autentificação de dois fatores está ativada.</p>
                        <div class="mt-2 mb-2">
                          {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                        <div class="mt-2 mb-2">
                          <p>Lista de Códigos de Recuperação</p>
                          <ul>
                            @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                              <li>{{ $code }}</li>
                            @endforeach
                          </ul>
                        </div>
                        <button class="btn btn-primary">
                          Desativar autentificação de dois fatores
                        </button>
                      @else
                        <p class="fw-bolder">A autentificação de dois fatores ainda não está ativada.</p>
                        <p>
                        A autenticação de dois fatores adiciona uma camada adicional de segurança à sua conta,  <br />
                        exigindo mais do que apenas uma senha para fazer login. Saiba Mais.
                        </p>
                        <button class="btn btn-primary">
                          Ativar autentificação de dois fatores
                        </button>
                      @endif
                      
                  </form>
                </div>
              </div>
              <!-- / two-step verification -->

              <!-- recent device -->
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent devices</h4>
                </div>
                <div class="table-responsive">
                  <table class="table text-nowrap text-center">
                    <thead>
                      <tr>
                        <th class="text-start">BROWSER</th>
                        <th>DEVICE</th>
                        <th>LOCATION</th>
                        <th>RECENT ACTIVITY</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($audits as $audit)
                        <tr>
                          <td class="text-start">
                            <div class="avatar me-25">
                              <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                            </div>
                            <span class="fw-bolder">{{ $audit->user_agent }}</span>
                          </td>
                          <td>Dell XPS 15</td>
                          <td>United States</td>
                          <td>10, Jan 2021 20:07</td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- / recent device -->
            </div>
            <!-- notificações -->
            <div class="tab-pane" id="notification-justified" role="tabpanel" aria-labelledby="notification-tab-justified" aria-expanded="false" >

              <!-- notifications -->

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-50">Notifications</h4>
                  <p class="mb-0">Change to notification settings, the user will get the update</p>
                </div>
                <div class="table-responsive">
                  <table class="table text-nowrap text-center border-bottom">
                    <thead>
                      <tr>
                        <th class="text-start">Type</th>
                        <th>✉️ Email</th>
                        <th>🖥 Browser</th>
                        <th>👩🏻‍💻 App</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-start">New for you</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck2" />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3" />
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-start">Account activity</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck4" />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-start">A new browser used to sign in</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck9" checked />
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-start">A new device is linked</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck10" />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck11" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-body">
                  <button type="submit" class="btn btn-primary me-1">Save changes</button>
                  <button type="reset" class="btn btn-outline-secondary">Discard</button>
                </div>
              </div>

              <!--/ notifications -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- User menu e dados End -->

  </div>
</section>

@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  {{-- data table --}}
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
@endsection
