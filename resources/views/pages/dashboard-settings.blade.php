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
                    <form action=" {{ route('dashboard-setting-redirect','settings') }} " method="POST" class="mt-3">
                        @csrf
                      <div class="form-group">
                        <label for="store-name">Store Name</label>
                        <input
                          class="form-control"
                          type="store-name"
                          name="store_name"
                          id="store-name"
                          autofocus
                          value=" {{ $users->store_name }} "
                        />
                      </div>
                      <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="categories_id" id="categories_id">
                            <option value="{{$users->categories_id }} ">(Tidak Diubah)</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }} ">{{ $category->name }}</option>
                                @endforeach
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
                            name="store_status"
                            id="openStoreTrue"
                            v-model="is_store_open"
                            value="1"
                            {{ $users->store_status == 1 || $users->store_status == true ? 'checked' : '' }}
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
                            name="store_status"
                            id="openStoreFalse"
                            v-model="is_store_open"
                            value="0"
                            {{ $users->store_status == 0 || $users->store_status == NULL ? 'checked' : '' }}
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

