@extends('layouts.admin')
@section('content')

@if (Session::has('success'))
<script>
swal({ title: "Good job!",text: "The operation completed successfully!", icon: "success",timer:3000,});
</script>
@endif

@if (Session::has('error'))
<script>
swal({ title: "Good error!",text: "You clicked the button!", icon: "error",});
</script>
@endif

<div class="row container">
    <div class="col-md-12 container">
      <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> product UPDATE NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ route('product.index') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All product</a>
             </div>
            </div>
        </div>

        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="name" value="{{ $product->name }}">
              {{-- @error('name')<span class="invalid-feedback"> {{ $message }}</span> @enderror --}}
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">brand:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" name="brand" value="{{ $product->brand }}">
            </div>
          </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">price<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <div class="input-group">
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="price" name="price" value="{{ $product->price }}">
                </div>
                {{-- @error('subj')<span class="text-danger">  {{ $message }} @enderror </span> --}}
              </span>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">quantity<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="quantity" class="form-control form_control" name="quantity"  value="{{ $product->quantity }}">

            </div>
          </div>

        </div>

      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">Update product</button>
      </div>

      </div>
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
