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

      <form class="form-inline" action="{{ route('admin.master.grievance_category.save') }}" method="post">
                @csrf
        <div>
            <label for="basiInput" class="form-label">Grievance Category Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="input-group mt-3">
            <button class="btn btn-primary" type="submit">SUBMIT</button>
        </div>

      </form>

      </div>
    </div>
  </div>
</div>
@stop