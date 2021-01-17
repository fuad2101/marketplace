@extends('layouts.dashboard')

@section('title')
    Store - Transactions
@endsection


@section('content')
   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">#STORE0839</div>
                <div class="store-breadcrumb">
                  <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="#">Transaction</a>
                    <a class="breadcrumb-item active" href="#">Details</a>
                  </nav>
                </div>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <img
                          src="/images/details/image-product-details-1.jpg"
                          alt=""
                          class="w-100"
                        />
                      </div>
                      <div class="col-9">
                        <div class="row">
                          <div class="col-3">
                            <div class="product-title">Customer Name</div>
                            <div class="product-subtitle">Angga Risky</div>
                          </div>
                          <div class="col-3">
                            <div class="product-title">Product Name</div>
                            <div class="product-subtitle">Shirup Marzzan</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <div class="product-title">Date of Transaction</div>
                            <div class="product-subtitle">12 Januari, 2020</div>
                          </div>
                          <div class="col-3">
                            <div class="product-title">Payment Status</div>
                            <div class="product-subtitle">Pending</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <div class="product-title">Total Amount</div>
                            <div class="product-subtitle">$280,409</div>
                          </div>
                          <div class="col-3">
                            <div class="product-title">Mobile</div>
                            <div class="product-subtitle">+628 2020 11111</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <h5>Shipping Information</h5>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-3">
                        <div class="product-title">Address I</div>
                        <div class="product-subtitle">Setra Duta Cemara</div>
                      </div>
                      <div class="col-3">
                        <div class="product-title">Address II</div>
                        <div class="product-subtitle">Blok B2 No. 34</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="product-title">Province</div>
                        <div class="product-subtitle">West Java</div>
                      </div>
                      <div class="col-3">
                        <div class="product-title">City</div>
                        <div class="product-subtitle">Bandung</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="product-title">Postal Code</div>
                        <div class="product-subtitle">123999</div>
                      </div>
                      <div class="col-3">
                        <div class="product-title">Country</div>
                        <div class="product-subtitle">Indonesia</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="product-title">Shipping Status</div>
                        <form action="" class="">
                          <select
                            name="status"
                            id="status"
                            v-model="status"
                            class="form-control"
                          >
                            <option value="PENDING">Pending</option>
                            <option value="SHIPPING">Shipping</option>
                            <option value="SUCCESS">Success</option>
                          </select>
                        </form>
                      </div>
                      <template v-if="status == 'SHIPPING'">
                        <div class="col-md-3">
                          <div class="product-title">Input Resi</div>
                          <input
                            class="form-control"
                            type="text"
                            name="resi"
                            id=""
                            v-model="resi"
                          />
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success mt-4">

                            Update Resi
                          </button>
                        </div>
                        </template>
                      </div>
                      <div class="row">
                        <div class="col-12 text-right mt-4">
                          <button class="btn btn-success btn-lg" type="submit">Save Now</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
     <script src="/vendor/vue/vue.js"></script>
    <script>
      var foo = new Vue({
        el: "#transactionDetails",
        data: {
          status: "SHIPPING",
          resi: "BDO837664899",
        },
      });
    </script>
@endpush
