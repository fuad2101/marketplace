@extends('layouts.admin')

@section('title')
    Admin - Create User
@endsection


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">

            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">User</div>
                <p class="dashboard-subtitle">Create New User</p>
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
                                <form action=" {{ route( 'user.store' ) }} " method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">User Name</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control" type="text" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input class="form-control" type="text" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Roles</label>
                                          <select name="roles" class="form-control">
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

