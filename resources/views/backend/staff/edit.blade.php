@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Staff</h1>
            </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Staff</a></li>
                <li class="breadcrumb-item active">Edit Staff</li>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Form Edit Staff</h4>
              </div>
              <div class="card-body col-sm-6">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <form method="post" action="/{{ $staff->staffId }}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="email">Email<span style="color:red;">*</span></label>
                    <input required="" type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $staff->email }}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone<span style="color:red;">*</span></label>
                    <input required="" type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{ $staff->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="password">Password<span style="color:red;">*</span></label>
                    <input required="" type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password<span style="color:red;">*</span></label>
                    <input required="" type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm password">
                  </div>
                  <div class="form-group">
                    <label for="position">Position<span style="color:red;">*</span></label>
                    <input required="" type="text" name="position" class="form-control" id="position" placeholder="Enter position" value="{{ $staff->position }}">
                  </div>
                  <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info btn-md">Save</button>
                        <a href="/" class="btn btn-secondary btn-md">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@push('js')
@endpush
