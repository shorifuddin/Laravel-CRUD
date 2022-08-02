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
      <form method="POST" action="{{ route('user_submit') }}" enctype="multipart/form-data">
        @csrf
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> User REGISTRATION NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ route('alluser') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All User</a>
             </div>
            </div>
        </div>

        <div class="card-body ">

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" placeholder="Enter Your Name" name="name" value="{{ old('name') }}">
              @error('name')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
            <div class="col-sm-7 pp">
              <input type="number" class="form-control form_control" placeholder="Enter Your Phone-Number" name="phone" value="{{ old('phone') }}">
              @error('phone')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Username" name="username" value="{{ old('username') }}">
                </div>
                @error('username')<span class="text-danger">  {{ $message }} @enderror </span>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="email" class="form-control form_control" placeholder="Enter Your Email"  name="email" value="{{ old('email') }}">
              @error('email')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Date Of Birth<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <div class="input-group" id="datepicker1">
                    <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker" name="datebirth" value="{{ old('datebirth') }}">
                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
                @error('datebirth')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Country<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="country">
                <option >Choose Country</option>
                <option value="1">Bangladesh</option>
                <option value="2">India</option>
                <option value="3">Japan</option>
              </select>
              @error('country')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-3 col-form-label col_form_label">Gender<span class="req_star">*</span>:</label>
                <div class="col-sm-7 pp">
                    <input class="form-check-input" type="radio" id="formRadios1" value="1" name="gender">
                    <label class="form-check-label" for="formRadios2"> Male </label>
                    <input class="form-check-input" type="radio" id="formRadios2" value="2" name="gender">
                    <label class="form-check-label" for="formRadios2"> Female </label>
                    <input class="form-check-input" type="radio" id="formRadios3" value="3" name="gender">
                    <label class="form-check-label" for="formRadios2"> Other </label>
                    @error('gender')<span class="text-danger">  {{ $message }} @enderror </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">Skill<span class="req_star">*</span>:</label>
                    <div class="col-sm-7 pp">
                        <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="php">
                        <label class="form-check-label" for="formCheck1">PHP</label>

                        <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="laravel">
                        <label class="form-check-label" for="formCheck1">Laravel</label>

                        <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="java">
                        <label class="form-check-label" for="formCheck1">JavaScript</label>

                        <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="js">
                        <label class="form-check-label" for="formCheck1">JQuery</label>
                        @error('skill')<span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
            </div>

            <div class="form-switch row">
                <label class="col-sm-3 col-form-label col_form_label">Staff <span class="req_star">*</span>:</label>
                    <div class="col-sm-7 pp">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault1" name="category" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault1">Team Manager</label>
                          </div>
                           @error('category')<span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-3 col-form-label col_form_label">About or Details :</label>
                <div class="col-sm-7">
                    <textarea class="summernote form-control form_control" name="about" ></textarea>
                    @error('about')<span class="text-danger">  {{ $message }} @enderror </span>
                </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-7">
                <input class="form-control form-control-md" id="formFileSm" type="file" name="image">
                @error('image')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Image Gallery:</label>
            <div class="col-sm-7">
                <input class="form-control form-control-md" id="formFileSm" multiple type="file" name="multi_image[]" >
                @error('multi_image')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
          </div>

        </div>

      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">REGISTRATION</button>
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
