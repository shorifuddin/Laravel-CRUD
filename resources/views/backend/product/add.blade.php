@extends('layouts.admin')
@section('content')

@if (Session::has('success'))
<script>
swal({ title: "Success",text: "The operation completed successfully!", icon: "success",timer:3000,});
</script>
@endif

@if (Session::has('error'))
<script>
swal({ title: "Error!",text: "You clicked the button!", icon: "error",});
</script>
@endif

<div class="row container">
    <div class="col-md-12 container">
      <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> Product REGISTRATION NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ route('product.index') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Product</a>
             </div>
            </div>
        </div>

        <div class="card-body ">

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" placeholder="Enter product Name" name="name" value="{{ old('name') }}" required>
              {{-- @error('name')<span class="text-danger">  {{ $message }} @enderror </span> --}}
             </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Brand<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" placeholder="Enter brand"  name="brand" value="{{ old('brand') }}" required>
              {{-- @error('email')<span class="text-danger">  {{ $message }} @enderror </span> --}}
            </div>
          </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Price:</label>
            <div class="col-sm-7 pp">
              <input type="number" class="form-control form_control" placeholder="Enter Your Price" name="price" value="{{ old('price') }}">
              {{-- @error('phone')<span class="text-danger">  {{ $message }} @enderror </span> --}}
            </div>
          </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">quantity<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <div class="input-group">
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="quantity" name="quantity" value="{{ old('quantity') }}">
                </div>
                {{-- @error('subj')<span class="text-danger">  {{ $message }} @enderror </span> --}}
              </span>
            </div>
          </div>

            <div class="card-footer bg-secondary card_footer">
                <button type="submit" class="btn btn-dark">REGISTRATION</button>
            </div>

        </div> --}}

    </form>
    </div>
  </div>
@endsection
@section('couston_js')
<!-- bundle -->
        <script src="{{asset('backend')}}/assets/libs/select2/js/select2.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

        <script src="{{asset('backend/assets')}}/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script src="{{asset('backend/assets')}}/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!--form validation init-->
<script src="{{asset('backend/assets')}}/plugins/summernote/summernote-bs4.js"></script>

<script>

    jQuery(document).ready(function(){
        $('.wysihtml5').wysihtml5();

        $('.summernote').summernote({
            height: 200,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });

    });
</script>

@endsection
@section('couston_CSS')
<!--bootstrap-wysihtml5-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets')}}/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
<link href="{{asset('backend/assets')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet">

@endsection
