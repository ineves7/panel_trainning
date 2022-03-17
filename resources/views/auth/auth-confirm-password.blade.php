@php
$configData = Helper::applClasses();
@endphp
@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Two Steps Cover')

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
<div class="app-user-view-account">
  <div class=" row">

    <!-- two steps verification v2-->
    <div class="card d-flex col-lg-4 align-items-center auth-bg px-2 ">
      <div class="card-body col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="mt-2">Confirmar Senha</h2>
        <p class="card-text mb-75">We sent a verification code to your mobile. Enter the code from the mobile in the field below.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="col-12 mb-1">
              <label class="form-label" for="occupation_id">Senha</label>
              <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                required autocomplete="current-password" autofocus
              />
            </div>
            <button class="btn btn-primary w-100 mt-2" type="submit" tabindex="5">Confirmar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-two-steps.js'))}}"></script>
@endsection
