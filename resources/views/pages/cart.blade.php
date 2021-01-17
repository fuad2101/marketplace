@extends('layouts.app')

@section('title')
    Store Cart
@endsection

@section('content')
<div class="page-content page-cart">
      <section
        class="store-breadcrumb"
        data-aos="fade-down"
        data-aos-delay="200"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item">Product Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Name &amp; Seller</td>
                    <td>Price</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $total_price = 0;
                    @endphp
                    @foreach ($carts as $cart)
                    @php
                    $total_price += $cart->product->price;
                    @endphp
                        <tr>
                            <td>
                            <img
                                src="{{ Storage::url($cart->product->galleries->first()->photos) }} "
                                alt=""
                                class="cart-image"
                            />
                            </td>
                            <td>
                            <div class="product-title">{{$cart->product->name}}</div>
                            <div class="product-subtitle">{{$cart->user->name}}</div>
                            </td>
                            <td>
                            <div class="product-title">{{number_format($cart->product->price)}}</div>
                            <div class="product-subtitle">USD</div>
                            </td>
                            <td>
                                <form action="{{route('cart-delete',$cart->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger remove-button">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
          <!-- Line -->

          <form action=" {{ route('checkout-proses') }} " method="post" id="location" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{$total_price }}" name="total_price">
              <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Address 1</label>
                <input
                  class="form-control"
                  type="text"
                  name="address_one"
                  id="address_one"
                  value="Setra Duta Cemara"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_two">Address 2</label>
                <input
                  class="form-control"
                  type="text"
                  name="address_two"
                  id="address_two"
                  value="Blok B2 No. 34"
                />
              </div>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="250">
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Province</label>
                <select class="form-control" name="provinces_id" id="provinces_id" v-if="provinces" v-model="provinces_id">
                    <option v-for="province in provinces" :value="province.id">@{{province.name}} </option>
                </select>
                <select v-else class="form-control"></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">City</label>
                <select class="form-control" name="regencies_id" id="regencies_id" v-if="regencies" v-model="regencies_id">
                    <option v-for="regency in regencies" :value="regency.id">@{{regency.name}} </option>
                </select>
                <select v-else class="form-control"></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Postal Code</label>
                <input
                  class="form-control"
                  type="text"
                  name="zip_code"
                  id="zip_code"
                  value="123999"
                />
              </div>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" name="country" id="country">
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
          <div class="row" data-aos="fade-up" data-aos-delay="350">
            <div class="col-12">
                <hr />
            </div>
            <div class="col-12">
                <h2 class="mb-4">Payment Information</h2>
            </div>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Ship to Jakarta</div>
            </div>
            <div class="col-4 col-md-2">
                <div class="product-title text-success"> ${{ number_format($total_price)  }} </div>
                <div class="product-subtitle">Total</div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success mt-3 btn-block">Checkout Now</button>
            </div>
          </form>



          <!-- Line -->
          </div>
        </div>
      </section>
    </div>

@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        var register = new Vue({
            el: '#location',
            mounted(){
                AOS.init();
                this.getProvincesData();
            },
            data:{
                provinces_id:null,
                regencies_id:null,
                provinces:null,
                regencies:null,
            },
            methods:{
                getProvincesData(){
                    var self = this;
                    axios.get('{{route('api-provinces')}}')
                    .then(function(response){
                        self.provinces = response.data;
                    })
                },
                getRegenciesData(){
                    var self = this;
                    axios.get('{{url('api/regencies')}}/'+self.provinces_id)
                    .then(function(response) {
                        self.regencies = response.data;
                    })
                },
            },
            watch:{
                provinces_id:function(val,oldVal){
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
        })
</script>
@endpush
