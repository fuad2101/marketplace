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
                    <form action=" {{route('dashboard-setting-redirect','account')}} " method="POST" id="location" >
                        @csrf
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
                              name="name"
                              id="name"
                              value=" {{ $users->name }} "
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
                              value=" {{ $users->email }} "
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
                            <label for="addressOne">Address One</label>
                            <input
                              class="form-control"
                              type="text"
                              name="address_one"
                              id="address_one"
                              value=" {{ $users->address_one }} "
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="addressTwo">Address Two</label>
                            <input
                              class="form-control"
                              type="text"
                              name="address_two"
                              id="address_two"
                              value=" {{ $users->address_two }} "
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
                            <label for="provinces_id">Province</label>
                                <select class="form-control" name="provinces_id" id="provinces_id" v-if="provinces" v-model="provinces_id">
                                    <option value="{{$users->provinces_id }}" selected>(Tidak DiUbah)</option>
                                    <option v-for="province in provinces" :value="province.id" >@{{province.name}} </option>
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
                            <label for="postalCode">ZIP Code</label>
                            <input
                              class="form-control"
                              type="text"
                              name="zip_code"
                              id="zip_code"
                              value="{{$users->zip_code}}"
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
                            <label for="phone_number">Mobile</label>
                            <input
                              class="form-control"
                              type="text"
                              name="phone_number"
                              id="phone_number"
                              value="{{$users->phone_number}}"
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

