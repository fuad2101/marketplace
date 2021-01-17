@extends('layouts.admin')

@section('title')
    Admin - Create Produk Gallery
@endsection


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">

            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Product Gallery</div>
                <p class="dashboard-subtitle">Create New Product</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ( $errors->any() )
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action=" {{ route( 'product-gallery.store' ) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <select class="form-control" name="products_id" id="products_id">
                                                @foreach ($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <input class="form-control" type="file" name="photos" id="photos">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success" px-5>Save Now</button>
                                    </div>
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
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
     CKEDITOR.replace( 'description' );
</script>
@endpush
