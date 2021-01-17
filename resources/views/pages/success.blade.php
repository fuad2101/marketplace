@extends('layouts.success')

@section('title')
    Store Success Page
@endsection

@section('content')
<div class="page-content page-success">
      <section class="section-success" data-aos="zoom-in">
        <div class="row align-items-center row-login justify-content-center">
          <div class="col-lg-6 text-center">
            <img src="/images/bag 1-cart-icon-success.svg" alt="" />
            <h2>Transaction Processed</h2>
            <p>
              Silahkan tunggu konfirmasi email dari kami dan <br />
              kami akan menginformasikan resi secepat mungkin!
            </p>
            <a href="index.html" class="btn btn-success w-50 mt-4"
              >My Dashboard</a
            >
            <br />
            <a href="index.html" class="btn w-50 mt-2 btn-signup"
              >Go To Shopping</a
            >
          </div>
        </div>
      </section>
    </div>
@endsection