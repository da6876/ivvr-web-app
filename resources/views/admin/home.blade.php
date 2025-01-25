@extends('layout.app')
@section('main')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome, <b>{{ auth()->user() ? auth()->user()->name : 'Guest' }}</b>! 🎉</h5>
                <br>
                <br>
                <br>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
        <div class="card-body">
          <span class="fw-semibold d-block mb-1">Customer <p>Menu ID: {{ session('menuid') }}</p></span>
          <h3 class="card-title mb-2" id="customer">00</h3>
            <button class="btn btn-info btn-sm" onclick="getView('Customer')">View</button>
        </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card">
            <div class="card-body">
              <span class="fw-semibold d-block mb-1">Customer Login</span>
              <h3 class="card-title mb-2" id="customerLogin">00</h3>
                <button class="btn btn-info btn-sm" onclick="getView('Customer')">View</button>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
          <div class="card">
              <div class="card-body">
                  <span class="fw-semibold d-block mb-1">Meter</span>
                  <h3 class="card-title mb-2" id="meter">00</h3>
                  <button class="btn btn-info btn-sm" onclick="getView('Meter')">View</button>

              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
          <div class="card">
              <div class="card-body">
                  <span class="fw-semibold d-block mb-1">Active Meter</span>
                  <h3 class="card-title mb-2" id="meterActive">00</h3>
                  <button class="btn btn-info btn-sm" onclick="getView('Meter')">View</button>

              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
          <div class="card">
              <div class="card-body">
                  <span class="fw-semibold d-block mb-1">Tariff Rate</span>
                  <h3 class="card-title mb-2" id="tariff">00</h3>
                  <button class="btn btn-info btn-sm" onclick="getView('Tariff')">View</button>
              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
              <div class="card">
                  <div class="card-body">
                      <span class="fw-semibold d-block mb-1">User</span>
                      <h3 class="card-title mb-2"  id="user">00</h3>
                      <button class="btn btn-info btn-sm" onclick="getView('User')">View</button>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
    <script>

    </script>
@endsection
