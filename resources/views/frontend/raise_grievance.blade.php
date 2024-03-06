@extends('layouts.frontend.master')
  
@section('content')

<div class="col-lg-12 mb-3">
   <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
      <h2 class="mb-2 title-color">GRIEVANCE FORM</h2>
      <p class="mb-4">Fileds marked * are mendatory.</p>

      @if ($errors->any())
         {!! implode('', $errors->all('
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Oops !</span> ::message
            </div>
         ')) !!}
      @endif

      <form class="appoinment-form" action="{{ route('grievance.save') }}" method="post" enctype="multipart/form-data">
                @csrf
         <div class="row">
            <div class="col-lg-6">
               <div class="form-group">
                  <select class="form-control" name="enrolled_under_mmlsay" id="enrolled_under_mmlsay">
                     <option value="">Are You Enrolled under MMLSAY ?</option>
                     <option value="Yes">YES</option>
                     <option value="No">NO</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="member_id" id="member_id" type="text" class="form-control member_id" placeholder="MEMBER ID">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="pan_number" id="date" type="text" class="form-control pan" placeholder="PAN Number">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="full_name" id="name" type="text" class="form-control" placeholder="Full Name">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <select class="form-control employment_type" name="employment_type" id="employment_type">
                     <option value="">Employment Type ?</option>
                     <option value="EMPLOYEE">EMPLOYEE</option>
                     <option value="PENSIONER">PENSIONER</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="ppo_number" id="date" type="text" class="form-control ppo_number" placeholder="PPO Number">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <select name="gender" class="form-control" id="gender">
                     <option value="">Gender</option>
                     <option value="MALE">MALE</option>
                     <option value="FEMALE">FEMALE</option>
                     <option value="OTHERS">OTHERS</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="contact_number" id="time" type="text" class="form-control" placeholder="Contact Number">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <select class="form-control" name="district_id" id="district_id">
                  <option value="">Select District</option>
                    @foreach($districts as $k => $v)
                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                    <select class="form-control" name="grievance_category_id" id="grievance_category_id">
                      <option value="">Select Grievance Category</option>
                        @foreach($grievance_categories as $k => $v)
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach 
                    </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="address" id="address" type="text" class="form-control" placeholder="Address">
               </div>
            </div>
            <div class="col-lg-6"></div>

            <div class="col-lg-6">
               <div class="form-group">
                  <label>Support Document</label>
                  <input name="support_document" id="support_document" type="file" class="form-control" placeholder="support_document" />
               </div>
            </div>


            <div class="col-lg-6">
               <div class="form-group">
                  <label>Support Video</label>
                  <input name="support_video" id="support_video" type="file" class="form-control" placeholder="support_video" />
               </div>
            </div>


         </div>
         <div class="form-group-2 mb-4">
            <textarea name="grievance_description" id="message" class="form-control" rows="6" placeholder="Grievance Description"></textarea>
         </div>
         <button class="btn btn-main btn-round-full">Submit<i class="icofont-simple-right ml-2"></i></button>
      </form>
   </div>
</div>
@stop

@section('pageCss')
<style>
  .pan { text-transform: uppercase;}
  .member_id, .ppo_number { display : none; }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('pageJs')
<script>
  $('#enrolled_under_mmlsay').change(function() {
    if($(this).val() == 'Yes') {
      $('.member_id').show();
    }else{
      $('.member_id').hide();
    }
  });


  $('#employment_type').change(function() {
    if($(this).val() == 'PENSIONER') {
      $('.ppo_number').show();
    }else{
      $('.ppo_number').hide();
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $('.select2').select2();
</script>
@stop