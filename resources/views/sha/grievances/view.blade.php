@extends('layouts.backend.sha.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Grievance Details</h5>
            <div class="table-responsive">
                <table class="table table-borderless mb-0">
                    <tbody>
                      <tr>
                            <th class="ps-0" scope="row">UGN :</th>
                            <td class="text-muted">{{ $result->ugn }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Grievance raise Date :</th>
                            <td class="text-muted">{{ date('d-m-Y h:i A', strtotime($result->grievance_raise_date)) }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Status :</th>
                            <td class="text-muted">{{ $result->status }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Enrolled under MMLSAY:</th>
                            <td class="text-muted">{{ $result->enrolled_under_mmlsay }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Member ID :</th>
                            <td class="text-muted">{{ $result->member_id }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">PAN Number :</th>
                            <td class="text-muted">{{ strtoupper($result->pan_number) }}</td>
                        </tr>



                        <tr>
                            <th class="ps-0" scope="row">Full Name :</th>
                            <td class="text-muted">{{ $result->full_name }}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Employment Type :</th>
                            <td class="text-muted">{{ $result->employment_type }}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">PPO Number:</th>
                            <td class="text-muted">{{ $result->ppo_number }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Gender:</th>
                            <td class="text-muted">{{ $result->gender }}</td>
                        </tr>


                        <tr>
                            <th class="ps-0" scope="row">Contact Number:</th>
                            <td class="text-muted">{{ $result->contact_number }}</td>
                        </tr>


                        <tr>
                            <th class="ps-0" scope="row">District :</th>
                            <td class="text-muted">{{ $result->district->name }}</td>
                        </tr>


                        <tr>
                            <th class="ps-0" scope="row">Grievance Category :</th>
                            <td class="text-muted">{{ $result->grievance_category->name }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Grievance Descripttion :</th>
                            <td class="text-muted">{{ $result->grievance_description }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div><!-- end card body -->
      </div><!-- end card -->
    </div>
</div>
@stop