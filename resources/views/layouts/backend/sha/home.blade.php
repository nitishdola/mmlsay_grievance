@extends('layouts.backend.sha.master')

@section('content')

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">MMLSAY GRIEVACE DASHBOARD:: SHA USER</h4>
      </div>
  </div>
</div>
<!-- end page title -->

<div class="row">
  

  <div class="col-xxl-9 order-xxl-0 order-first">
      <div class="d-flex flex-column h-100">
          <div class="row h-100">
              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="avatar-sm flex-shrink-0">
                                  <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                      <i class="ri-money-dollar-circle-fill align-middle"></i>
                                  </span>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Grievances</p>
                                  <h4 class=" mb-0">
                                            <a href="{{ route('sha.grievance.index') }}">  
                                                {{ $grievance_count }}
                                            </a>
                                    </h4>
                              </div>
                              
                          </div>
                      </div><!-- end card body -->
                  </div><!-- end card -->
              </div><!-- end col -->
              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="avatar-sm flex-shrink-0">
                                  <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                      <i class="ri-arrow-up-circle-fill align-middle"></i>
                                  </span>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Out of TAT</p>
                                  <h4 class=" mb-0"><span class="counter-value" data-target="{{ $out_tat }}">{{ $out_tat }}</span></h4>
                              </div>
                          </div>
                      </div><!-- end card body -->
                  </div><!-- end card -->
              </div><!-- end col -->
              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="avatar-sm flex-shrink-0">
                                  <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                      <i class="ri-arrow-down-circle-fill align-middle"></i>
                                  </span>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Resolved</p>
                                  <h4 class=" mb-0"><span class="counter-value" data-target="{{ $resolved }}">{{ $resolved }}</span></h4>
                              </div>
                          </div>
                      </div><!-- end card body -->
                  </div><!-- end card -->
              </div><!-- end col -->


              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="avatar-sm flex-shrink-0">
                                  <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                      <i class="ri-arrow-down-circle-fill align-middle"></i>
                                  </span>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Pending at ISA</p>
                                  <h4 class=" mb-0"><span class="counter-value" data-target="{{ $forwarded_to_isa }}">{{ $forwarded_to_isa }}</span></h4>
                              </div>
                          </div>
                      </div><!-- end card body -->
                  </div><!-- end card -->
              </div><!-- end col -->

          </div><!-- end row -->

          
      </div>
  </div><!-- end col -->
</div><!-- end row -->

@stop