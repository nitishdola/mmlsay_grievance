@extends('layouts.frontend.master')
  
@section('content')

<div class="col-lg-12 mb-3">
   <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
      <h2 class="mb-2 title-color">GRIEVANCE FORM</h2>
      <p class="mb-4">Fileds marked * are mendatory.</p>

      @if ($errors->any())
         {!! implode('', $errors->all('
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 alert alert-danger" role="alert">
            <span class="font-medium">Oops !</span> ::message
            </div>
         ')) !!}
      @endif

      <form class="appoinment-form" id="grvform" action="{{ route('grievance.save') }}" method="post" enctype="multipart/form-data">
                @csrf
         <div class="row">
            <div class="col-lg-6">
               <div class="form-group">
                  <select class="form-control" name="enrolled_under_mmlsay" id="enrolled_under_mmlsay">
                     <option value="">Are You Enrolled under MMLSAY ?*</option>
                     <option value="Yes">YES</option>
                     <option value="No">NO</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="member_id" id="member_id" type="text" class="form-control member_id" placeholder="MEMBER ID*">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="pan_number" id="pan_number" type="text" class="form-control pan" placeholder="PAN Number*">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="full_name" id="full_name" type="text" class="form-control" placeholder="Full Name*">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <select class="form-control employment_type" name="employment_type" id="employment_type">
                     <option value="">Employment Type ?*</option>
                     <option value="EMPLOYEE">EMPLOYEE</option>
                     <option value="PENSIONER">PENSIONER</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <input name="ppo_number" id="ppo_number" type="text" class="form-control ppo_number" placeholder="PPO Number*">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <select name="gender" class="form-control" id="gender">
                     <option value="">Gender*</option>
                     <option value="MALE">MALE</option>
                     <option value="FEMALE">FEMALE</option>
                     <option value="OTHERS">OTHERS</option>
                  </select>
               </div>
            </div>

            <div class="col-lg-6">
               <div class="form-group">
                  <input name="address" id="address" type="text" class="form-control" placeholder="Address*">
               </div>
            </div>
            
            
            <div class="col-lg-8" id="district">
               <div class="form-group">
                  <select class="form-control" name="district_id" id="district_id">
                  <option value="">Select District</option>
                    @foreach($districts as $k => $v)
                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                  </select>
               </div>
            </div>

            <div class="col-lg-8" id="api_district" style="display:none">
               <div class="form-group">
                     <input name="api_district" id="api_district_name" type="text" class="form-control" />
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
               <div class="form-group" id="grv_cat" style="display:none">
                  <input name="user_grievance_category" id="user_grievance_category" type="text" class="form-control" placeholder="Grievance Category*">
               </div>
            </div>
           

            <div class="col-lg-6">
               <div class="form-group">
                  <label>Support Document</label>
                  <input name="support_document" id="support_document" type="file" class="form-control" placeholder="support_document" />
                  <small id="passwordHelpBlock" class="form-text text-muted">
  Only image and pdf files allowed.
</small>
               </div>
            </div>


            <div class="col-lg-6">
               <div class="form-group">
                  <label>Support Video</label>
                  <input name="support_video" id="support_video" type="file" class="form-control" placeholder="support_video" />

                  <small id="passwordHelpBlock" class="form-text text-muted">
  Only mp4, mpeg and avi types allowed.
</small>

               </div>
            </div>


         </div>
         <div class="form-group-2 mb-4">
            <textarea name="grievance_description" id="grievance_description" class="form-control" rows="6" placeholder="Grievance Description*"></textarea>
         </div>

         <input type="hidden" name="gid" value="{{ $gid }}" />

         {!! htmlFormSnippet() !!}
         
         <button class="btn btn-main btn-round-full mt-2">Submit<i class="icofont-simple-right ml-2"></i></button>
      </form>
   </div>
</div>

@stop

@section('pageCss')
<style>
  .pan { text-transform: uppercase;}
  .member_id, .ppo_number { display : none; }
  label.error { color: red; }
</style>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="{{ asset('frontend/css/jquery.msg.css') }}" rel="stylesheet" />

<script type="text/javascript">
   function callbackThen(response) {

     // read Promise object
     response.json().then(function(data) {
       console.log(data);
       if(data.success && data.score >= 0.6) {
          console.log('valid recaptcha');
       } else {
          document.getElementById('contactForm').addEventListener('submit', function(event) {
             event.preventDefault();
             alert('recaptcha error');
          });
       }
     });
   }

   function callbackCatch(error){
      console.error('Error:', error)
   }
   </script>

   {!! htmlScriptTagJsApi([
      'callback_then' => 'callbackThen',
      'callback_catch' => 'callbackCatch',
   ]) !!}

@stop

@section('pageJs')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js" integrity="sha512-KgffulL3mxrOsDicgQWA11O6q6oKeWcV00VxgfJw4TcM8XRQT8Df9EsrYxDf7tpVpfl3qcYD96BpyPvA4d1FDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend/js/jquery.center.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.msg.js') }}"></script>



<script>

   
  $('#enrolled_under_mmlsay').change(function() {
    if($(this).val() == 'Yes') {
      $('.member_id').show();
    }else{
      $('.member_id').hide();
    }
  });


  $('#grievance_category_id').change(function() {
   
   if($('#grievance_category_id').val() == 7) {
      $('#grv_cat').show();
   }else{
      $('#grv_cat').hide();
   }
  })

$( document ).ready(function() {
   $('.member_id').keyup(function() {
      let length = $('.member_id').val().length;
      
      if(length >= 6) {

         //$.blockUI({ message: '<h1> Fetching Details...</h1>' });

         $.msg({ content : 'Fetching details, please wait', autoUnblock : false  });
         

         var url  =  '';
         var data = '';

         url += "{{ route('ben_data_api') }}";
         data += "&member_id="+$('.member_id').val();


         $.ajax({
            url : url,
            data : data,
            type : 'GET',
            dataType : 'json',

            success : function(resp) {

               $.msg('unblock');
               if(resp.status == 'OK') {
                  //console.log(resp.data.self)

                  $('#district').hide();
                  $('#api_district').show();

                  $('#full_name').prop('readonly', true);
                  $('#full_name').val(resp.data.self.name);

                  $('#pan_number').prop('readonly', true);
                  $('#pan_number').val(resp.data.self.pan);

                  $('#gender').attr('readonly', true);
                  $('#gender').val(resp.data.self.gender);

                  $('#api_district_name').attr('readonly', true); 
                  //console.log(resp.data.self.district); 
                  $('#api_district_name').val(resp.data.self.district);

                  $('#address').prop('readonly', true);
                  $('#address').val(resp.data.self.present_address);

               }else{
                  $('#full_name').prop('readonly', false);
                  $('#full_name').val('');

                  $('#pan_number').prop('readonly', false);
                  $('#pan_number').val('');

                  $('#gender').attr('readonly', false);
                  $('#gender').val('');

                  $('#api_district_name').attr('readonly', false); 
                  //console.log(resp.data.self.district); 
                  $('#api_district_name').val('');

                  $('#address').prop('readonly', false);
                  $('#address').val('');

                  $('#member_id').val('');
                  $('#enrolled_under_mmlsay').val('No');
                  
                  alert(resp.message)

               }
               
            },

            error : function(resp) {
               $.msg('unblock');
               alert('Error fetching MMLSAY API server, please try aagain after sometime.')
            }
         });
      }
  });
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

<script>
		// validate the comment form when it is submitted

		// validate signup form on keyup and submit
      
		$("#grvform").validate({
			rules: {
            full_name:             "required",
            pan_number:            "required",
				enrolled_under_mmlsay: "required",
				gender:                 "required",
				contact_number:         "required",
				district_id:            "required",
				grievance_category_id:  "required",
            employment_type:        "required",
				address: {
					required: true,
					minlength: 10
				},

            grievance_description: {
					required: true,
					minlength: 30
				},

				member_id: {
					required: function(element) {
                        return $('#enrolled_under_mmlsay').val() === 'Yes';
                    }
				},

            user_grievance_category: {
					required: function(element) {
                        return $('#grievance_category_id').val() === 7;
                    }
				},

				ppo_number: {
					required: function(element) {
                        return $('#employment_type').val() === 'PENSIONER';
                    }
				}
			}
		});
   </script>
@stop