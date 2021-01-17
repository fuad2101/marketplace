@extends('layouts.dashboard')

@section('title')
    Store - Account
@endsection


@section('content')
   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">My Account</div>
                <p class="dashboard-subtitle">Update your current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="card">
                  <div class="card-body">
                    <form action="">
                      <div
                        class="row mb-2"
                        data-aos="fade-up"
                        data-aos-delay="200"
                      >
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="profile-name">Your Name</label>
                            <input
                              class="form-control"
                              type="text"
                              name="profile-name"
                              id="profile-name"
                              value="Papel La Casa"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Your Email</label>
                            <input
                              class="form-control"
                              type="text"
                              name="email"
                              id="email"
                              value="Papel La Casa"
                            />
                          </div>
                        </div>
                      </div>
                      <div
                        class="row mb-2"
                        data-aos="fade-up"
                        data-aos-delay="200"
                      >
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="addressOne">Address 1</label>
                            <input
                              class="form-control"
                              type="text"
                              name="addressOne"
                              id="addressOne"
                              value="Setra Duta Cemara"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="addressTwo">Address 2</label>
                            <input
                              class="form-control"
                              type="text"
                              name="addressTwo"
                              id="addressTwo"
                              value="Blok B2 No. 34"
                            />
                          </div>
                        </div>
                      </div>
                      <div
                        class="row mb-2"
                        data-aos="fade-up"
                        data-aos-delay="250"
                      >
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="province">Province</label>
                            <input
                              class="form-control"
                              type="text"
                              name="province"
                              id="province"
                              value="West Java"
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="city">City</label>
                            <input
                              class="form-control"
                              type="text"
                              name="city"
                              id="city"
                              value="Bandung"
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="postalCode">Postal Code</label>
                            <input
                              class="form-control"
                              type="text"
                              name="postalCode"
                              id="postalCode"
                              value="123999"
                            />
                          </div>
                        </div>
                      </div>
                      <div
                        class="row mb-2"
                        data-aos="fade-up"
                        data-aos-delay="300"
                      >
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="country">Country</label>
                            <select
                              class="form-control"
                              name="country"
                              id="country"
                            >
                              <option value="Indonesia">Indonesia</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Singapore">Singapore</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input
                              class="form-control"
                              type="text"
                              name="mobile"
                              id="mobile"
                              value="+628 2020 11111"
                            />
                          </div>
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

