@extends('layouts.frontend.master')
  
@section('content')

<section class="section confirmation">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="confirmation-content text-center">
            <i class="icofont-check-circled text-lg text-color-2"></i>
              <h2 class="mt-3 mb-4">Grievance registered successfully, Grievance Registration Number : {{ $ugn }}</h2>
          </div>
      </div>
    </div>
  </div>
</section>

@stop
