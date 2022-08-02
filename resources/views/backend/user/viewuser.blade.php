@extends('layouts.admin')
@section('content')

<div class="row container">
    <div class="col-md-12 container">
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title" style="font-weight: 400; font-size:16px;">
                <i class="md md-add-circle "></i> User Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ url('/dashboard/user/all') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL User </a>
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
                    <td>{{ $data->name }}</td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>{{ $data->username }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $data->email }}</td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{ $data->phone }}</td>
                  </tr>
                  <tr>
                    <td>Birth</td>
                    <td>:</td>
                    <td>{{ $data->datebirth }}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td>@if ($data->country==1)
                        Bangladesh
                    @elseif ($data->country==2)
                        India
                    @else
                        Japan
                    @endif</td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>@if ($data->gender==1)
                        Male
                    @elseif ($data->gender==2)
                        Female
                    @else
                        Other
                    @endif</td>
                  </tr>
                  <tr>
                    <td>Skill</td>
                    <td>:</td>
                    <td>{{  $data->skill }}</td>
                  </tr>
                  <tr>
                    <td>Category</td>
                    <td>:</td>
                    <td>@if ($data->category == 1)
                        Team Manager
                    @else
                        Worker
                    @endif </td>
                  </tr>
                  <tr>
                    <td>Birth</td>
                    <td>:</td>
                    <td>{!! $data->about !!}</td>
                  </tr>
                  <tr>
                    <td> Photo</td>
                    <td>:</td>
                    <td>
                      @if ($data->image!='')
                        <img class="img-fluid img"  src="{{ asset('upload/staff/'.$data->image) }}">
                      @else
                         <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                      @endif
                    </td>
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
