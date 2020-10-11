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
                <li class="breadcrumb-item active">Staff</li>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <a href="/create">
                  <button class="btn btn-primary btn-sm waves-light" type="button">
                    <span class="btn-label">
                      <i class="fa fa-plus"></i>
                    </span>&nbsp;Add New Staff
                  </button>
                </a>
              </div>
              <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <h4 class="block">Success</h4>
                    <p> {{ session('status') }}</p>
                </div>
                @endif
                <table id="staff-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($staff as $key => $value)
                    <tr>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->phone }}</td>
                      <td>{{ $value->position }}</td>
                      <td>
                        <a href="/{{ $value->staffId }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <buttton data-staffId="{{ $value->staffId }}" class="btn btn-sm btn-danger text-white deleteStaff">Delete</buttton>
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <!-- Modal Delete Staff -->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="/delete" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Staff</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2>Are you sure?</h2>
              <input type="hidden" name="staffId" id="staffId">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-md btn-danger text-white">Yes, delete it!</button>
              <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
@endsection
@push('js')
<script type="text/javascript">
  $(function () {
    $("#staff-table").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $(document).on('click','.deleteStaff',function(){
      var staffId=$(this).attr('data-staffId');
      $('#staffId').val(staffId); 
      $('#modal-delete').modal('show'); 
  });

</script>
@endpush
