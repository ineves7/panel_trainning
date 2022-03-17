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

    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center ">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
          @if($configData['theme'] === 'dark')
          <img class="img-fluid" src="{{asset('images/illustration/two-steps-verification-illustration-dark.svg')}}" alt="two steps verification" />
          @else
          <img class="img-fluid" src="{{asset('images/illustration/two-steps-verification-illustration.svg')}}" alt="two steps verification" />
          @endif
        </div>
    </div>
    <!-- /Left Text-->

    <!-- two steps verification v2-->
    <div class="card d-flex col-lg-4 align-items-center auth-bg px-2 ">
      <div class="card-body col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="mt-2">Two Step Verification &#x1F4AC;</h2>
        <p class="card-text mb-75">We sent a verification code to your mobile. Enter the code from the mobile in the field below.</p>
        <p class="card-text fw-bolder mb-2">******0789</p>
        <form class="mt-2" action="{{asset('/')}}" method="GET">
          <h6>Type your 6 digit security code</h6>
          <div class="auth-input-wrapper d-flex align-items-center justify-content-between">
            <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autofocus="" />
            <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
            <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
            <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
            <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
            <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
          </div>
          <button class="btn btn-primary w-100" type="submit" tabindex="4">Verify my account</button>
        </form>
        <p class="text-center mt-2">
          <span>Didn&rsquo;t get the code?</span>
          <a href="Javascript:void(0)">
            <span>&nbsp;Resend</span>
          </a>
          <span>or</span>
          <a href="Javascript:void(0)"><span>&nbsp;Call Us</span>
          </a>
        </p>
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
