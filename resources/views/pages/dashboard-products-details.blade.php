@extends('layouts.dashboard')

@section('title')
    Store - Product Details
@endsection


@section('content')
  <div class="section-content section-dashboard-home"
            data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title"> {{$products->name}}</div>
                <p class="dashboard-subtitle">Product Details</p>
              </div>
              <div class="dashboard-content">
                <div class="card">
                  <div class="card-body">
                    <form action="{{route('dashboard-product-update',$products->id)}}" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="products_id" value="{{$products->id}}"> --}}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="product-name">Product Name</label>
                            <input
                              class="form-control"
                              type="name"
                              name="name"
                              id="name"
                              autofocus
                              value="{{$products->name}}"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="price">Price</label>
                            <input
                              class="form-control"
                              type="price"
                              name="price"
                              id="price"
                              autofocus
                              value="{{$products->price}}"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="">Category</label>
                                <select name="categories_id" class="form-control">
                                    <option class="text-muted" value="{{$products->categories->id}}">(Tidak Dirubah)</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <p>Description</p>
                        </div>
                        <div class="col-12">
                          <textarea
                            class="w-100"
                            name="description"
                            id="editor"
                            cols=""
                            rows="8"
                          >

                          {!! $products->description !!}

                        </textarea
                          >
                        </div>
                      </div>
                      <div class="row mt-3"></div>
                      <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success px-5 btn-block">
                                Update Product
                            </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card gallery-container">
                  <div class="card-body">
                    <div class="row">
                        @foreach ($products->galleries as $gallery)
                            <div class="col-md-4">
                                <img
                                    class="w-100"
                                    src=" {{ Storage::url($gallery->photos) ?? ''}} "
                                    alt=""
                                />
                                <a href="{{route('dashboard-product-gallery-delete',$gallery->id)}}">
                                    <img class="remove-icon" src="/images/details/remove 1.svg" alt="" />
                                </a>






                            {{-- <form action="{{route('dashboard-product-gallery-delete',$gallery->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="products_id" value="{{$products->id}}">
                                <button type="hidden">
                                    <img class="remove-icon" src="/images/details/remove 1.svg" alt="" />
                                </button>
                            </form> --}}
                            </div>
                          @endforeach
                      <div class="col-12 mt-4">
                        <form action=" {{route('dashboard-product-gallery-upload',$products->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="photos" id="photos" onchange="form.submit()" hidden>
                            <input type="hidden" name="products_id" value="{{$products->id}}">
                            <button
                            type="button" class="btn btn-secondary px-5 btn-block" onclick="fileUpload()">
                              Add Photo
                            </button>
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
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
      function fileUpload(){
        document.getElementById("photos").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush


