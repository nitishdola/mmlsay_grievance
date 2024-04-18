@extends('layouts.backend.isa.master')

@section('content')

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">MMLSAY GRIEVACE DASHBOARD:: ISA USER</h4>
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
                                      <i class="ri-arrow-down-circle-fill align-middle"></i>
                                  </span>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Pending at ISA</p>
                                  <h4 class="mb-0">
                                        <a href="{{ route('isa.grievance.index', ['case_status' => 'view_pendning']) }}">
                                            {{ $pending_at_isa }}
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
                                      <i class="ri-arrow-down-circle-fill align-middle"></i>
                                  </span>
                              </div>

                              <div class="flex-grow-1 ms-3">
                                  <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">All Cases</p>
                                  <h4 class="mb-0">
                                        <a href="{{ route('isa.grievance.index') }}">
                                            {{ $all_isa_cases }}
                                        </a>
                                    </h4>
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