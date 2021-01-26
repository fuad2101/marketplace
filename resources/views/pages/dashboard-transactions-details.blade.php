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
                <div class="dashboard-title"> {{ $transactionDetail->code }} </div>
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
                          src=" {{Storage::url($transactionDetail->product->galleries->first()->photos)}}"
                          alt=""
                          class="w-100 rounded"
                        />
                      </div>
                      <div class="col-9">
                        <div class="row">
                          <div class="col-3">
                            <div class="product-title">Customer Name</div>
                            <div class="product-subtitle"> {{ $transactionDetail->transaction->user->name }} </div>
                          </div>
                          <div class="col-3">
                            <div class="product-title">Product Name</div>
                            <div class="product-subtitle">{{ $transactionDetail->product->name }}</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <div class="product-title">Date of Transaction</div>
                            <div class="product-subtitle">{{ $transactionDetail->transaction->created_at }}</div>
                          </div>
                          <div class="col-3">
                            <div class="product-title">Payment Status</div>
                            <div class="product-subtitle">{{ $transactionDetail->transaction->transaction_status }}</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <div class="product-title">Total Amount</div>
                            <div class="product-subtitle">${{ number_format($transactionDetail->transaction->total_price)}}</div>
                          </div>
                          <div class="col-3">
                            <div class="product-title">Mobile</div>
                            <div class="product-subtitle">{{ $transactionDetail->transaction->user->phone_number }}</div>
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
                        <div class="product-subtitle">{{ $transactionDetail->transaction->user->address_one }} </div>
                      </div>
                      <div class="col-3">
                        <div class="product-title">Address II</div>
                        <div class="product-subtitle">{{ $transactionDetail->transaction->user->address_two}}</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="product-title">Province</div>
                        <div class="product-subtitle"> {{\App\Models\Province::find($transactionDetail->transaction->user->provinces_id)->name}} </div>
                      </div>
                      <div class="col-3">
                        <div class="product-title">City</div>
                        <div class="product-subtitle">{{\App\Models\Regency::find($transactionDetail->transaction->user->regencies_id)->name}}</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="product-title">Postal Code</div>
                        <div class="product-subtitle">{{ $transactionDetail->transaction->user->zip_code}}</div>
                      </div>
                      <div class="col-3">
                        <div class="product-title">Country</div>
                        <div class="product-subtitle">Indonesia</div>
                      </div>
                    </div>
                    <form action="{{route('dashboard-transaction-update',$transactionDetail->id)}}"  method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="product-title">Shipping Status</div>
                            @csrf
                          <select
                            name="shipping_status"
                            id="status"
                            v-model="status"
                            class="form-control"
                          >
                            <option value="PENDING">Pending</option>
                            <option value="SHIPPING">Shipping</option>
                            <option value="SUCCESS">Success</option>
                          </select>
                      </div>
                      <template v-if="status === 'SHIPPING'">
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
                          <button type="submit" class="btn btn-success btn-lg" >Save Now</button>
                        </div>
                    </form>
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
          status:"{{$transactionDetail->shipping_status}}",
          resi:"{{$transactionDetail->resi}}",
        },
      });
    </script>
@endpush
