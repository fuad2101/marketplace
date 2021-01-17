@extends('layouts.dashboard')

@section('title')
    Store - Create Products
@endsection


@section('content')
   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Create New Product</div>
                <p class="dashboard-subtitle">Create your own product</p>
              </div>
              <div class="dashboard-content">
                <div class="card">
                  <div class="card-body">
                    <form action=" {{ route('dashboard-product-store') }} " method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="slug" value="">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="product-name">Product Name</label>
                            <input
                              class="form-control"
                              type="product-name"
                              name="name"
                              id="name"
                              autofocus

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


                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="categories_id" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }} ">{{ $category->name }}</option>
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
                            </textarea
                          >
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="thumbnail ">Thumbnail</label>
                            <input
                              class="form-control form-inline"
                              type="file"
                              name="photos"
                              id="photos"


                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <button type="submit" class="btn btn-success px-5">Save</button>
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
     <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush
