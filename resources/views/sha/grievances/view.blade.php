@extends('layouts.backend.sha.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Grievance Details</h5>

            @if ($errors->any())
                        {!! implode('', $errors->all('
                            <div class="alert alert-danger mt-3" role="alert">
                            <span class="font-medium">Oops !</span> ::message
                            </div>
                        ')) !!}
                    @endif

            <div class="table-responsive">
                <table class="table mb-0 table-bordered">
                    <tbody>
                      <tr>
                            <th>UGN :</th>
                            <td>{{ $result->ugn }}</td>
                        </tr>

                        <tr>
                            <th>Grievance raise Date :</th>
                            <td>{{ date('d-m-Y h:i A', strtotime($result->grievance_raise_date)) }}</td>
                        </tr>

                        <tr>
                            <th>Status :</th>
                            <td>{{ $result->status }}</td>
                        </tr>

                        <tr>
                            <th>Enrolled under MMLSAY:</th>
                            <td>{{ $result->enrolled_under_mmlsay }}</td>
                        </tr>

                        <tr>
                            <th>Member ID :</th>
                            <td>{{ $result->member_id }}</td>
                        </tr>

                        <tr>
                            <th>PAN Number :</th>
                            <td>{{ strtoupper($result->pan_number) }}</td>
                        </tr>



                        <tr>
                            <th>Full Name :</th>
                            <td>{{ $result->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Employment Type :</th>
                            <td>{{ $result->employment_type }}</td>
                        </tr>
                        <tr>
                            <th>PPO Number:</th>
                            <td>{{ $result->ppo_number }}</td>
                        </tr>

                        <tr>
                            <th>Gender:</th>
                            <td>{{ $result->gender }}</td>
                        </tr>


                        <tr>
                            <th>Contact Number:</th>
                            <td>{{ $result->contact_number }}</td>
                        </tr>


                        <tr>
                            <th>District :</th>
                            <td>{{ $result->district->name }}</td>
                        </tr>


                        <tr>
                            <th>Grievance Category :</th>
                            <td>{{ $result->grievance_category->name }}</td>
                        </tr>
                    </table>

                    <table class="table mb-0 table-bordered">
                        <tr>
                            <th>Grievance Descripttion  :</th>
                            <td>{{ $result->grievance_description }}</td>
                        </tr>


                    </tbody>

                    <table class="table mb-0 table-bordered">
                        @if($result->support_document_path)
                        <tr>
                            <th>Support Image :</th>
                            <td><a target="_blank" href="{{ asset($result->support_document_path) }}">Image</a></td>
                        </tr>
                        @endif

                        @if($result->support_video_path)
                        <tr>
                            <th>Support Video :</th>
                            <td><a target="_blank" href="{{ asset($result->support_video_path) }}">Video</a></td>
                        </tr>
                        @endif


                    </table>
                    @if(count($result->grievance_flows))
                    <div class="col-md-12 mt-3"><h4>Workflow </h4></div>
                    <table class="table mb-0 table-bordered mt-3 table-striped">
                        
                        <tr>
                            <th>SHA User</td>
                            <th>SHA Remarks</td>
                            <th>SHA Resolve Date</td>
                            <th>ISA Forward Date</td>
                            <th>ISA User</td>
                            <th>ISA Remarks</td>
                            <th>ISA Resolve Date</td>
                        </tr>

                        @foreach($result->grievance_flows as $k => $v)
                        <tr>
                            <td>
                                @if($v->sha_user)
                                    {{ $v->sha_user->name }}
                                @endif
                            </td>
                            <td>{{ $v->sha_remarks }}</td>
                            <td>{{ $v->sha_resolve_date }}</td>
                            <td>{{ $v->isa_forward_date }}</td>
                            <td>
                                @if($v->isa_user)
                                    {{ $v->isa_user->name }}
                                @endif
                            </td>
                            <td>{{ $v->isa_remarks }}</td>
                            <td>{{ $v->isa_resolve_date }}</td>
                            
                        </tr>
                        @endforeach
                    </table>
                    @endif
                    @php 
                        $reply_sha_arr = ['Grievance Registered', 'ISA Resolved'];
                    @endphp
                    @if(in_array($result->status, $reply_sha_arr))

                    


                    <div class="col-md-12 mt-3"><h4>Action </h4></div>

                    <form class="form-inline" action="{{ route('sha.grievance.process', $result->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <table class="table mb-0 table-bordered">
                        <tr>
                            <th>Action</th>
                            <td>
                            <div>
                                
                                <select class="form-control" name="action">
                                    <option value="">Select Action</option>
                                    <option value="SHA Resolved">Resolved</option>
                                    <option value="Discard at SHA">Discard</option>
                                    <option value="Forward To ISA">Forward To ISA</option>
                                </select>
                            </div>
                            <div class="mt-3 attachment">
                                <label for="basiInput" class="form-label">Attachment</label>
                                

                                <input type="file" name="attachments[]" class="form-control" />

                            </div>

                            <a href="javascript:void(0)" class="btn btn-sm btn-primary add_more_attachment mt-3"><i class="fas fa-plus-circle"></i> Add More Attachment</a>


                            <div class="mt-3">
                                <label for="basiInput" class="form-label">Remarks</label>
                                <textarea rows="4" class="form-control" name="sha_remarks"></textarea>
                            </div>


                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <div class="input-group mt-3">
                                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                                </div>
                            </td>
                        </tr>


                    </tbody>


                </table>
                </form>
                @endif
            </div>
        </div><!-- end card body -->
      </div><!-- end card -->
    </div>
</div>
@stop

@section('pageJs')
<script>
    $('.add_more_attachment').click(function(e) {
        var last_clone = $('.attachment:last');
        var clone = $('.attachment:last').clone();
        //clone.find("input").val("");
        last_clone.after(clone);
    });
</script>
@stop