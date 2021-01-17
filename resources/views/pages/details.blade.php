@extends('layouts.app')

@section('title')
    Store Details
@endsection

@section('content')
<div class="page-content page-details">
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
                    <a href=" {{ route('home') }} ">Home</a>
                  </li>
                  <li class="breadcrumb-item">Product Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery mb-4" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  :src="photos[activePhoto].url"
                  :key="photos[activePhoto].id"
                  class="w-100 main-image"
                  alt=""
                />
              </transition>
            </div>
            <div class="col-12 col-lg-2">
              <div class="row">
                <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0"
                  v-for="(photos, index) in photos"
                  :key="photos.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index) ">
                    <img
                      :src="photos.url"
                      class="w-100 thumbnail-img"
                      :class="{active: index == activePhoto}"
                      alt=""
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="store-details-container" data-aos="fade-up">
        <div class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{$product->name}} </h1>
                <div class="owner">{{ $product->user->store_name }}</div>
                <div class="price">${{ number_format($product->price)}}</div>
              </div>
              <div class="col-lg-2">
                  @auth
                    <form action=" {{route('details-add',$product->id)}}  " method="post" enctype="multipart/form-data">
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-success text-white btn-block px-4 mb-3"
                            >Add To Cart
                        </button>
                    </form>
                  @else
                    <a
                    href="{{route('login')}}"
                    class="btn btn-success text-white btn-block px-4 mb-3"
                    >Sign In to Add</a
                    >
                  @endauth
              </div>
            </div>
          </div>
        </div>
        <div class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </div>
        <div class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media">
                    <img
                      class="rounded-circle mr-3"
                      src="/images/details/picreview1.png"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Hazza Risky</h5>
                      <p>
                        I thought it was not good for living room. I really
                        happy to decided buy this product last week now feels
                        like homey.
                      </p>
                    </div>
                  </li>
                  <li class="media">
                    <img
                      class="rounded-circle mr-3"
                      src="/images/details/picreview2.png"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                      <p>
                        Color is great with the minimalist concept. Even I
                        thought it was made by Cactus industry. I do really
                        satisfied with this.
                      </p>
                    </div>
                  </li>
                  <li class="media">
                    <img
                      class="rounded-circle mr-3"
                      src="/images/details/picreview3.png"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                      <p>
                        When I saw at first, it was really awesome to have with.
                        Just let me know if there is another upcoming product
                        like this.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 1,
          photos: [
              @foreach ( $product->galleries as $gallery)
            {
                id: {{ $gallery->id }},
                url: '{{Storage::url($gallery->photos)}}',
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush

