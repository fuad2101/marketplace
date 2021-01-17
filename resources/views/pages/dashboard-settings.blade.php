@extends('layouts.dashboard')

@section('title')
    Store - Setings
@endsection


@section('content')
 <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Store Settings</div>
                <p class="dashboard-subtitle">Make store that profitable</p>
              </div>
              <div class="dashboard-content">
                <div class="card">
                  <div class="card-body">
                    <form action="" class="mt-3">
                      <div class="form-group">
                        <label for="store-name">Store Name</label>
                        <input
                          class="form-control"
                          type="store-name"
                          name=""
                          id="store-name"
                          autofocus
                          value="Papel La Casa"
                        />
                      </div>
                      <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category" id="">
                          <option value="" disabled>Select Category</option>
                          <option value="Makanan">Makanan</option>
                          <option value="Pakaian">Pakaian</option>
                          <option value="Lain-Lain">Lain-Lain</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Store Status</label>
                        <p class="text-muted">
                          Apakah saat ini toko Anda buka?
                        </p>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="is_store_open"
                            id="openStoreTrue"
                            v-model="is_store_open"
                            :value="true"
                          />
                          <label
                            class="custom-control-label"
                            for="openStoreTrue"
                            >Buka</label
                          >
                        </div>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="is_store_open"
                            id="openStoreFalse"
                            v-model="is_store_open"
                            :value="false"
                          />
                          <label
                            class="custom-control-label"
                            for="openStoreFalse"
                            >Sementara Tutup</label
                          >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <button class="btn btn-success px-5">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection

