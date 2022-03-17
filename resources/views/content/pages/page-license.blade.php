
@extends('admin/layouts/contentLayoutMaster')

@section('title', 'License')

@section('content')
<section>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Our License Usage</h4>
    </div>
    <div class="card-body">
      <p class="card-text mb-2 pb-1">
        Use of any product you buy from PIXINVENT is bound by the license you purchase. It will allow you the
        non-exclusive access to use it in your personal as well as client projects.
      </p>

      <!-- table -->
      <div class="table-responsive mb-3">
        <table class="table table-bordered text-nowrap text-center">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">SINGLE</th>
              <th scope="col">MULTIPLE</th>
              <th scope="col">EXTENDED</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" class="text-start">Number of end products</th>
              <td>1</td>
              <td>Unlimited 🤩</td>
              <td>1</td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Use in single free end product</th>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Free end product (Can have multiple End Users)</th>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Use in multiple free end product</th>
              <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Use in single end product that’s sold</th>
              <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
              <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
              <td><i data-feather="check" class="text-success font-medium-5"></i></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Create SaaS Application</th>
              <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
              <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
              <td>Single</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- / table -->

      <!-- single license -->
      <h5>Single License</h5>
      <ul class="ps-25 ms-1">
        <li>You have rights to use our product for your personal or client project.</li>
        <li>You can modify our product as per your needs and use it for your personal or client project.</li>
      </ul>
      <p class="card-text mb-2 pb-75">
        With Single License you will be able to use our product for yourself or your client project for 1 time. If you
        want to use it for multiple times, you need to buy another regular license every time. Ownership and Copyright
        of our template will stay with ThemeSelection after purchasing single license. That means you are allowed to use
        our template in your project and use for one client or yourself,
      </p>

      <!-- multiple license -->
      <h5>Multiple License</h5>
      <ul class="ps-25 ms-1">
        <li>You can use our product for your personal or client project. 😎</li>
        <li>You can use our product for unlimited projects when end users are not charged.</li>
      </ul>
      <p class="card-text mb-2 pb-75">
        With Multiple Use License you will be able to use our product for yourself as well as your client projects. You
        can use product for unlimited projects. Ownership and Copyright of our template will stay with ThemeSelection
        after purchasing multiple use license. That means you are allowed to use our template in your project and use
        for multiple clients and yourself, but you are not allowed to create SaaS application and sell that,
      </p>

      <!-- extended license -->
      <h5>Extended License</h5>
      <ul class="ps-25 ms-1">
        <li>You can use our product for your personal or client project.</li>
        <li>You cannot resell, redistribute, lease, license or offer the product to any third party.</li>
      </ul>
      <p class="card-text mb-2 pb-1">
        With Extended License you will be able to use our product for yourself or your client project for one time. You
        can use it for building one project. Ownership and Copyright of our template will remain with ThemeSelection and
        that means, you are not allowed to sell, distribute or lease our template as it is to anyone
      </p>

      <!-- alert -->
      <div class="alert alert-primary">
        <div class="alert-body d-flex align-items-center justify-content-between flex-wrap p-2">
          <div class="me-1">
            <h4 class="fw-bolder text-primary">Do you need custom license? 👩🏻‍💻</h4>
            <p class="fw-normal mb-1 mb-lg-0">
              If you’ve mass production demand and other custom use cases than we’re here to help you.
            </p>
          </div>
          <button class="btn btn-primary">Contact Us</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
