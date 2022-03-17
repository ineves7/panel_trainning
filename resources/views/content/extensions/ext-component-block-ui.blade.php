@extends('admin/layouts/contentLayoutMaster')

@section('title', 'BlockUI')

@section('content')
<div class="row">
  <!-- Section BlockUI -->
  <div class="col-md-6">
    <section class="section-blockui">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Section Blocking</h4>
        </div>
        <div class="card-body">
          <div class="border p-1" id="section-block">
            <p class="card-text mb-0">
              Lorem ipsum dolor sit amet, an vel affert soleat possim. Usu meis neglegentur ut, oporteat salutandi
              dignissim at mea. Pericula erroribus quaerendum ex duo, his autem accusamus ad, alienum detracto
              rationibus vis et. No est volumus ocurreret vituperata.
            </p>
          </div>
          <div class="demo-inline-spacing">
            <button class="btn btn-outline-primary btn-section-block">Default</button>
            <button class="btn btn-outline-primary btn-section-block-overlay">Overlay Color</button>
            <button class="btn btn-outline-primary btn-section-block-spinner">Custom Spinner</button>
            <button class="btn btn-outline-primary btn-section-block-custom">Custom Message</button>
            <button class="btn btn-outline-primary btn-section-block-multiple">Multiple Message</button>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--/ Section BlockUI -->

  <!-- Card BlockUI -->
  <div class="col-md-6">
    <section class="card-blockui">
      <div class="card" id="card-block">
        <div class="card-header">
          <h4 class="card-title">Card Blocking</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet, an vel affert soleat possim. Usu meis neglegentur ut, oporteat salutandi
            dignissim at mea. Pericula erroribus quaerendum ex duo, his autem accusamus ad, alienum detracto rationibus
            vis et. No est volumus ocurreret vituperata.
          </p>
          <p class="card-text mb-0">
            Lorem ipsum dolor sit amet, an vel affert soleat possim. Usu meis neglegentur ut, oporteat salutandi
            dignissim
          </p>
          <div class="demo-inline-spacing">
            <button class="btn btn-outline-primary btn-card-block">Default</button>
            <button class="btn btn-outline-primary btn-card-block-overlay">Overlay Color</button>
            <button class="btn btn-outline-primary btn-card-block-spinner">Custom Spinner</button>
            <button class="btn btn-outline-primary btn-card-block-custom">Custom Message</button>
            <button class="btn btn-outline-primary btn-card-block-multiple">Multiple Message</button>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--/ Card BlockUI -->

  <!-- Page BlockUI -->
  <div class="col-md-6">
    <section class="page-blockui">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Page Blocking</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet, an vel affert soleat possim. Usu meis neglegentur ut, oporteat salutandi
            dignissim at mea. Pericula erroribus quaerendum ex duo, his autem accusamus ad, alienum detracto rationibus
            vis et. No est volumus ocurreret vituperata.
          </p>
          <p class="card-text mb-0">
            Lorem ipsum dolor sit amet, an vel affert soleat possim. Usu meis neglegentur ut, oporteat salutandi
            dignissim
          </p>
          <div class="demo-inline-spacing">
            <button class="btn btn-outline-primary btn-page-block">Default</button>
            <button class="btn btn-outline-primary btn-page-block-overlay">Overlay Color</button>
            <button class="btn btn-outline-primary btn-page-block-spinner">Custom Spinner</button>
            <button class="btn btn-outline-primary btn-page-block-custom">Custom Message</button>
            <button class="btn btn-outline-primary btn-page-block-multiple">Multiple Message</button>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--/ Page BlockUI -->

  <!-- Form BlockUI -->
  <div class="col-md-6">
    <section class="page-blockui">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Blocking</h4>
        </div>
        <div class="card-body">
          <form class="form-block p-50">
            <div class="mb-1">
              <label class="form-label" for="username">Username</label>
              <input class="form-control" type="text" id="username" placeholder="Username" />
            </div>
            <div class="mb-1">
              <label class="form-label" for="email">Email</label>
              <input class="form-control" type="email" id="email" placeholder="Email" />
            </div>
            <div class="mb-1">
              <label class="form-label" for="password">Password</label>
              <input class="form-control" type="password" id="password" placeholder="Password" />
            </div>
            <div class="text-end mb-0">
              <button class="btn btn-primary disabled me-75">Submit</button>
              <button class="btn btn-outline-secondary disabled">Reset</button>
            </div>
          </form>
          <div class="demo-inline-spacing">
            <button class="btn btn-outline-primary btn-form-block">Default</button>
            <button class="btn btn-outline-primary btn-form-block-overlay">Overlay Color</button>
            <button class="btn btn-outline-primary btn-form-block-spinner">Custom Spinner</button>
            <button class="btn btn-outline-primary btn-form-block-custom">Custom Message</button>
            <button class="btn btn-outline-primary btn-form-block-multiple">Multiple Message</button>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--/ Form BlockUI -->
</div>
@endsection

@section('page-script')
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-blockui.js')) }}"></script>
@endsection
