@extends('layouts.frontend.master')
  
@section('content')

<div class="col-lg-12 mb-3">
   <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
      <h2 class="mb-2 title-color">Enter OTP Received at your mobile number</h2>
      @if ($errors->any())
         {!! implode('', $errors->all('
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 alert alert-danger" role="alert">
            <span class="font-medium">Oops !</span> ::message
            </div>
         ')) !!}
      @endif

      <form class="appoinment-form" id="grvform" action="{{ route('grievance.otp_verification') }}" method="post">
                @csrf
         <div class="row">

            <div class="col-lg-6">
              <lable>OTP`</label>
               <div class="form-group">
                  <input name="otp" id="otp" type="text" class="form-control" placeholder="">
                  <input type="hidden" name="gid" value="{{ Crypt::encrypt($gid) }}"/>
               </div>
            </div>

            <div class="col-lg-12">
         
         <button class="btn btn-main btn-round-full mt-2">Verify OTP<i class="icofont-simple-right ml-2"></i></button>
         </div>
      </form>
   </div>
</div>
@stop
