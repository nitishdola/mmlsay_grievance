@extends('layouts.backend.isa.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Grievances</h4>
            </div><!-- end card header -->

            <div class="card-body">
              @if(count($results))
                <div class="live-preview">
                    <div class="table-responsive">

                      <table class="table align-middle table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">UGN</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Employment Type</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Distsrict</th>
                                <th scope="col">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($results as $k => $v)
                            <tr>
                                <th scope="row">{{ $k+1 }}</th>
                                <td>
                                <a href="{{ route('isa.grievance.view', $v->id) }}" class="link-success">{{ $v->ugn }} </a>
                                </td>
                                <td>{{ date('d-m-Y', strtotime($v->grievance_raise_date)) }}</td>
                                <td>{{ $v->status }}</td>
                                <td>{{ $v->full_name }}</td>
                                <td>{{ $v->employment_type }}</td>
                                <td>{{ $v->contact_number }}</td>
                                <td>{{ $v->district->name }}</td>
                                <td>{{ $v->grievance_category->name }}</td>
                                <td></td>
                            </tr>
                          @endforeach
                            
                        </tbody>
                    </table>

                  </div>
                </div>
              </div>
              @else
              <div class="alert alert-warning">
                  <h3>No Cases found !</h3>
              </div>

              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@stop