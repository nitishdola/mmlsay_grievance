@extends('layouts.frontend.master')
  
@section('content')

<div class="col-lg-12 mb-3">
   <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
      <h2 class="mb-2 title-color">Verify Your Mobile Number</h2>


      @if(Session::has('message'))
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {!! Session::get('message') !!}
                            </div>
                            </div>
                        </div>
                    @endif

      @if ($errors->any())
         {!! implode('', $errors->all('
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 alert alert-danger" role="alert">
            <span class="font-medium">Oops !</span> ::message
            </div>
         ')) !!}
      @endif

      <form class="appoinment-form" id="grvform" action="{{ route('grievance.otp_verify') }}" method="post">
                @csrf
         <div class="row">

            <div class="col-lg-6">
              <lable>Mobile Number</label>
               <div class="form-group">
                  <input name="contact_number" id="contact_number" type="text" class="form-control" placeholder="">
               </div>
            </div>

            <div class="col-lg-12 mb-3">
         
         <button class="btn btn-main btn-round-full mt-2">Send OTP<i class="icofont-simple-right ml-2"></i></button>
         </div>
      </form>
   </div>
</div>
@stop
