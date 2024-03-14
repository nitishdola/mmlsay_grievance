@extends('layouts.frontend.master')
  
@section('content')

<section class="section confirmation">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h3 class="mt-3 mb-4">Enter Grievance Registration Number : </h3>
        <form class="appoinment-form" action="{{ route('grievance.track') }}" method="get">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <input name="ugn" id="ugn" type="text"
                        class="form-control ugn" 
                        value=
                              @if(isset($data['ugn'])) 
                                  {{ $data['ugn'] }}
                                @else '' @endif
                        placeholder="ENTER UGN">
              </div>
            </div>

            <input type="hidden" name="error_message" value="yes"
            <div class="col-lg-12">
              <button class="btn btn-main btn-round-full">Submit<i class="icofont-simple-right ml-2"></i></button>
            </div>
          </div>
        </form>
      </div>

      @if(isset($data['error_message']))
      <div class="col-lg-8 mt-3 alert alert-danger">
        {{ $data['error_message'] }}
      </div>
      @endif

      @if(isset($data['success']) &&  $data['success'] == true)
          @if($data['status'] == 'Discard')
            <div class="col-lg-8 mt-3 alert alert-warning">
              Your Grievance has been discarded.
            </div>
          @elseif($data['status'] == 'Resolved')
            <div class="col-lg-8 mt-3 alert alert-success">
              Your Grievance has been Resolved.
            </div>
          @else
          <div class="col-lg-8 mt-3 alert alert-primary">
              Your Grievance is under process.
            </div>
          @endif

      @endif


    </div>
  </div>
</section>

@stop
