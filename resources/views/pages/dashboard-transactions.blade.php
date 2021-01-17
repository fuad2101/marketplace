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
                                href="#pills-home"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                                >Sell Products</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="pills-profile-tab"
                                data-toggle="pill"
                                href="#pills-profile"
                                role="tab"
                                aria-controls="pills-profile"
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
                            id="pills-home"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab"
                        >
                            <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <a
                                        href="/dashboard-transaction-details.html"
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
                                                        src="/images/dashboard/image-icon-product1.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4"
                                                >
                                                    Shirup
                                                    Marzzan
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    Angga
                                                    Risky
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    12
                                                    Januari,
                                                    2020
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
                                                        src="/images/dashboard/image-icon-product2.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4"
                                                >
                                                    LeBrone
                                                    X
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    Masayoshi
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    11
                                                    January,
                                                    2020
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
                                                        src="/images/dashboard/image-icon-product3.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4"
                                                >
                                                    Soffa
                                                    Lembutte
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    Shayna
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    11
                                                    January,
                                                    2020
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
                        </div>
                        <div
                            class="tab-pane fade"
                            id="pills-profile"
                            role="tabpanel"
                            aria-labelledby="pills-profile-tab"
                        >
                            <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <a
                                        href=""
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
                                                        src="/images/dashboard/image-icon-product1.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4"
                                                >
                                                    Shirup
                                                    Marzzan
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    Angga
                                                    Risky
                                                </div>
                                                <div
                                                    class="col-md-3"
                                                >
                                                    12
                                                    Januari,
                                                    2020
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
