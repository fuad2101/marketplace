@extends('layouts.admin')

@section('title')
    Administration Panel
@endsection


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">

            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Dashboard</div>
                <p class="dashboard-subtitle">This is Administration Panel</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Customer</div>
                        <div class="dashboard-card-subtitle">{{$user}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Revenue</div>
                      <div class="dashboard-card-subtitle">${{$revenue}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaction</div>
                      <div class="dashboard-card-subtitle">{{$transactions}}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  {{-- <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transaction</h5>
                    <a href="" class="card card-list d-block">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="/images/dashboard/image-icon-product1.jpg"
                              alt=""
                            />
                          </div>
                          <div class="col-md-4">Shirup Marzzan</div>
                          <div class="col-md-3">Angga Risky</div>
                          <div class="col-md-3">12 Januari, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard/expand-icon.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="/images/dashboard/image-icon-product2.jpg"
                              alt=""
                            />
                          </div>
                          <div class="col-md-4">LeBrone X</div>
                          <div class="col-md-3">Masayoshi</div>
                          <div class="col-md-3">11 January, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard/expand-icon.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="/images/dashboard/image-icon-product3.jpg"
                              alt=""
                            />
                          </div>
                          <div class="col-md-4">Soffa Lembutte</div>
                          <div class="col-md-3">Shayna</div>
                          <div class="col-md-3">11 January, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard/expand-icon.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                    </a>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
@endsection
