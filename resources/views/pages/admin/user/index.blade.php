@extends('layouts.admin')

@section('title')
    Admin - Users
@endsection


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">

            <div class="container-fluid">
              <div class="dashboard-heading">
                <div class="dashboard-title">Users</div>
                <p class="dashboard-subtitle">List Of User</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href=" {{ route('user.create') }} " class="btn btn-primary mb-3" role="button" >
                                + Tambah User Baru</a>
                                <div class="table table-responsive">
                                    <table class="table-hover scroll-horizontal-vertical w-100 " id="crudTable" >
                                        <thead>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script>
var datatable = $('#crudTable').DataTable({
    processing : true,
    serverSide : true,
    ordering : true,
    ajax : {
        url: '{!!  url()->current() !!}',
    },

    columns:[
        { data:'id', name:'id' },
        { data:'name', name:'name' },
        { data:'email', name:'email' },
        { data:'roles', name:'roles' },
        {
            data:'action',
            name:'action',
            orderable : false,
            searchable : false,
            width : '15%'
            },
    ]
});
    </script>
@endpush
