@extends('layouts.auth')

@section('content')
    <div class="page-content page-auth" id="register">
            <div class="section-store-auth" data-aos="fade-up">
                <div class="container">
                    <div class="row align-items-center row-login ">
                        <div class="col-lg-5 mx-auto" id="">
                            <h2 class="mb-3">Memulai untuk jual beli dengan cara terbaru</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" v-model="name" class="form-control w-75 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>

                                    <input id="email" @change="checkEmailAvailability()" type="email" v-model="email" class="form-control w-75" :class="{'is-invalid': this.email_unavailable}" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="">Konfirmasi Password</label>

                                        <input id="password-confirm" type="password" class="form-control w-75" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <label for="store">Store</label>
                                    <p class="text-muted">Apakah anda juga ingin membuka toko?</p>

                                    <div class="custom-control custom-radio custom-control-inline" >
                                        <input class="custom-control-input" type="radio" name="isStoreOpen" v-model="isStoreOpen" id="OpenStoreTrue" :value="true" > <label class="custom-control-label" for="OpenStoreTrue">Iya, boleh</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline" >
                                        <input class="custom-control-input" type="radio" name="isStoreOpen" v-model="isStoreOpen" id="OpenStoreFalse" :value="false"> <label class="custom-control-label" for="OpenStoreFalse">Engga, Makasih</label>
                                    </div>

                                        @error('store')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group" v-if="isStoreOpen" >
                                    <label for="store_name">Nama Toko</label>
                                    <input id="store_name" type="store_name" class="form-control w-75 @error('store_name') is-invalid @enderror" name="store_name" value="{{ old('store_name') }}" required autocomplete="store_name" autofocus>

                                    @error('store_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group" v-if="isStoreOpen" >
                                    <label for="category">Category</label>

                                    <select class="form-control w-75" name="categories_id" id="category">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('categories_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div>
                                <button type="submit" class="btn btn-success w-75 mt-4" :disabled="this.email_unavailable"
                                    >Sign Up Now</button
                                >

                                <a href=" {{ route('login') }} " class="btn w-75 mt-2 btn-signup"
                                    >Back To Sign In</a
                                >
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
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);
        var register = new Vue({
            el: '#register',
            mounted(){
                AOS.init();
            },
            methods:{
                checkEmailAvailability: function(){
                    var self = this;
                    axios.get('{{route('api-register-check')}}',{
                        params:{
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available'){
                            self.$toasted.show("Email tersedia! Silahkan lanjutkan proses registrasi",
                                {
                                position:"top-center",
                                className:"rounded",
                                duration:5000,
                                }
                            );
                            self.email_unavailable = false;
                        }else{
                            self.$toasted.error("Maaf tampaknya email sudah terdaftar pada sistem kami",
                                {
                                position:"top-center",
                                className:"rounded",
                                duration:5000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        console.log(response);
                    })
                },
            },
            data(){
                return{
                    name:"Muhammad Fuad",
                    email:"muhfuad67@gmail.com",
                    isStoreOpen:true,
                    store_name:"",
                    email_unavailable:false
                }
            },
        });
    </script>
@endpush
