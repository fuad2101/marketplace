@extends('layouts.dashboard')

@section('title')
    Store - Transactions
@endsection


@section('content')
  <div class="section-content section-dashboard-home"
    data-aos="fade-up" >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <div class="dashboard-title">Transactions</div>
            <p class="dashboard-subtitle">
                Big result start from the small one
            </p>
        </div>

        <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    <ul
                        class="nav nav-pills mb-3"
                        id="pills-tab"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="pills-home-tab"
                                data-toggle="pill"
                                href="#sell"
                                role="tab"
                                aria-controls="sell"
                                aria-selected="true"
                                >Sell Products</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="pills-profile-tab"
                                data-toggle="pill"
                                href="#buy"
                                role="tab"
                                aria-controls="buy"
                                aria-selected="false"
                                >Buy Products</a
                            >
                        </li>
                    </ul>
                    <div
                        class="tab-content"
                        id="pills-tabContent"
                    >
                        <div
                            class="tab-pane fade show active"
                            id="sell"
                            role="tabpanel"
                            aria-labelledby="sell-tab"
                        >
                        @foreach ($sellTransaction as $item)
                            <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <a
                                        href=" {{ route('dashboard-transaction-details',$item->id) }} "
                                        class="card card-list d-block"
                                    >
                                        <div
                                            class="card-body"
                                        >
                                            <div
                                                class="row"
                                            >
                                                <div
                                                    class="col-md-1"
                                                >
                                                    <img
                                                        src=" {{Storage::url($item->product->galleries->first()->photos)}} " class="w-75"
                                                        alt=""
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4"
                                                >
                                                    {{$item->product->name}}
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                   {{$item->transaction->user->store_name}}
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    {{$item->created_at}}
                                                </div>
                                                <div
                                                    class="col-md-1 d-none d-md-block"
                                                >
                                                    <img
                                                        src="/images/dashboard/expand-icon.svg"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div
                            class="tab-pane fade"
                            id="buy"
                            role="tabpanel"
                            aria-labelledby="buy-tab"
                        >
                            @foreach ($buyTransaction as $item)
                            <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <a href=" {{ route('dashboard-transaction-details',$item->id) }} " class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img src=" {{Storage::url($item->product->galleries->first()->photos)}} " class="w-75" alt="" />
                                                </div>
                                                <div class="col-md-4">
                                                    {{$item->product->name}}
                                                </div>
                                                <div class="col-md-3">
                                                    {{$item->transaction->user->store_name}}
                                                </div>
                                                <div class="col-md-3">
                                                    {{$item->created_at}}
                                                </div>
                                                <div class="col-md-1 d-none d-md-block">
                                                    <img src="/images/dashboard/expand-icon.svg" alt="" />
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
