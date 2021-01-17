@extends('layouts.admin')

@section('title')
    Admin - Edit
@endsection


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">

            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Edit User  <strong>{{ $item->name }}</strong>  </div>
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
                                <form action=" {{ route( 'user.update',$item->id)}} " method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">User Name</label>
                                            <input class="form-control" type="text" name="name" value=" {{$item->name}}"" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control" type="text" name="email" required value=" {{$item->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input class="form-control" type="text" name="password">
                                            <small>Kosongkan Jika Tidak Ingin Mengganti Password</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Roles</label>
                                          <select name="roles" class="form-control">
                                              <option value=" {{ $item->roles }} ">(Tidak Diganti)</option>
                                              <option value="ADMIN">Admin</option>
                                              <option value="USER">User</option>
                                          </select>
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

