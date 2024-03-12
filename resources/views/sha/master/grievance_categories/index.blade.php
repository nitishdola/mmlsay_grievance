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

<div class="card-body">
  <div class="live-preview">
    <div class="row gy-4">
      <div class="col-xxl-3 col-md-6">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Grievance Category</th>
            <th>Edit</th>
            <th>Remove</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $k => $v)
          <tr>
            <td>{{ $k+1 }}</td>
            <td>{{ $v->name}}</td>
            <td><a href="{{ route('sha.master.grievance_category.edit', Crypt::encrypt($v->id)) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="{{ route('sha.master.grievance_category.delete', Crypt::encrypt($v->id)) }}" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash"></i></a></td>
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>
</div>
@stop