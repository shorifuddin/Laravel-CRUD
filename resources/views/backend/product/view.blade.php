@extends('layouts.admin')
@section('content')

<div class="row container">
    <div class="col-md-12 container">
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title" style="font-weight: 400; font-size:16px;">
                <i class="md md-add-circle "></i> Product Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ route('product.index') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL Product </a>
              </div>
            </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-bordered table-hover table-striped view_custom_table">
                  <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $product->name }}</td>
                  </tr>
                  <tr>
                    <td>Brand</td>
                    <td>:</td>
                    <td>{{ $product->brand }}</td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td>{{ $product->price }}</td>
                  </tr>
                  <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td>{{ $product->quantity }}</td>
                  </tr>

              </table>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>

      <div class="card-footer bg-secondary card_footer">
        <div class="btn-group" role="group">
          <a type="button" class="btn btn-xs btn-dark">Print</a>
          <a type="button" class="btn btn-xs btn-warning">Excel</a>
          <a type="button" class="btn btn-xs btn-dark">PDF</a>
        </div>
      </div>

      </div>
    </div>
  </div>

@endsection
