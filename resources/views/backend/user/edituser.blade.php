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
      <form method="POST" action="{{ route('update',$data->staff_id) }}" enctype="multipart/form-data">
        @csrf
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> USER UPDATE NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ route('alluser') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All User</a>
             </div>
            </div>
        </div>

        <div class="card-body">
        <input type="hidden" name="id" value="{{ $data->staff_id }}">

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="name" value="{{ $data->name }}">
              <span class="invalid-feedback">
                @error('name')
                  {{ $message }}
                @enderror
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" name="phone" value="{{ $data->phone }}">
              @error('phone')
                  {{ $message }}
                @enderror
            </div>
          </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Username" name="username" value="{{ $data->username }}">
                </div>
                @error('username')<span class="text-danger">  {{ $message }} @enderror </span>
              </span>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="email" class="form-control form_control" name="email"  value="{{ $data->email }}">
              @error('email')
                  {{ $message }}
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Date Of Birth<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <div class="input-group" id="datepicker1">
                    <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker" name="datebirth" value="{{ $data->datebirth }}">
                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
                @error('datebirth')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Country<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="country">
                <option value="1" {{ $data->country==1 ? 'selected' : '' }}>Bangladesh</option>
                <option value="2" {{ $data->country==2 ? 'selected' : '' }}>India</option>
                <option value="3" {{ $data->country==3 ? 'selected' : '' }}>Japan</option>
              </select>
              @error('country')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-3 col-form-label col_form_label">Gender<span class="req_star">*</span>:</label>
                <div class="col-sm-7 pp">
                    <input class="form-check-input" type="radio" id="formRadios1" {{ $data->gender == 1 ? 'checked' : '' }} value="1" name="gender" >
                    <label class="form-check-label" for="formRadios2" > Male </label>
                    <input class="form-check-input" type="radio" id="formRadios2" {{ $data->gender == 2 ? 'checked' : '' }} value="2" name="gender">
                    <label class="form-check-label" for="formRadios2"> Female </label>
                    <input class="form-check-input" type="radio" id="formRadios3" {{ $data->gender == 3 ? 'checked' : '' }} value="3" name="gender">
                    <label class="form-check-label" for="formRadios2"> Other </label>
                    @error('gender')<span class="text-danger">  {{ $message }} @enderror </span>
                </div>
         </div>

         @php
             $skill = explode(',', $data->skill);
         @endphp

         <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Skill<span class="req_star">*</span>:</label>
                <div class="col-sm-7 pp">
                    <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="php" {{ in_array('php', $skill) ? 'checked' : '' }}>
                    <label class="form-check-label" for="formCheck1">PHP</label>

                    <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="laravel" {{ in_array('laravel', $skill) ? 'checked' : '' }}>
                    <label class="form-check-label" for="formCheck1">Laravel</label>

                    <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="java" {{ in_array('java', $skill) ? 'checked' : '' }}>
                    <label class="form-check-label" for="formCheck1">JavaScript</label>

                    <input class="form-check-input" type="checkbox" id="formCheck1" name="skill[]" value="js" {{ in_array('js', $skill) ? 'checked' : '' }}>
                    <label class="form-check-label" for="formCheck1">JQuery</label>
                    @error('skill')<span class="text-danger"> {{ $message }} </span> @enderror
                </div>
         </div>

         <div class="form-switch row">
            <label class="col-sm-3 col-form-label col_form_label">Staff <span class="req_star">*</span>:</label>
                <div class="col-sm-7 pp">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault1" {{ $data->category==1 ? 'checked' : '' }} name="category" value="1">
                        <label class="form-check-label" for="flexSwitchCheckDefault1">Team Manager</label>
                      </div>
                       @error('category')<span class="text-danger"> {{ $message }} </span> @enderror
                </div>
        </div>


        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">About or Details :</label>
            <div class="col-sm-7">
                <textarea class="summernote form-control form_control" name="about" >{!! $data->about !!}</textarea>
                @error('about')<span class="text-danger">  {{ $message }} @enderror </span>
            </div>
        </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-7 ">
              <input type="file" name="image" value="{{ $data->image }}">
              @error('image')<span class="text-danger">  {{ $message }} @enderror </span>
              @if ($data->image!='')
                <img class="img-fluid img"  src="{{ asset('upload/staff/'.$data->image) }}">
              @else
                 <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
              @endif

            </div>
          </div>
        </div>

      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">Update User</button>
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
