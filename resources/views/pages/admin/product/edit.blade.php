@extends('layouts.admin')

@section('title')
    Admin - Edit
@endsection


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">

            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Edit Product  <strong>{{ $item->name }}</strong>  </div>
                <p class="dashboard-subtitle"></p>
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
                                <form action=" {{ route( 'product.update',$item->id)}} " method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input class="form-control" type="text" name="name" required value="{{$item->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pemilik Product</label>
                                          <select name="user_id" class="form-control">
                                              <option value="{{ $item->user_id }}" selected>{{ $item->user->name }}</option>
                                              @foreach ($users as $users)
                                                  <option value="{{$users->id}}">{{$users->name}}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                          <select name="categories_id" class="form-control">
                                            <option value=" {{ $item->categories_id }}" selected >{{ $item->categories->name }}</option>
                                              @foreach ($categories as $category)
                                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input class="form-control" type="number" name="price" value="{{$item->price}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <textarea name="description" id="description" cols="30" rows="10"> {{!! $item->description !!}} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success" px-5>Save</button>
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
